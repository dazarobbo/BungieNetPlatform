<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumAnswerCannotBeMadeOnCreatePost
 */
class ForumAnswerCannotBeMadeOnCreatePostException extends PlatformException {

	public function __construct($message, $code = 565, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
