<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TagsUnableToLoadPopularTagsFromDatabase
 */
class TagsUnableToLoadPopularTagsFromDatabaseException extends PlatformException {

	public function __construct($message, $code = 905, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
