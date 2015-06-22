<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentItemNotBasedOnLatestRevision
 */
class ContentItemNotBasedOnLatestRevisionException extends PlatformException {

	public function __construct($message, $code = 162, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
