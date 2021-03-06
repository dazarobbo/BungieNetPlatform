<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TagSuggestionsUnknownSqlResult
 */
class TagSuggestionsUnknownSqlResultException extends PlatformException {

	public function __construct($message, $code = 904, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
