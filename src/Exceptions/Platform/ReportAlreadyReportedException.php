<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ReportAlreadyReported
 */
class ReportAlreadyReportedException extends PlatformException {

	public function __construct($message, $code = 1403, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
