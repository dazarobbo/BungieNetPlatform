<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumUrlExpectedButMissing
 */
class ForumUrlExpectedButMissingException extends PlatformException {

	public function __construct($message, $code = 526, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
