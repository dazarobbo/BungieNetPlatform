<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ReportNotFound
 */
class ReportNotFoundException extends PlatformException {

	public function __construct($message, $code = 1402, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
