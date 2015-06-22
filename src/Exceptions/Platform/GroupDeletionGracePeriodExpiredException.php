<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupDeletionGracePeriodExpired
 */
class GroupDeletionGracePeriodExpiredException extends PlatformException {

	public function __construct($message, $code = 627, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
