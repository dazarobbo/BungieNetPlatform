<?php

namespace BungieNetPlatform\Services\Destiny;

/**
 * CharacterBase
 */
class CharacterBase extends \Cola\Object {

	/**
	 * @var string 
	 */
	public $MembershipId;
	
	/**
	 * @var \BungieNetPlatform\Enums\BungieMembershipType
	 */
	public $MembershipType;
	
	/**
	 * @var string
	 */
	public $CharacterId;
	
	/**
	 * @var \DateTime
	 */
	public $DateLastPlayed;
	
	/**
	 * @var int
	 */
	public $MinutesPlayedThisSession;
	
	/**
	 * @var int
	 */
	public $MinutesPlayedTotal;
	
	/**
	 * @var int
	 */
	public $PowerLevel;
	
	/**
	 * @var Manifest\Hash
	 */
	public $RaceHash;
	
	/**
	 * @var Manifest\Hash
	 */
	public $GenderHash;
	
	/**
	 * @var Manifest\Hash
	 */
	public $ClassHash;
	
	/**
	 * @var Manifest\Hash 
	 */
	public $CurrentActivityHash;
	
	/**
	 * @var Manifest\Hash 
	 */
	public $LastCompletedStoryHash;
	
	/**
	 * @var StatCollection 
	 */
	public $Stats;
	
	/**
	 * @var Customization 
	 */
	public $Customization;
	
	/**
	 * @var int
	 */
	public $GrimoireScore;
	
	/**
	 * @var PeerView
	 */
	public $PeerView;
	
	/**
	 * @var \BungieNetPlatform\Enums\DestinyGender
	 */
	public $GenderType;
	
	/**
	 * @var \BungieNetPlatform\Enums\DestinyClass
	 */
	public $ClassType;
	
	/**
	 * @var Manifest\Hash
	 */
	public $BuildStatGroupHash;
	
	public function __construct() {
		
	}

}
