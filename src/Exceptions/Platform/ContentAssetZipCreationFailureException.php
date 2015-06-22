<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentAssetZipCreationFailure
 */
class ContentAssetZipCreationFailureException extends PlatformException {

	public function __construct($message, $code = 127, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
