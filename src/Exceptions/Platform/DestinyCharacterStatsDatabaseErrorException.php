<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyCharacterStatsDatabaseError
 */
class DestinyCharacterStatsDatabaseErrorException extends PlatformException {

	public function __construct($message, $code = 0, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
