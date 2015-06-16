<?php

namespace BungieNetPlatform;

use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Cookie\SetCookie;
use Cola\Object;
use Cola\Functions\PHPArray;
use BungieNetPlatform\Exceptions;

/**
 * PlatformUser
 */
abstract class PlatformUser extends Object {
	
	/**
	 * Cookies used by the user to make requests to the
	 * platform
	 * @var CookieJar
	 */
	protected $_CookieJar;
	
	/**
	 * Cookies necessary to be considered authorised
	 * @var string[]
	 */
	protected static $_RequiredCookies = [
		'bungleatk',
		'bungled',
		'bungledid'
	];
	
	
	/**
	 * Performs the necessary authentication in order to be
	 * authorised to use bungie.net in a user context
	 * @throws Exceptions\AuthenticationException
	 */
	public function authenticate(){
		
		$this->authenticateProvider();
		$this->authenticateBungie();
		
		if(!$this->requiredCookiesExist()){
			throw new Exceptions\AuthenticationException(
					'Required bungie.net cookies not set');
		}
		
	}

	/**
	 * Performs authentication with bungie.net
	 */
	protected abstract function authenticateBungie();

	/**
	 * Performs authentication with the login provider
	 */
	protected abstract function authenticateProvider();
	
	public function __construct() {
		$this->_CookieJar = new CookieJar();
	}
	
	/**
	 * Returns the bungie.net cookies for this user
	 * @return SetCookie[]
	 */
	public function getBungieCookies(){
		return PHPArray::filter($this->_CookieJar->toArray(), function(SetCookie $c){
			$c->matchesDomain(BungieNet::DOMAIN);
		});
	}

	/**
	 * Returns a reference to this user's cookie jar
	 * @return CookieJar
	 */
	public function &getCookieJar(){
		return $this->_CookieJar;
	}
	
	/**
	 * Gets the CSRF token for this user
	 * @return string|null
	 */
	public function getCsrfToken(){
		
		foreach($this->getBungieCookies() as $cookie){
			if($cookie->getName() === 'bungled'){
				return $cookie->getValue();
			}
		}
		
		return null;
		
	}
	
	/**
	 * Checks whether the necessary cookies exist to be
	 * considered authorised
	 * @return bool
	 */
	protected function requiredCookiesExist(){
		
		$bngCookieNames = PHPArray::map($this->getBungieCookies(),
				function(SetCookie $c){
					return $c->getName();
				}
		);
		
		return !\array_diff(static::$_RequiredCookies, $bngCookieNames);
		
	}

}
