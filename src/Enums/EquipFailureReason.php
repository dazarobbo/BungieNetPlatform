<?php

namespace BungieNetPlatform\Enums;

/**
 * EquipFailureReason
 */
class EquipFailureReason extends \Cola\BitwiseEnum {

	const NONE = 0;
	const ITEM_UNEQUIPPABLE = 1;
	const ITEM_UNIQUE_EQUIP_RESTRICTED = 2;
	const ITEM_FAILED_UNLOCK_CHECK = 4;
	const ITEM_FAILED_LEVEL_CHECK = 8;
	const ITEM_NOT_ON_CHARACTER = 16;

}
