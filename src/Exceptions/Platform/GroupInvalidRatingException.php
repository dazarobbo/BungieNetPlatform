<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupInvalidRating
 */
class GroupInvalidRatingException extends PlatformException {

	public function __construct($message, $code = 612, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
