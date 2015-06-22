<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * FailedToLoadAvailableLocalesConfiguration
 */
class FailedToLoadAvailableLocalesConfigurationException extends PlatformException {

	public function __construct($message, $code = 6, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
