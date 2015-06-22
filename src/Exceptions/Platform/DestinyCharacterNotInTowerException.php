<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyCharacterNotInTower
 */
class DestinyCharacterNotInTowerException extends PlatformException {

	public function __construct($message, $code = 1634, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
