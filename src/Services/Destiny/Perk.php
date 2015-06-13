<?php

namespace BungieNetPlatform\Services\Destiny;

/**
 * Perk
 */
class Perk extends \Cola\Object {
	
	/**
	 * @var \GuzzleHttp\Psr7\Uri
	 */
	public $IconPath;
	
	/**
	 * @var Manifest\Hash
	 */
	public $Hash;
	
	/**
	 * @var bool
	 */
	public $IsActive;
	
	public function __construct() {
		
	}

}
