<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyContentSectionNotFound
 */
class DestinyContentSectionNotFoundException extends PlatformException {

	public function __construct($message, $code = 1614, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
