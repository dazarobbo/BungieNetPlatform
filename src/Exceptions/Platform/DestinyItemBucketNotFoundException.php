<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyItemBucketNotFound
 */
class DestinyItemBucketNotFoundException extends PlatformException {

	public function __construct($message, $code = 1629, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
