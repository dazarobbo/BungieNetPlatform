<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ItemNotFollowed
 */
class ItemNotFollowedException extends PlatformException {

	public function __construct($message, $code = 802, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
