<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPackagesInconsistentType
 */
class ContentPackagesInconsistentTypeException extends PlatformException {

	public function __construct($message, $code = 133, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
