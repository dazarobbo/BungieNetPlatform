<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyItemUniqueEquipRestricted
 */
class DestinyItemUniqueEquipRestrictedException extends PlatformException {

	public function __construct($message, $code = 1641, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
