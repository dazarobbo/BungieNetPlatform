<?php

namespace BungieNetPlatform;

/**
 * BungieNet
 */
abstract class BungieNet{

	const PROTOCOL = 'https';
	const DOMAIN = 'bungie.net';

	public static function host(){
		return \sprintf('www.%s', static::DOMAIN);
	}

	public static function base(){
		return \sprintf('%s://%s', static::PROTOCOL, static::Host());
	}

	public static function platformPath(){
		return \sprintf('%s/platform', static::Base());
	}
	
	

	/**
	 * 
	 * @deprecated
	 * @param type $url
	 * @return type
	 */
	public static function fixURL($url){

		$p = \parse_url($url);

		//Nothing we can do with it, so just send it back
		if($p === false){
			return $url;
		}

		$path = isset($p['path']) ? $p['path'] : null;

		//http://www.w3schools.com/tags/ref_urlencode.asp
		if($path !== null){
			$path = \str_replace(
				array('(', ')', ' '),
				array('%28', '%29', '%20'),
				$path
			);
		}

		//http://username:password@hostname/path?arg=value#anchor
		return \sprintf(
			'%s://%s%s%s%s%s%s',
			isset($p['scheme']) ? $p['scheme'] : '',
			isset($p['user'], $p['pass']) ? ($p['user'] . ':' . $p['pass'] . '@') : '',
			isset($p['host']) ? $p['host'] : '',
			isset($p['port']) ? (':' . $p['port']) : '',
			isset($path) ? $path : '',
			isset($p['query']) ? ('?' . $p['query']) : '',
			isset($p['fragment']) ? ('#' . $p['fragment']) : ''
		);

	}

}