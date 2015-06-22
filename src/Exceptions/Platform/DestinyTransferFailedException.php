<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyTransferFailed
 */
class DestinyTransferFailedException extends PlatformException {

	public function __construct($message, $code = 1645, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
