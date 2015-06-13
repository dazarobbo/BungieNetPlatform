<?php

namespace BungieNetPlatform\Services\Destiny;

use Cola\Functions\String;

/**
 * Stat
 */
class Stat extends \Cola\Object {

	/**
	 * @var Manifest\Hash
	 */
	public $Hash;
	
	/**
	 * @var string
	 */
	public $Name;
	
	/**
	 * @var int
	 */
	public $Value;
	
	/**
	 * @var int
	 */
	public $MaximumValue;

	public function __construct() {
		
	}
	
	public function getNameWithoutPrefix(){
		return preg_replace('/^[A-Z]_/', String::EEMPTY, $this->Name, 1);
	}

}
