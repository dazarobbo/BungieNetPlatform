<?php

namespace BungieNetPlatform\Services\Destiny;

/**
 * ClassDefinition
 */
class ClassDefinition extends \Cola\Object {

	/**
	 * @var Manifest\Hash 
	 */
	public $Hash;
	
	/**
	 * @var \BungieNetPlatform\Enums\DestinyClass 
	 */
	public $Type;
	
	/**
	 * @var string
	 */
	public $Name;
	
	/**
	 * @var string
	 */
	public $NameMale;
	
	/**
	 * @var string
	 */
	public $NameFemale;
	
	/**
	 * @var string
	 */
	public $Identifier;
	
	/**
	 * @var string
	 */
	public $MentorVendorIdentifier;
	
	public function __construct() {
		
	}

}
