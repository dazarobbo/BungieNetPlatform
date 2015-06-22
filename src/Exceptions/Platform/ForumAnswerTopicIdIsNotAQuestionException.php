<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumAnswerTopicIdIsNotAQuestion
 */
class ForumAnswerTopicIdIsNotAQuestionException extends PlatformException {

	public function __construct($message, $code = 568, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
