<?php

namespace BungieNetPlatform;

use GuzzleHttp;
use BungieNetPlatform\Services;
use BungieNetPlatform\Exceptions;

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
	 * @var Services\Destiny\DestinyService
	 */
	public $DestinyService;
	
	/**
	 * @var Services\User\UserService
	 */
	public $UserService;
	
	/**
	 * @var Services\Group\GroupService
	 */
	public $GroupService;
	
	/**
	 * @var Services\Forum\ForumService
	 */
	public $ForumService;


	public function __construct($key = null) {
		$this->setKey($key);
		$this->DestinyService = new Services\Destiny\DestinyService($this);
		$this->UserService = new Services\User\UserService($this);
		$this->GroupService = new Services\Group\GroupService($this);
		$this->ForumService = new Services\Forum\ForumService($this);
	}
	
	/**
	 * 
	 * @param \GuzzleHttp\Psr7\Request $request
	 * @return \GuzzleHttp\Psr7\Response
	 * @throws PlatformRequestException
	 */
	public function doRequest(\GuzzleHttp\Psr7\Request $request){
		
		$client = new GuzzleHttp\Client();
		
		$request = $request->withUri(
				$request->getUri()
						->withScheme(\BungieNetPlatform\BungieNet::PROTOCOL)
						->withHost(\BungieNetPlatform\BungieNet::host()));
		
		if($this->_ApiKey !== null){
			$request = $request
					->withHeader('X-API-Key', $this->_ApiKey);
		}
		
		if($this->_InUserContext){
			$request = $request->withHeader('X-CSRF', $this->_User->getCsrfToken());
			$client->setDefaultOption('cookies', $this->_User->getCookieJar());
		}
				
		try{
			$response = $client->send($request);
		}
		catch(\Exception $ex){
			throw new Exceptions\PlatformRequestException(
					'Platform HTTP request failed', 0, $ex);
		}
		
		if($response->getStatusCode() !== 200){
			throw new Exceptions\PlatformRequestException(
					\sprintf('Request returned HTTP %d', $response->getStatusCode()),
					$response->getStatusCode());
		}
		
		return $response;
		
	}

	/**
	 * Sets a new key
	 * @param string $key
	 * @return \BungieNetPlatform\Platform
	 */
	public function setKey($key){
		$this->_ApiKey = $key;
		return $this;
	}
	
	/**
	 * Returns the currently set key
	 * @return string
	 */
	public function getKey(){
		return $this->_ApiKey;
	}

	/**
	 * Sets the user to use to make requests to private endpoints
	 * @see http://bungienetplatform.wikia.com/wiki/Category:PrivateEndpoint
	 * @param \BungieNetPlatform\PlatformUser $user
	 * @return \BungieNetPlatform\Platform
	 */
	public function setUser(PlatformUser $user){
		$this->_User = $user;
		return $this;
	}
	
	/**
	 * Returns the currently set user
	 * @return PlatformUser
	 */
	public function getUser(){
		return $this->_User;
	}
	
	/**
	 * Authenticates the set user
	 * @return \BungieNetPlatform\Platform
	 */
	public function authenticateUser(){
		$this->_User->authenticate();
		return $this;
	}
	
	/**
	 * Whether the platform will make a request as a user
	 * @return bool
	 */
	public function inUserContext(){
		return $this->_InUserContext;
	}
	
	/**
	 * Sets whether or not to make requests as a user
	 * @param bool $var
	 * @return \BungieNetPlatform\Platform
	 */
	public function setUserContext($var = true){
		$this->_InUserContext = $var ? true : false;
		return $this;
	}
	
}