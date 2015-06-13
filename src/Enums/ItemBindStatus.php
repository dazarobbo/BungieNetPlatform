<?php

namespace BungieNetPlatform\Enums;

/**
 * ItemBindStatus
 */
class ItemBindStatus extends \Cola\Enum {

	const NOT_BOUND = 0;
	const BOUND_TO_CHARACTER = 1;
	const BOUND_TO_ACCOUNT = 2;
	const BOUND_TO_GUILD = 3;

}
