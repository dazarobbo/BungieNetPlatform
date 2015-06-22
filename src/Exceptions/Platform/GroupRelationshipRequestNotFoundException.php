<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupRelationshipRequestNotFound
 */
class GroupRelationshipRequestNotFoundException extends PlatformException {

	public function __construct($message, $code = 637, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
