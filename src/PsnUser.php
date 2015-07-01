<?php

namespace BungieNetPlatform;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\TooManyRedirectsException;
use Sunra\PhpSimple\HtmlDomParser;
use BungieNetPlatform\BungieNet;
use BungieNetPlatform\Exceptions\BungieAuthenticationException;
use BungieNetPlatform\Exceptions\PsnAuthenticationException;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Uri;
use Cola\Functions\String as StringFunctions;

/**
 * PsnUser
 * 
 * @since version 1.0.0
 * @version 1.0.0
 * @author dazarobbo <dazarobbo@live.com>
 */
class PsnUser extends PlatformUser {
	
	/**
	 * PSN email address
	 * @var string
	 */
	protected $_Email;
	
	/**
	 * PSN password
	 * @var string
	 */
	protected $_Password;
	
	
	public function __construct($email, $password) {
		parent::__construct();
		$this->_Email = $email;
		$this->_Password = $password;
	}
	
	/**
	 * Authenticates this user with PSN and bungie.net
	 * @throws PsnAuthenticationException
	 * @throws BungieAuthenticationException
	 */
	public function authenticate() {
		
		//Hacky workaround for getting redirect URI from Guzzle
		/** @var Uri */
		$uri = new Uri();
		$handler = HandlerStack::create();
		$handler->push(Middleware::mapRequest(function(RequestInterface $request) use (&$uri){
			$uri = $request->getUri();
			return $request;
		}));
		
		$client = new GuzzleClient([
			'handler' => $handler,
			'base_uri' => 'https://auth.api.sonyentertainmentnetwork.com',
			'cookies' => $this->_CookieJar,
			'decode_content' => 'gzip',
			//'debug' => true
		]);
		
		//1. GET authorise page
		try{
			$resp = $client->get('/2.0/oauth/authorize', [
				'query' => [
					'response_type' => 'code',
					'client_id' => '78420c74-1fdf-4575-b43f-eb94c7d770bf',
					'redirect_uri' => 'https://www.bungie.net/en/User/SignIn/Psnid',
					'scope' => 'psn:s2s',
					'request_locale' => 'en'
				]
			]);
		}
		catch(TransferException $ex){
			throw new PsnAuthenticationException(
					'Failed to get PSN login page', 0, $ex);
		}

		//2. POST login details
		//Allow redirects to bungie.net (if any)
		try{
			$resp = $client->post('/login.do', [
				'form_params' => [
					//'params' => $dom->getElementById('brandingParams')->getAttribute('value'),
					'j_username' => $this->_Email,
				//	'rememberSignIn' => 'on',
					'j_password' => $this->_Password
				]
			]);
		}
		catch(TransferException $ex){
			throw new PsnAuthenticationException(
					'Failed to POST PSN details', 0, $ex);
		}
		
		//3. Check for failure
		
		//Try to get error from PSN login page
		if(StringFunctions::contains($uri->getQuery(), 'authentication_error')){
			
			$dom = HtmlDomParser::str_get_html($resp->getBody());
			$matches = array();
			
			if(($errDiv = $dom->getElementById('errorDivMessage')) !== null){
				\preg_match('/^(.+?)<br/ius', \trim($errDiv->innertext), $matches);
			}
			
			throw new PsnAuthenticationException(isset($matches[1])
					? $matches[1] : 'Unknown error');
			
		}
		
		//Check for unregistered bungie.net user
		if(StringFunctions::endsWith(\strtolower($uri->getPath()), 'register')){
			throw new BungieAuthenticationException('Unregistered user');
		}
		
	}

}
