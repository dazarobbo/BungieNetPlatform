<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * NotificationSettingInvalid
 */
class NotificationSettingInvalidException extends PlatformException {

	public function __construct($message, $code = 1100, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
