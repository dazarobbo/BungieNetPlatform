<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyShardRelayClientTimeout
 */
class DestinyShardRelayClientTimeoutException extends PlatformException {

	public function __construct($message, $code = 1651, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
