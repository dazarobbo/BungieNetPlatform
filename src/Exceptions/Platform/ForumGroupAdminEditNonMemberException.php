<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumGroupAdminEditNonMember
 */
class ForumGroupAdminEditNonMemberException extends PlatformException {

	public function __construct($message, $code = 574, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
