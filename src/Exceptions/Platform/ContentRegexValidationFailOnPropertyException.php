<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentRegexValidationFailOnProperty
 */
class ContentRegexValidationFailOnPropertyException extends PlatformException {

	public function __construct($message, $code = 152, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
