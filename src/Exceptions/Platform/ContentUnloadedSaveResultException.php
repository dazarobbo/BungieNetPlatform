<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentUnloadedSaveResult
 */
class ContentUnloadedSaveResultException extends PlatformException {

	public function __construct($message, $code = 146, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
