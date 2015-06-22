<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPerforceUnmatchedFileError
 */
class ContentPerforceUnmatchedFileErrorException extends PlatformException {

	public function __construct($message, $code = 142, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
