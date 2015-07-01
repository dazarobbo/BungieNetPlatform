<?php

namespace BungieNetPlatform\Responses;

use BungieNetPlatform\PlatformResponse;
use BungieNetPlatform\Services\Destiny\DestinyAccount;

/**
 * DestinyAccountResponse
 */
class DestinyAccountResponse extends Response {
	
	/**
	 * @var DestinyAccount
	 */
	public $Account;
	
	public function __construct(PlatformResponse $response) {
		
		parent::__construct($response);
		
		$this->Account = Parsing\Account::parseAccount(
				$response->getResponse()->data);
		
	}
	
	public function __toString() {
		return (string)$this->Account->MembershipId;
	}

}
