<?php

namespace BungieNetPlatform\Enums;

/**
 * ActivityType
 */
class ActivityType extends \Cola\Enum {

	const CREATE = 0;
	const EDIT = 1;
	const DELETE = 2;
	const RATE = 3;
	const FOLLOW = 4;
	const UNFOLLOW = 5;
	const APPLY = 6;
	const RESCIND = 7;
	const APPROVE = 8;
	const DENY = 9;
	const KICK = 10;
	const EDIT_MEMBERSHIP_TYPE = 11;
	const LIKE = 12;
	const UNLIKE = 13;
	const SHARE = 14;
	const TAGGED_GROUP = 15;
	const TAGGED_TOPIC = 16;
	const AVATAR_CHANGED = 17;
	const DISPLAY_NAME_CHANGED = 18;
	const TITLE_CHANGED = 19;
	const TITLE_UNLOCKED = 20;
	const GROUP_TOPIC_CREATE = 21;
	const GROUP_REPLY_CREATE = 22;
	const REPLY = 23;
	const CHANGE_CLAN_NAME = 24;
	const GROUP_ALLIANCE_REJECTED = 26;

}
