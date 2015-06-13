<?php

namespace BungieNetPlatform\Services\Destiny;

use Cola\Functions\String;

/**
 * StatCollection
 */
class StatCollection extends \Cola\Set {

	public function __construct() {
		parent::__construct();
	}
	
	public function getStat($name){
		
		$statName = \strtoupper(\trim($name));
		
		if(!String::startsWith($statName, 'STAT_')){
			$statName = 'STAT_' . $statName;
		}
		
		if($this->offsetExists($statName)){
			return $this->offsetGet($statName);
		}
		
	}

}
