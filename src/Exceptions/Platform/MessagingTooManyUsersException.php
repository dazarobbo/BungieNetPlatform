<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * MessagingTooManyUsers
 */
class MessagingTooManyUsersException extends PlatformException {

	public function __construct($message, $code = 304, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
