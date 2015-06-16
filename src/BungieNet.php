<?php

namespace BungieNetPlatform;

/**
 * BungieNet
 */
abstract class BungieNet{

	const PROTOCOL = 'https';
	const DOMAIN = 'bungie.net';

	/**
	 * Returns the base URL for bungie.net without a path
	 * @return string
	 */
	public static function base(){
		return \sprintf('%s://%s', static::PROTOCOL, static::host());
	}
	
	/**
	 * Returns the full URL to the bungie.net platform
	 * @return string
	 */
	public static function fullPlatformPath(){
		return \sprintf('%s%s', static::base(), static::platformPath());
	}
	
	/**
	 * Returns bungie.net's hostname
	 * @return string
	 */
	public static function host(){
		return \sprintf('www.%s', static::DOMAIN);
	}

	/**
	 * Returns only the path to the bungie.net platform
	 * @return string
	 */
	public static function platformPath(){
		return '/platform';
	}
	
}
