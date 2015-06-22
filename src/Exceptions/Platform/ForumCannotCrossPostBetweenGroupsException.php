<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumCannotCrossPostBetweenGroups
 */
class ForumCannotCrossPostBetweenGroupsException extends PlatformException {

	public function __construct($message, $code = 544, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
