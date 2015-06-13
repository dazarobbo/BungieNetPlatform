<?php

namespace BungieNetPlatform\Enums;

/**
 * VendorItemStatus
 */
class VendorItemStatus extends \Cola\BitwiseEnum {

	const SUCCESS = 0;
	const NO_INVENTORY_SPACE = 1;
	const NO_FUNDS = 2;
	const NO_PROGRESSION = 4;
	const NO_UNLOCK = 8;
	const NO_QUANTITY = 16;
	const OUTSIDE_PURCHASE_WINDOW = 32;
	const NOT_AVAILABLE = 64;
	const UNIQUENESS_VIOLATION = 128;
	const UNKNOWN_ERROR = 256;
	const ALREADY_SELLING = 512;
	const UNSELLABLE = 1024;
	const SELLING_INHIBITED = 2048;
	
}
