<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumUnknownSqlResultDuringTagIdRetrieval
 */
class ForumUnknownSqlResultDuringTagIdRetrievalException extends PlatformException {

	public function __construct($message, $code = 517, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
