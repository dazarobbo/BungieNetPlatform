<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumCannotUseTheseCategoriesOnNonTopicPost
 */
class ForumCannotUseTheseCategoriesOnNonTopicPostException extends PlatformException {

	public function __construct($message, $code = 556, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
