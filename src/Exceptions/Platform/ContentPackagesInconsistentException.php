<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPackagesInconsistent
 */
class ContentPackagesInconsistentException extends PlatformException {

	public function __construct($message, $code = 131, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
