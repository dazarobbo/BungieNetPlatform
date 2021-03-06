<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPerforceChangelistFileItemsNotFound
 */
class ContentPerforceChangelistFileItemsNotFoundException extends PlatformException {

	public function __construct($message, $code = 144, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
