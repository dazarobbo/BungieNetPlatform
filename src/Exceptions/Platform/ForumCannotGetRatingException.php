<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumCannotGetRating
 */
class ForumCannotGetRatingException extends PlatformException {

	public function __construct($message, $code = 518, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
