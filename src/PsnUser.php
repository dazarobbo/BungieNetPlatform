<?php

namespace BungieNetPlatform;

use GuzzleHttp;
use Cola\Functions\String;
use BungieNetPlatform\Exceptions\BungieAuthenticationException;
use BungieNetPlatform\Exceptions\PsnAuthenticationException;

/**
 * PsnUser
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
	
	protected function authenticateBungie() {
		
		$client = new GuzzleHttp\Client([
			'cookies' => $this->_CookieJar
		]);
		
		try{
			$client->get('https://www.bungie.net/en/User/SignIn/Psnid');
		}
		catch(\Exception $ex){
			throw new BungieAuthenticationException(
					'Failed to connect to bungie.net', 0, $ex);
		}
		
	}

	protected function authenticateProvider() {
		
		$client = new GuzzleHttp\Client([
			'base_url' => 'https://auth.api.sonyentertainmentnetwork.com',
			'cookies' => $this->_CookieJar
		]);
		
		try{
			$client->get('/login.jsp');
		}
		catch(\Exception $ex){
			throw new PsnAuthenticationException(
					'Failed to get PSN login page', 0, $ex);
		}
		
		try{
			$resp = $client->post('/login.do', [
				'form_params' => [
					'j_username' => $this->_Email,
					'j_password' => $this->_Password
				]
			]);
		}
		catch(\Exception $ex){
			throw new PsnAuthenticationException(
					'Failed to POST PSN details', 0, $ex);
		}
		
		if(!String::endsWith($resp->getEffectiveUrl(), 'loginSuccess.jsp')){
			throw new PsnAuthenticationException('PSN authentication failed');
		}
		
	}

}
