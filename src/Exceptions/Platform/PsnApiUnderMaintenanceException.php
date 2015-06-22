<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * PsnApiUnderMaintenance
 */
class PsnApiUnderMaintenanceException extends PlatformException {

	public function __construct($message, $code = 1233, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
