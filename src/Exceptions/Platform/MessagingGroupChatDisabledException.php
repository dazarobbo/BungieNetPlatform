<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * MessagingGroupChatDisabled
 */
class MessagingGroupChatDisabledException extends PlatformException {

	public function __construct($message, $code = 309, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
