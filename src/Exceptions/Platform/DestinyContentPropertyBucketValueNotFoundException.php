<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyContentPropertyBucketValueNotFound
 */
class DestinyContentPropertyBucketValueNotFoundException extends PlatformException {

	public function __construct($message, $code = 1617, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
