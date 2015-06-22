<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenAlreadyClaimedSelf
 */
class TokenAlreadyClaimedSelfException extends PlatformException {

	public function __construct($message, $code = 2003, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
