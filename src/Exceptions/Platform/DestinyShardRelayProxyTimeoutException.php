<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * DestinyShardRelayProxyTimeout
 */
class DestinyShardRelayProxyTimeoutException extends PlatformException {

	public function __construct($message, $code = 1652, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
