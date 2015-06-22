<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentRollbackRevisionNotInPackage
 */
class ContentRollbackRevisionNotInPackageException extends PlatformException {

	public function __construct($message, $code = 161, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
