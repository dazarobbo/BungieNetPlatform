<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentDeploymentPackageNotReadyError
 */
class ContentDeploymentPackageNotReadyErrorException extends PlatformException {

	public function __construct($message, $code = 111, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
