<?php

namespace BungieNetPlatform\Enums;

/**
 * NotificationType
 */
class NotificationType extends \Cola\Enum {

	const MESSAGE = 1;
	const FORUM_REPLY = 2;
	const NEW_ACTIVITY_ROLLUP = 3;
	const SETTINGS_CHANGE = 4;
	const GROUP_ACCEPTANCE = 5;
	const GROUP_JOIN_REQUEST = 6;
	const FOLLOW_USER_ACTIVITY = 7;
	const FRIEND_USER_ACTIVITY = 8;
	const FORUM_LIKE = 9;
	const FOLLOWED = 10;
	const GROUP_BANNED = 11;
	const BANNED = 12;
	const UNBANNED = 13;
	const GROUP_OPEN_JOIN = 14;
	const GROUP_ALLIANCE_JOIN_REQUESTED = 15;
	const GROUP_ALLIANCE_JOIN_REJECTED = 16;
	const GROUP_ALLIANCE_JOIN_APPROVED = 17;
	const GROUP_ALLIANCE_BROKEN = 18;
	const GROUP_DENIAL = 19;
	const WARNED = 20;
	const CLAN_DISABLED = 21;
	const GROUP_ALLIANCE_INVITE_REQUESTED = 22;
	const GROUP_ALLIANCE_INVITE_REJECTED = 23;
	const GROUP_ALLIANCE_INVITE_APPROVED = 24;
	const GROUP_FOLLOWED_BY_GROUP = 25;
	const GRIMOIRE_UNOBSERVED_CARDS = 26;

}