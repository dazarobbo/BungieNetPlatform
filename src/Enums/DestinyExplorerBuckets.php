<?php

namespace BungieNetPlatform\Enums;

/**
 * DestinyExplorerBuckets
 */
class DestinyExplorerBuckets extends \Cola\BitwiseEnum {

	const NONE = 0;
	const ARTIFACT = 1;
	const MATERIALS = 2;
	const CONSUMABLES = 4;
	const MISSION = 8;
	const BOUNTIES = 16;
	const BUILD = 32;
	const PRIMARY_WEAPON = 64;
	const SPECIAL_WEAPON = 128;
	const HEAVY_WEAPON = 256;
	const HEAD = 512;
	const ARMS = 1024;
	const CHEST = 2048;
	const LEGS = 4096;
	const CLASS_ITEMS = 8192;
	const GHOST = 16384;
	const VEHICLE = 32768;
	const SHIP = 65536;
	const SHADER = 131072;
	const EMBLEM = 262144;

}
