<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumPostValidationBadUrl
 */
class ForumPostValidationBadUrlException extends PlatformException {

	public function __construct($message, $code = 535, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
