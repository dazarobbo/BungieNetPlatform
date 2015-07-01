<?php

namespace BungieNetPlatform\Services\User;

/**
 * User
 */
class User extends \Cola\Object {

	/**
	 * @var string
	 */
	public $MembershipId;
	
	/**
	 * @var string
	 */
	public $UniqueName;
	
	/**
	 * @var string 
	 */
	public $DisplayName;
	
	/**
	 * @var int
	 */
	public $ProfilePicture;
	
	/**
	 * @var int
	 */
	public $ProfileTheme;
	
	/**
	 * @var int
	 */
	public $UserTitle;
	
	/**
	 * @var int 
	 */
	public $SuccessMessageFlags;
	
	/**
	 * @var bool
	 */
	public $IsDeleted;
	
	/**
	 * @var string
	 */
	public $About;
	
	/**
	 * @var \DateTime
	 */
	public $FirstAccess;
	
	/**
	 * @var \DateTime
	 */
	public $LastUpdate;
	
	/**
	 * @var UserContext
	 */
	public $Context;
	
	/**
	 * @var string
	 */
	public $XboxDisplayName;
	
	/**
	 * @var bool
	 */
	public $ShowActivity;
	
	/**
	 * @var int
	 */
	public $FollowerCount;
	
	/**
	 * @var int
	 */
	public $FollowingUserCount;
	
	/**
	 * @var string
	 */
	public $Locale;
	
	/**
	 * @var bool 
	 */
	public $ShowGroupMessaging;
	
	/**
	 * @var string
	 */
	public $ProfilePicturePath;
	
	/**
	 * @var string
	 */
	public $ProfileThemeName;
	
	/**
	 * @var string
	 */
	public $UserTitleDisplay;
	
	/**
	 * @var string
	 */
	public $StatusText;
	
	/**
	 * @var \DateTime
	 */
	public $StatusDate;
	
	
	public function __construct() {
		
	}

}
