<?php

namespace BungieNetPlatform\Enums;

/**
 * IgnoreStatus
 */
class IgnoreStatus extends \Cola\BitwiseEnum {

	const NOT_IGNORED = 0;
	const IGNORED_USER = 1;
	const IGNORED_GROUP = 2;
	const IGNORED_BY_GROUP = 4;
	const IGNORED_POST = 8;
	const IGNORED_TAG = 16;
	const IGNORED_GLOBAL = 32;

}
