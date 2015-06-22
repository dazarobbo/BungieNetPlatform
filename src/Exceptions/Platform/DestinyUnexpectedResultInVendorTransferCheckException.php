<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyUnexpectedResultInVendorTransferCheck
 */
class DestinyUnexpectedResultInVendorTransferCheckException extends PlatformException {

	public function __construct($message, $code = 1647, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
