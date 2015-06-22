<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * PsnApiProfilePrivacyRestriction
 */
class PsnApiProfilePrivacyRestrictionException extends PlatformException {

	public function __construct($message, $code = 1235, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
