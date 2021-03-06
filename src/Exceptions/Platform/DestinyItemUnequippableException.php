<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyItemUnequippable
 */
class DestinyItemUnequippableException extends PlatformException {

	public function __construct($message, $code = 1640, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
