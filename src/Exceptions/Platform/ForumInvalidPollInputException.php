<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumInvalidPollInput
 */
class ForumInvalidPollInputException extends PlatformException {

	public function __construct($message, $code = 573, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
