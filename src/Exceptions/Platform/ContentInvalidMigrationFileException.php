<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentInvalidMigrationFile
 */
class ContentInvalidMigrationFileException extends PlatformException {

	public function __construct($message, $code = 157, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
