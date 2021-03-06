<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentInvalidLinkToInternalEnvironment
 */
class ContentInvalidLinkToInternalEnvironmentException extends PlatformException {

	public function __construct($message, $code = 167, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
