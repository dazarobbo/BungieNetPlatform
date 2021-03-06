<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenAlreadyClaimed
 */
class TokenAlreadyClaimedException extends PlatformException {

	public function __construct($message, $code = 2002, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
