<?php

namespace BungieNetPlatform\Responses;

use BungieNetPlatform\Services\Destiny\DestinyAccount;

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
