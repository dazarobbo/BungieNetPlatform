<?php

namespace BungieNetPlatform;

use GuzzleHttp;
use GuzzleHttp\Message\Request;

/**
 * Platform
 */
class Platform extends \Cola\Object {

	/**
	 * API key used to access the platform
	 * @var string
	 */
	protected $_ApiKey;
	
	/**
	 * User to use when making use of private endpoints
	 * @var PlatformUser 
	 */
	protected $_User;
	
	/**
	 * Whether to query the platform in the context of a user
	 * @var bool
	 */
	protected $_InUserContext = false;
	
	
	public $Services;
	
	
	
	public function __construct($key) {
		$this->setKey($key);
		$this->Services = new Services($this);
	}
	
	public function doRequest(Request $request){
		
		$client = new GuzzleHttp\Client([
			'base_url' => BungieNet::platformPath() . '/'
		]);
		
		$request->addHeader('X-API-Key', $this->_ApiKey);
		
		if($this->_InUserContext){
			$request->addHeader('X-CSRF', $this->_User->getCsrfToken());
			$client->setDefaultOption('cookies', $this->_User->getCookieJar());
		}
		
		try{
			$resp = $client->send($request);		
		}
		catch(\Exception $ex){
			throw new PlatformRequestException('Platform HTTP request failed', 0, $ex);
		}
		
		if($resp->getStatusCode() !== 200){
			throw new PlatformRequestException(
					\sprintf('Request returned HTTP %d', $resp->getStatusCode()),
					$resp->getStatusCode());
		}
		
		return Response::parseResponse($resp);
		
	}

	public function setKey($key){
		$this->_ApiKey = $key;
	}
	
	public function getKey(){
		return $this->_ApiKey;
	}

	public function setUser(PlatformUser $user){
		$this->_User = $user;
	}
	
	public function getUser(){
		return $this->_User;
	}
	
	public function authenticateUser(){
		$this->_User->authenticate();
		$this->_InUserContext = true;
	}
	
	/**
	 * Sets whether or not to make requests as a user
	 * @param bool $var
	 */
	public function setUserContext($var){
		$this->_InUserContext = $var ? true : false;
	}
	
}