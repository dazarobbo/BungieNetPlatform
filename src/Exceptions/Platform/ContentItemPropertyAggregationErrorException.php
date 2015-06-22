<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentItemPropertyAggregationError
 */
class ContentItemPropertyAggregationErrorException extends PlatformException {

	public function __construct($message, $code = 124, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
