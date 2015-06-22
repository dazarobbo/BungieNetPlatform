<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyDefinitionsNotLoaded
 */
class DestinyDefinitionsNotLoadedException extends PlatformException {

	public function __construct($message, $code = 1636, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
