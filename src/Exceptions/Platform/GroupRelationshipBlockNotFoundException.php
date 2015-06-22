<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupRelationshipBlockNotFound
 */
class GroupRelationshipBlockNotFoundException extends PlatformException {

	public function __construct($message, $code = 638, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
