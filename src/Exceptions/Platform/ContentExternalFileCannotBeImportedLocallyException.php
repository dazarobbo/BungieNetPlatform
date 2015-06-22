<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentExternalFileCannotBeImportedLocally
 */
class ContentExternalFileCannotBeImportedLocallyException extends PlatformException {

	public function __construct($message, $code = 140, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
