<?php

namespace BungieNetPlatform\Services\User;

use Cola\ArrayList;

/**
 * Account
 */
class Account extends \Cola\Object {

	/**
	 * @var User
	 */
	public $User;
	
	/**
	 * @var ArrayList
	 */
	public $Clans;
	
	/**
	 * @var ArrayList
	 */
	public $FoundedGroups;
	
	/**
	 * @var string
	 */
	public $Email;
	
	/**
	 * @var int 
	 */
	public $EmailStatus;
	
	/**
	 * @var int
	 */
	public $EmailUsage;
	
	/**
	 * @var string
	 */
	public $GamerTag;
	
	/**
	 * @var ArrayList
	 */
	public $UserAcls;
	
	/**
	 * @var bool
	 */
	public $ShowGamertagPublic;
	
	/**
	 * @var bool
	 */
	public $ShowFacebookPublic;
	
	/**
	 * @var bool 
	 */
	public $ShowPsnPublic;
	
	/**
	 * @var ArrayList
	 */
	public $PublicCredentialTypes;
	
	/**
	 * @var bool
	 */
	public $IsThemeLight;
	
	/**
	 * @var bool
	 */
	public $AdultMode;
	
	/**
	 * @var bool
	 */
	public $UserResearchStatusFlags;


	public function __construct() {
		$this->Clans = new ArrayList();
		$this->FoundedGroups = new ArrayList();
		$this->UserAcls = new ArrayList();
		$this->PublicCredentialTypes = new ArrayList();
	}

}
