<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * GroupMissingTags
 */
class GroupMissingTagsException extends PlatformException {

	public function __construct($message, $code = 610, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
