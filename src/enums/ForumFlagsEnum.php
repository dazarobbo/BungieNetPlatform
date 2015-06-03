<?php

namespace BungieNetPlatform\Enums;

/**
 * ForumFlagsEnum
 */
class ForumFlagsEnum extends \Cola\BitwiseEnum {

	const NONE = 0;
	const BUNGIE_STAFF_POST = 1;
	const FORUM_NINJA_POST = 2;
	const FORUM_MENTOR_POST = 4;
	const TOPIC_BUNGIE_STAFF_POSTED = 8;
	const TOPIC_BUNGIE_VOLUNTEER_POSTED = 16;
	const QUESTION_ANSWERED_BY_BUNGIE = 32;
	const QUESTION_ANSWERED_BY_NINJA = 64;

}
