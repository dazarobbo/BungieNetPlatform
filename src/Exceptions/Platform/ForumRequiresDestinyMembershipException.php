<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumRequiresDestinyMembership
 */
class ForumRequiresDestinyMembershipException extends PlatformException {

	public function __construct($message, $code = 576, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
