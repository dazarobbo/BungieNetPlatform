<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ItemAlreadyFollowed
 */
class ItemAlreadyFollowedException extends PlatformException {

	public function __construct($message, $code = 801, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
