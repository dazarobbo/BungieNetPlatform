<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * UserTermsOfUseRequired
 */
class UserTermsOfUseRequiredException extends PlatformException {

	public function __construct($message, $code = 215, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
