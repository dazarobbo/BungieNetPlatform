<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * NoValidTagsInList
 */
class NoValidTagsInListException extends PlatformException {

	public function __construct($message, $code = 900, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
