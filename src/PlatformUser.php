<?php

namespace BungieNetPlatform;

use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Cookie\SetCookie;
use Cola\Object;
use Cola\ArrayList;
use Cola\Functions\String as StringFunctions;
use BungieNetPlatform\Exceptions;

/**
 * PlatformUser
 * 
 * Base class for any specific user type
 * 
 * @since version 1.0.0
 * @version 1.0.0
 * @author dazarobbo <dazarobbo@live.com>
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
	protected static $_RequiredCookies = array(
		'bungled',
		'bungledid',
		'bungleme'
	);
	
	
	/**
	 * Performs the necessary authentication in order to be
	 * authorised to use bungie.net in a user context
	 * @throws Exceptions\AuthenticationException
	 */
	public abstract function authenticate();
	
	public function __construct() {
		$this->_CookieJar = new CookieJar();
	}
	
	/**
	 * Returns the bungie.net cookies for this user
	 * @return ArrayList|SetCookie[]
	 */
	public function getBungieCookies(){
		return $this->getCookies()->filter(function(SetCookie $c){

			if($c->isExpired()){
				return false;
			}
			
			return StringFunctions::endsWith($c->getDomain(), BungieNet::DOMAIN);
			
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
	 * Returns the cookies as SetCookie instances
	 * @return ArrayList|SetCookie[]
	 */
	public function getCookies(){
	
		$list = new ArrayList($this->_CookieJar->toArray());
		$list = $list->map(function(array $arr){
			return new SetCookie($arr);
		});
		
		return $list;
		
	}
	
	/**
	 * Gets the CSRF token for this user
	 * @return string|null
	 */
	public function getCsrfToken(){
		
		$list = $this->getBungieCookies()->filter(function(SetCookie $c){
			return $c->getName() === 'bungled';
		});
		
		return !$list->isEmpty() ? $list->front()->getValue() : null;
		
	}
	
	/**
	 * Checks whether this user can be used to make requests
	 * @return bool
	 */
	public function isAuthorised(){
		return $this->requiredCookiesExist();
	}
	
	/**
	 * Checks whether the necessary cookies exist to be
	 * considered authorised
	 * @return bool
	 */
	protected function requiredCookiesExist(){
		
		$names = $this->getBungieCookies()
				->map(function(SetCookie $c){ return $c->getName(); })
				->toArray();
				
		return !\array_diff(static::$_RequiredCookies, $names);
		
	}

}
