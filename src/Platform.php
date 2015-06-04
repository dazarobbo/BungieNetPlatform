<?php

namespace BungieNetPlatform;

use GuzzleHttp;
use BungieNetPlatform\Exceptions;
use Cola\Json;

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
	
	
	/**
	 *
	 * @var DestinyService
	 */
	public $DestinyService;






	public function __construct($key) {
		$this->setKey($key);
		$this->DestinyService = new DestinyService($this);
	}
	
	public function doRequest(\GuzzleHttp\Psr7\Request $request){
		
		$client = new GuzzleHttp\Client([]);
		
		$request = $request
				->withScheme(BungieNet::PROTOCOL)
				->withHost(BungieNet::host())
				->withHeader('X-API-Key', $this->_ApiKey);
		
		if($this->_InUserContext){
			$request = $request->withHeader('X-CSRF', $this->_User->getCsrfToken());
			$client->setDefaultOption('cookies', $this->_User->getCookieJar());
		}
		
		echo 'Making request to: ' . $request->getUri() . PHP_EOL;
		
		try{
			$response = $client->send($request);
		}
		catch(\Exception $ex){
			throw new PlatformRequestException('Platform HTTP request failed', 0, $ex);
		}
		
		if($response->getStatusCode() !== 200){
			throw new PlatformRequestException(
					\sprintf('Request returned HTTP %d', $response->getStatusCode()),
					$response->getStatusCode());
		}
		
		return Response::parseResponse(Json::deserialise(
				$response->getBody()->getContents()));
		
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