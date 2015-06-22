<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentReviewDataChanged
 */
class ContentReviewDataChangedException extends PlatformException {

	public function __construct($message, $code = 160, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
