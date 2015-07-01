<?php

namespace BungieNetPlatform\Services\Destiny;

use Cola\ArrayList;

/**
 * DestinyAccount
 */
class DestinyAccount extends \Cola\Object {

	/**
	 * @var string
	 */
	public $MembershipId;
	
	/**
	 * @var \BungieNetPlatform\Enums\BungieMembershipType
	 */
	public $MembershipType;
	
	/**
	 * @var ArrayList|Character[]
	 */
	public $Characters;
	
	/**
	 * @var string
	 */
	public $ClanName;
	
	/**
	 * @var string
	 */
	public $ClanTag;
	
	/**
	 * @var Inventory
	 */
	public $Inventory;
	
	/**
	 * @var int
	 */
	public $GrimoireScore;
	
	public function __construct() {
		$this->Characters = new ArrayList();
	}

}
