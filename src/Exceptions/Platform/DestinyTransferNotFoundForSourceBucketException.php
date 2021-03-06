<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyTransferNotFoundForSourceBucket
 */
class DestinyTransferNotFoundForSourceBucketException extends PlatformException {

	public function __construct($message, $code = 1646, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
