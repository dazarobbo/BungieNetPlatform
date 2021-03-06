<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupRelationshipNotFound
 */
class GroupRelationshipNotFoundException extends PlatformException {

	public function __construct($message, $code = 639, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
