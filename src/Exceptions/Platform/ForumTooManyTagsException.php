<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumTooManyTags
 */
class ForumTooManyTagsException extends PlatformException {

	public function __construct($message, $code = 560, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
