<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumEditNoOp
 */
class ForumEditNoOpException extends PlatformException {

	public function __construct($message, $code = 540, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
