<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * CannotGetSuggestionsOnMultipleTagsSimultaneously
 */
class CannotGetSuggestionsOnMultipleTagsSimultaneouslyException extends PlatformException {

	public function __construct($message, $code = 902, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
