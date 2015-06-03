<?php

namespace BungieNetPlatform\Exceptions;

/**
 * AuthenticationException
 */
class AuthenticationException extends \Exception {

	public function __construct($message, $code = 0, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

	public function __toString() {
		return \sprintf('%s: [%d]: %s', __CLASS__, $this->code,
				$this->message) . \PHP_EOL;
	}

}
