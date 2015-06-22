<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumAnnouncementNotAllowed
 */
class ForumAnnouncementNotAllowedException extends PlatformException {

	public function __construct($message, $code = 538, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
