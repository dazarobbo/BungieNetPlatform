<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPropertyCannotDeserialize
 */
class ContentPropertyCannotDeserializeException extends PlatformException {

	public function __construct($message, $code = 151, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
