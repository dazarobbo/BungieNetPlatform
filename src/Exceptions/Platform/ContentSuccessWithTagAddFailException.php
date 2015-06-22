<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentSuccessWithTagAddFail
 */
class ContentSuccessWithTagAddFailException extends PlatformException {

	public function __construct($message, $code = 104, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
