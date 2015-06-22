<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumRepliesCannotBeInDifferentGroups
 */
class ForumRepliesCannotBeInDifferentGroupsException extends PlatformException {

	public function __construct($message, $code = 528, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
