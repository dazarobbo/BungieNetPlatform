<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * AddSurveyAnswersUnknownSqlException
 */
class AddSurveyAnswersUnknownSqlException extends PlatformException {

	public function __construct($message, $code = 400, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
