<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumUnknownExceptionGetOrCreateTags
 */
class ForumUnknownExceptionGetOrCreateTagsException extends PlatformException {

	public function __construct($message, $code = 515, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
