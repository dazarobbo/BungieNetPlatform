<?php

namespace BungieNetPlatform\Services\Destiny;

/**
 * Node
 */
class Node extends \Cola\Object {

	/**
	 * @var bool
	 */
	public $IsActivated;
	
	/**
	 * @var int
	 */
	public $StepIndex;
	
	/**
	 * @var int|UNKNOWN ENUM?
	 */
	public $State;
	
	/**
	 * @var bool
	 */
	public $Hidden;
	
	/**
	 * @var Manifest\Hash
	 */
	public $Hash;
	
	public function __construct() {
		
	}

}
