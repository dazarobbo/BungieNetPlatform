<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * TokenProvisioningBadVendorOrOffer
 */
class TokenProvisioningBadVendorOrOfferException extends PlatformException {

	public function __construct($message, $code = 2010, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
