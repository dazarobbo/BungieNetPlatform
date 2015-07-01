<?php

namespace BungieNetPlatform;

use GuzzleHttp;
use Cola\Functions\String as StringFunctions;
use Sunra\PhpSimple\HtmlDomParser;
use BungieNetPlatform\Exceptions\BungieAuthenticationException;
use BungieNetPlatform\Exceptions\XboxAuthenticationException;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;

/**
 * XboxUser
 * 
 * @since version 1.0.0
 * @version 1.0.0
 * @author dazarobbo <dazarobbo@live.com>
 */
class XboxUser extends PlatformUser {

	/**
	 * Microsoft Account email address
	 * @var string
	 */
	protected $_Email;
	
	/**
	 * Microsoft Account password
	 * @var string
	 */
	protected $_Password;

	public function __construct($email, $password) {
		parent::__construct();
		$this->_Email = $email;
		$this->_Password = $password;
	}

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
			'base_uri' => 'https://login.live.com',
			'cookies' => $this->_CookieJar,
			'decode_content' => 'gzip',
			'debug' => true,
		]);
		
		try{
			$resp = $client->get('/oauth20_authorize.srf', [
				'query' => [
					'client_id' => '000000004013231D',
					'scope' => 'Xboxlive.signin Xboxlive.offline_access',
					'response_type' => 'code',
					'redirect_uri' => 'https://www.bungie.net/en/User/SignIn/Xuid',
					'display' => 'touch',
					'locale' => 'en'
				]
			]);
		}
		catch(TransferException $ex){
			throw new XboxAuthenticationException(
					'Failed to get Microsoft login page', 0, $ex);
		}
		
		if(\stripos($resp->getBody(), '#idDiv_AppSection') !== false){
			//Asking for app auth
			throw new XboxAuthenticationException('Requires app authorisation');
		}
		
		$matches = array();
		\preg_match('/(<input .*?name="PPFT".*?\/>)/usi', $resp->getBody(), $matches);
		$dom = HtmlDomParser::str_get_html($matches[1]);
		$ppft = $dom->getElementById('i0327')->getAttribute('value');
		
		try{
			$resp = $client->post('/ppsecure/post.srf', [
				'query' => [
					'client_id' => '000000004013231D',
					'scope' => 'Xboxlive.signin Xboxlive.offline_access',
					'response_type' => 'code',
					'redirect_uri' => 'https://www.bungie.net/en/User/SignIn/Xuid',
					'display' => 'touch',
					'locale' => 'en'
				],
				'form_params' => [
					'login' => $this->_Email,
					'passwd' => $this->_Password,
					'PPFT' => $ppft
				]
			]);
		}
		catch(TransferException $ex) {
			throw new XboxAuthenticationException(
					'Failed to POST Microsoft details', 0, $ex);
		}
		
		//Still on login.live.com, assume bad email/password
		if($uri->getHost() === 'login.live.com'){
			throw new XboxAuthenticationException('Microsoft authentication failed');
		}
		
		
		//Check for unregistered bungie.net user
		if(StringFunctions::endsWith(\strtolower($uri->getPath()), 'register')){
			throw new BungieAuthenticationException('Unregistered user');
		}
		
	}

}
