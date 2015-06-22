<?php

namespace BungieNetPlatform\Exceptions\Platform;

use BungieNetPlatform\Exceptions\PlatformException;

/**
 * ForumCannotUseOfficialTagCategoryAsTag
 */
class ForumCannotUseOfficialTagCategoryAsTagException extends PlatformException {

	public function __construct($message, $code = 564, \Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}

}
