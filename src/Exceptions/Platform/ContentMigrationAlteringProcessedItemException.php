<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentMigrationAlteringProcessedItem
 */
class ContentMigrationAlteringProcessedItemException extends PlatformException {

	public function __construct($message, $code = 158, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
