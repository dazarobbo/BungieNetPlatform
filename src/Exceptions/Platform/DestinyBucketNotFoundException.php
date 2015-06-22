<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyBucketNotFound
 */
class DestinyBucketNotFoundException extends PlatformException {

	public function __construct($message, $code = 1633, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
