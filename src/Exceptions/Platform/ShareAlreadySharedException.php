<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ShareAlreadyShared
 */
class ShareAlreadySharedException extends PlatformException {

	public function __construct($message, $code = 706, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
