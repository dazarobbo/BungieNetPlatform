<?php

namespace BungieNetPlatform\Responses;

/**
 * ActivityHistoryResponse
 */
class ActivityHistoryResponse extends Response {

	/**
	 * @var \Cola\Set
	 */
	public $Activities;
	
	public function __construct(\stdClass $json) {
		
		parent::__construct($json);
		
		$this->Activities = new \Cola\Set();
		
		foreach($json->Response->data->activities as $act){
			$this->Activities[] = Parsing\Character::parseActivityHistoryItem($act);
		}
		
	}
	
	public function __toString() {
		return \sprintf('%d activities', \count($this->Activities));
	}

}
