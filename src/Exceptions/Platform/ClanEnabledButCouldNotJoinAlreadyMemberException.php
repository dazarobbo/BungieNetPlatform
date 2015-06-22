<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ClanEnabledButCouldNotJoinAlreadyMember
 */
class ClanEnabledButCouldNotJoinAlreadyMemberException extends PlatformException {

	public function __construct($message, $code = 656, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
