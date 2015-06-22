<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupRelationshipAlreadyExists
 */
class GroupRelationshipAlreadyExistsException extends PlatformException {

	public function __construct($message, $code = 643, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
