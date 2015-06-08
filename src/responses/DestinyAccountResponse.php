<?php

namespace BungieNetPlatform\Responses;

use BungieNetPlatform\Services\Destiny\DestinyAccount;
use BungieNetPlatform\Enums\BungieMembershipType;
use BungieNetPlatform\Services\Destiny\Manifest\Hash;
use BungieNetPlatform\Services\Destiny\Inventory;

/**
 * DestinyAccountResponse
 */
class DestinyAccountResponse extends Response {
	
	/**
	 * @var DestinyAccount
	 */
	public $Account;
	
	public function __construct(\stdClass $json) {
		
		parent::__construct($json);
		
		$this->Account = Parsing\Account::parseAccount($json->Response->data);
		
	}
	
	public function __toString() {
		return $this->Account->MembershipId;
	}

}
