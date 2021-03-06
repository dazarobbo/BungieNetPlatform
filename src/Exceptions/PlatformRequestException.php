<?php

namespace BungieNetPlatform\Exceptions;

/**
 * PlatformRequestException
 */
class PlatformRequestException extends PlatformException {

	public function __construct($message, $code = 0, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}

