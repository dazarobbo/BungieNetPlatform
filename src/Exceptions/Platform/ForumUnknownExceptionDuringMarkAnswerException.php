<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumUnknownExceptionDuringMarkAnswer
 */
class ForumUnknownExceptionDuringMarkAnswerException extends PlatformException {

	public function __construct($message, $code = 569, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
