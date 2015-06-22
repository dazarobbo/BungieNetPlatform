<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyCharacterNotFound
 */
class DestinyCharacterNotFoundException extends PlatformException {

	public function __construct($message, $code = 1620, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
