<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumAliasedTagError
 */
class ForumAliasedTagErrorException extends PlatformException {

	public function __construct($message, $code = 511, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
