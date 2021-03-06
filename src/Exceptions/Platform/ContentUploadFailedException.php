<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentUploadFailed
 */
class ContentUploadFailedException extends PlatformException {

	public function __construct($message, $code = 112, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
