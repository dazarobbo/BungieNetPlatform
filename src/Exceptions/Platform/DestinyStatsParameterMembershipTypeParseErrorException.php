<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyStatsParameterMembershipTypeParseError
 */
class DestinyStatsParameterMembershipTypeParseErrorException extends PlatformException {

	public function __construct($message, $code = 1607, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
