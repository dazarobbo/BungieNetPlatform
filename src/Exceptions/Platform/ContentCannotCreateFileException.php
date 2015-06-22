<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentCannotCreateFile
 */
class ContentCannotCreateFileException extends PlatformException {

	public function __construct($message, $code = 156, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
