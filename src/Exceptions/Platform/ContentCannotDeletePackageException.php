<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentCannotDeletePackage
 */
class ContentCannotDeletePackageException extends PlatformException {

	public function __construct($message, $code = 134, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
