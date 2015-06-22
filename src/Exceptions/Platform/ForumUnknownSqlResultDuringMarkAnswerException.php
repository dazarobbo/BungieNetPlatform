<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumUnknownSqlResultDuringMarkAnswer
 */
class ForumUnknownSqlResultDuringMarkAnswerException extends PlatformException {

	public function __construct($message, $code = 570, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
