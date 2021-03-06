<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumSubjectTooLong
 */
class ForumSubjectTooLongException extends PlatformException {

	public function __construct($message, $code = 537, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
