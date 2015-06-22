<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DeploymentPackageNotFound
 */
class DeploymentPackageNotFoundException extends PlatformException {

	public function __construct($message, $code = 122, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
