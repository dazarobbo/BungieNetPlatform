<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupRelationshipRequestPending
 */
class GroupRelationshipRequestPendingException extends PlatformException {

	public function __construct($message, $code = 635, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
