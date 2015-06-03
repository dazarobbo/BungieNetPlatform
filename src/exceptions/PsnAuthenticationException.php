<?php

namespace BungieNetPlatform\Exceptions;

/**
 * PsnAuthenticationException
 */
class PsnAuthenticationException extends AuthenticationException {

	public function __construct($message, $code = 0, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
