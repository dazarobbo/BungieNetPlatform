<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumBodyCannotBeEmpty
 */
class ForumBodyCannotBeEmptyException extends PlatformException {

	public function __construct($message, $code = 500, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
