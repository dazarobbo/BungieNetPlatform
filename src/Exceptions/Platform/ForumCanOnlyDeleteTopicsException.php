<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumCanOnlyDeleteTopics
 */
class ForumCanOnlyDeleteTopicsException extends PlatformException {

	public function __construct($message, $code = 557, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
