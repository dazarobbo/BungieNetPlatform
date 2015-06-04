<?php

namespace BungieNetPlatform;

use GuzzleHttp;
use Cola\Functions\String;
use BungieNetPlatform\Exceptions;
use Sunra\PhpSimple\HtmlDomParser;

/**
 * XboxUser
 */
class XboxUser extends PlatformUser {

	protected $_Email;
	protected $_Password;

	public function __construct($email, $password) {
		parent::__construct();
		$this->_Email = $email;
		$this->_Password = $password;
	}

	protected function authenticateBungie() {
		
		$client = new GuzzleHttp\Client([
			'cookies' => $this->_CookieJar
		]);
		
		try{
			$client->get('https://www.bungie.net/en/User/SignIn/Xuid');
		}
		catch(\Exception $ex){
			throw new BungieAuthenticationException('Failed to connect to bungie.net', 0, $ex);
		}
		
	}

	protected function authenticateProvider() {
		
		$client = new GuzzleHttp\Client([
			'base_url' => 'https://login.live.com/ppsecure/',
			'cookies' => $this->_CookieJar
		]);
		
		try{
			$resp1 = $client->get('post.srf');
			$dom = HtmlDomParser::str_get_html($resp1->getBody());
			$ppft = $dom->getElementById('i0327')->getAttribute('value');
		}
		catch(\Exception $ex){
			throw new XboxAuthenticationException('Failed to get Microsoft login page', 0, $ex);
		}
		
		try{
			$resp2 = $client->post('post.srf', [
				'form_params' => [
					'login' => $this->_Email,
					'passwd' => $this->_Password,
					'PPFT' => $ppft
				]
			]);
		}
		catch(\Exception $ex) {
			throw new XboxAuthenticationException('Failed to POST Microsoft details', 0, $ex);
		}
		
		if(!String::startsWith($resp2->getEffectiveUrl(), 'https://login.live.com/ppsecure/')){
			throw new XboxAuthenticationException('Xbox authentication failed');
		}
		
	}

}
