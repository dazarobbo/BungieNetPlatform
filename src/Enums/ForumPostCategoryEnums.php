<?php

namespace BungieNetPlatform\Enums;

/**
 * ForumPostCategoryEnums
 */
class ForumPostCategoryEnums extends \Cola\BitwiseEnum {

	const NONE = 0;
	const TEXT_ONLY = 1;
	const MEDIA = 2;
	const LINK = 4;
	const POLL = 8;
	const QUESTION = 16;
	const ANSWERED = 32;
	const ANNOUNCEMENT = 64;
	const CONTENT_COMMENT = 128;
	const BUNGIE_OFFICIAL = 256;
	const NINJA_OFFICIAL = 512;

}
