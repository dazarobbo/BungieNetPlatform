<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyItemNotFound
 */
class DestinyItemNotFoundException extends PlatformException {

	public function __construct($message, $code = 1623, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
