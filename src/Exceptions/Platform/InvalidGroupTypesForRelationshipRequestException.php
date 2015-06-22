<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * InvalidGroupTypesForRelationshipRequest
 */
class InvalidGroupTypesForRelationshipRequestException extends PlatformException {

	public function __construct($message, $code = 644, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
