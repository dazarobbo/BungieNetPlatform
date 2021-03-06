<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * MessagingNoBody
 */
class MessagingNoBodyException extends PlatformException {

	public function __construct($message, $code = 303, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
