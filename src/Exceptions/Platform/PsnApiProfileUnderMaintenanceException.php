<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * PsnApiProfileUnderMaintenance
 */
class PsnApiProfileUnderMaintenanceException extends PlatformException {

	public function __construct($message, $code = 1236, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
