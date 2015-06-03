<?php

namespace BungieNetPlatform\Enums;

/**
 * OptInFlags
 */
class OptInFlags extends \Cola\BitwiseEnum {

	const NEWSLETTER = 1;
	const SYSTEM = 2;
	const MARKETING = 4;
	const USER_RESEARCH = 8;
	const CUSTOMER_SERVICE = 16;

}
