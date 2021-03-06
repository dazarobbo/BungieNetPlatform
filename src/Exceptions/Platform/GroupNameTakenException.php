<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupNameTaken
 */
class GroupNameTakenException extends PlatformException {

	public function __construct($message, $code = 626, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
