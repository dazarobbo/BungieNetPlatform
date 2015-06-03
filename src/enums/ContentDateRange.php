<?php

namespace BungieNetPlatform\Enums;

/**
 * ContentDateRange
 */
class ContentDateRange extends \Cola\Enum {

	const ALL = 0;
	const TODAY = 1;
	const YESTERDAY = 2;
	const THIS_MONTH = 3;
	const THIS_YEAR = 4;
	const LAST_YEAR = 5;
	const EARLIER_THAN_LAST_YEAR = 6;

}
