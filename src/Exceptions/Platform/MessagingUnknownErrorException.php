<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * MessagingUnknownError
 */
class MessagingUnknownErrorException extends PlatformException {

	public function __construct($message, $code = 300, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
