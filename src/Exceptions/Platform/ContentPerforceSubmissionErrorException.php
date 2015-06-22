<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ContentPerforceSubmissionError
 */
class ContentPerforceSubmissionErrorException extends PlatformException {

	public function __construct($message, $code = 109, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
