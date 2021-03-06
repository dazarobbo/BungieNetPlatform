<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * MessagingCanNotLeaveConversation
 */
class MessagingCanNotLeaveConversationException extends PlatformException {

	public function __construct($message, $code = 305, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
