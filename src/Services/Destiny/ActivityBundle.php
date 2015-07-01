<?php

namespace BungieNetPlatform\Services\Destiny;

use Cola\ArrayList;

/**
 * ActivityBundle
 */
class ActivityBundle extends \Cola\Object {

	/**
	 * @var Manifest\Hash
	 */
	public $Hash;
	
	/**
	 * @var string
	 */
	public $Name;
	
	/**
	 * @var string
	 */
	public $Description;
	
	/**
	 * @var \GuzzleHttp\Psr7\Uri 
	 */
	public $Icon;
	
	/**
	 * @var \GuzzleHttp\Psr7\Uri
	 */
	public $ReleaseIcon;
	
	/**
	 * @var \DateTime|null
	 */
	public $ReleaseTime;
	
	/**
	 * @var Manifest\Hash
	 */
	public $DestinationHash;
	
	/**
	 * @var Manifest\Hash
	 */
	public $PlaceHash;
	
	/**
	 * @var Manifest\Hash
	 */
	public $ActivityTypeHash;
	
	/**
	 * @var ArrayList|Manifest\Hash
	 */
	public $ActivityHashes;
	
	
	public function __construct() {
		$this->ActivityHashes = new ArrayList();
	}
	
	public function __toString() {
		
		if($this->Name !== null){
			return $this->Name;
		}
		
		return \sprintf('[%s %s]', __CLASS__, $this->Hash);
		
	}

}
