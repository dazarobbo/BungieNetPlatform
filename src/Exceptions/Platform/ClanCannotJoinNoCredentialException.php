<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ClanCannotJoinNoCredential
 */
class ClanCannotJoinNoCredentialException extends PlatformException {

	public function __construct($message, $code = 657, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
