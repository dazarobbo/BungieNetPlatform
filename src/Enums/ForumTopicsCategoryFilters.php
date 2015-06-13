<?php

namespace BungieNetPlatform\Enums;

/**
 * ForumTopicsCategoryFilters
 */
class ForumTopicsCategoryFilters extends \Cola\BitwiseEnum {

	const NONE = 0;
	const LINKS = 1;
	const QUESTIONS = 2;
	const ANSWERED_QUESTIONS = 4;
	const MEDIA = 8;
	const TEXT_ONLY = 16;
	const ANNOUNCEMENT = 32;
	const BUNGIE_OFFICIAL = 64;
	const POLLS = 128;
	
}
