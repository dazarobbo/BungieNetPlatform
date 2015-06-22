<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyStatsParameterMembershipIdParseError
 */
class DestinyStatsParameterMembershipIdParseErrorException extends PlatformException {

	public function __construct($message, $code = 1608, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
