<?php

namespace BungieNetPlatform\Responses;

use Cola\ArrayList;
use BungieNetPlatform\PlatformResponse;
use BungieNetPlatform\Services\Destiny\ActivityHistoryItem;

/**
 * ActivityHistoryResponse
 */
class ActivityHistoryResponse extends Response {

	/**
	 * @var ArrayList|ActivityHistoryItem[]
	 */
	public $Activities;
	
	public function __construct(PlatformResponse $response) {
		
		parent::__construct($response);
		
		$this->Activities = new ArrayList();
		
		foreach($response->getResponse()->data->activities as $act){
			$this->Activities->add(Parsing\Character::parseActivityHistoryItem($act));
		}
		
	}
	
	public function __toString() {
		return \sprintf('%d activities', \count($this->Activities));
	}

}
