<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DeploymentPackageFileNotFound
 */
class DeploymentPackageFileNotFoundException extends PlatformException {

	public function __construct($message, $code = 125, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
