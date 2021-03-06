<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentCannotCreateDeploymentPackage
 */
class ContentCannotCreateDeploymentPackageException extends PlatformException {

	public function __construct($message, $code = 164, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
