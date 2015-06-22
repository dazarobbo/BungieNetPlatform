<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupCannotSetClanOnlySettings
 */
class GroupCannotSetClanOnlySettingsException extends PlatformException {

	public function __construct($message, $code = 647, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
