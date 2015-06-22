<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentTypeNotFound
 */
class ContentTypeNotFoundException extends PlatformException {

	public function __construct($message, $code = 121, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
