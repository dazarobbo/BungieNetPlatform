<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupRelationshipRequestBlocked
 */
class GroupRelationshipRequestBlockedException extends PlatformException {

	public function __construct($message, $code = 636, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
