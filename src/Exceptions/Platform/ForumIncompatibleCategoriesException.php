<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumIncompatibleCategories
 */
class ForumIncompatibleCategoriesException extends PlatformException {

	public function __construct($message, $code = 555, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
