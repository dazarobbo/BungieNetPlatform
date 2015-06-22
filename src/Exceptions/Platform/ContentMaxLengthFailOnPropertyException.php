<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentMaxLengthFailOnProperty
 */
class ContentMaxLengthFailOnPropertyException extends PlatformException {

	public function __construct($message, $code = 153, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
