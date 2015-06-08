<?php

namespace BungieNetPlatform\Enums;

/**
 * DestinyClass
 */
class DestinyClass extends \Cola\Enum {

	const TITAN = 0;
	const HUNTER = 1;
	const WARLOCK = 2;
	const UNKNOWN = 3;
	
	/**
	 * Returns the name of the class as a capitalised word
	 * @example 'Warlock'
	 * @return type
	 */
	public function toWord(){
		return \ucfirst(\strtolower($this->getName()));
	}

}
