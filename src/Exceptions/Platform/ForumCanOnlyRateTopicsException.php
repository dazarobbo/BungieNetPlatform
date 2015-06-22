<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumCanOnlyRateTopics
 */
class ForumCanOnlyRateTopicsException extends PlatformException {

	public function __construct($message, $code = 561, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
