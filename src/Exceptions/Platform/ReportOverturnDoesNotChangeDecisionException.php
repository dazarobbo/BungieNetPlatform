<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ReportOverturnDoesNotChangeDecision
 */
class ReportOverturnDoesNotChangeDecisionException extends PlatformException {

	public function __construct($message, $code = 1401, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
