<?php

namespace BungieNetPlatform\Enums;

/**
 * ReportResolutionStatus
 */
class ReportResolutionStatus extends \Cola\Enum {

	const UNRESOLVED = 0;
	const INNOCENT = 1;
	const GUILTY_BAN = 2;
	const GUILTY_BLAST_BAN = 3;
	const GUILTY_WARN = 4;
	const GUILTY_ALIAS = 5;
	const RESOLVE_NO_ACTION = 6;

}
