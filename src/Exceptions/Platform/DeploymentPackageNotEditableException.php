<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DeploymentPackageNotEditable
 */
class DeploymentPackageNotEditableException extends PlatformException {

	public function __construct($message, $code = 118, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
