<?php

namespace BungieNetPlatform;

use GuzzleHttp\Psr7\Uri;

/**
 * BungieNet
 * 
 * @since version 1.0.0
 * @version 1.0.0
 * @author dazarobbo <dazarobbo@live.com>
 */
abstract class BungieNet{

	const PROTOCOL = 'https';
	const DOMAIN = 'bungie.net';
	const HOST = 'www.' . self::DOMAIN;

	/**
	 * Generates a base URI for bungie.net
	 * 
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @return Uri
	 */
	public static function getBaseUri(){
		return Uri::fromParts([
			'scheme' => static::PROTOCOL,
			'host' => static::HOST
		]);
	}
	
	/**
	 * Generates a URI to the Platform
	 * 
	 * @return Uri
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 */
	public static function getPlatformUri(){
		return static::getBaseUri()->withPath('/Platform');
	}
	
}
