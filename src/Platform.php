<?php

namespace BungieNetPlatform;

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
	
	
	public function __construct($key) {
		$this->setKey($key);
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