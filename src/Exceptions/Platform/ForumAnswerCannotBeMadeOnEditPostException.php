<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumAnswerCannotBeMadeOnEditPost
 */
class ForumAnswerCannotBeMadeOnEditPostException extends PlatformException {

	public function __construct($message, $code = 566, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
