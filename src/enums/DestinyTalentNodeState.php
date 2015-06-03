<?php

namespace BungieNetPlatform\Enums;

/**
 * DestinyTalentNodeState
 */
class DestinyTalentNodeState extends \Cola\Enum {

	const INVALID = 0;
	const CAN_UPGRADE = 1;
	const NO_POINTS = 2;
	const NO_PREREQUISITES = 3;
	const NO_STEPS = 4;
	const NO_UNLOCK = 5;
	const NO_MATERIAL = 6;
	const NO_GRID_LEVEL = 7;
	const SWAPPING_LOCKED = 8;
	const MUST_SWAP = 9;
	const COMPLETE = 10;
	const UNKNOWN = 11;
	const CREATION_ONLY = 12;

}
