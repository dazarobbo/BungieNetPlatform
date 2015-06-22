<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentFolderNotFound
 */
class ContentFolderNotFoundException extends PlatformException {

	public function __construct($message, $code = 130, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
