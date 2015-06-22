<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentFileUploadFailed
 */
class ContentFileUploadFailedException extends PlatformException {

	public function __construct($message, $code = 136, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
