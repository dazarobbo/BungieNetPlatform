<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * MessagingDeletedUserForbidden
 */
class MessagingDeletedUserForbiddenException extends PlatformException {

	public function __construct($message, $code = 307, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
