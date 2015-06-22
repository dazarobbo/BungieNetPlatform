<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * AlreadyClanMemberOnPlatform
 */
class AlreadyClanMemberOnPlatformException extends PlatformException {

	public function __construct($message, $code = 632, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
