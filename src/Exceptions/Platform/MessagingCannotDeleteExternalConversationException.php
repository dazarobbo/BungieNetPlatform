<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * MessagingCannotDeleteExternalConversation
 */
class MessagingCannotDeleteExternalConversationException extends PlatformException {

	public function __construct($message, $code = 308, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
