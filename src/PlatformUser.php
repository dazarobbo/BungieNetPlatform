<?php

namespace BungieNetPlatform;

use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Cookie\SetCookie;
use Cola\Functions\PHPArray;
use BungieNetPlatform\Exceptions;

/**
 * PlatformUser
 */
abstract class PlatformUser extends \Cola\Object {

	/**
	 *
	 * @var CookieJar
	 */
	protected $_CookieJar;

	protected static $_RequiredCookies = [
		'bungleatk',
		'bungled',
		'bungledid'
	];


	public function __construct() {
		$this->_CookieJar = new CookieJar();
	}
	
	protected abstract function authenticateProvider();
	protected abstract function authenticateBungie();

	protected function requiredCookiesExist(){
		
		$bngCookieNames = PHPArray::map($this->getBungieCookies(),
				function(SetCookie $c){
			return $c->getName();
		});
		
		return !\array_diff(static::$_RequiredCookies, $bngCookieNames);
		
	}
	
	public function getBungieCookies(){
		return PHPArray::map($this->_CookieJar->toArray(), function(SetCookie $c){
			$c->matchesDomain(BungieNet::DOMAIN);
		});
	}

	public function authenticate(){
		
		$this->authenticateProvider();
		$this->authenticateBungie();
		
		if(!$this->requiredCookiesExist()){
			throw new AuthenticationException('Required bungie.net cookies not set');
		}
		
	}

}
