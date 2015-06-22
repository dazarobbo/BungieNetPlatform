<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyErrorDeserializationFailure
 */
class DestinyErrorDeserializationFailureException extends PlatformException {

	public function __construct($message, $code = 1649, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
