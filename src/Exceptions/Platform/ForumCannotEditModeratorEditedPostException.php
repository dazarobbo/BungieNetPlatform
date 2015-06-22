<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumCannotEditModeratorEditedPost
 */
class ForumCannotEditModeratorEditedPostException extends PlatformException {

	public function __construct($message, $code = 575, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
