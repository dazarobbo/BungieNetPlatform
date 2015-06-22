<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentNotReviewed
 */
class ContentNotReviewedException extends PlatformException {

	public function __construct($message, $code = 137, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
