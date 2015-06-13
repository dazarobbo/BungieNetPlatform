<?php

namespace BungieNetPlatform\Services\Destiny;

/**
 * Item
 */
class Item extends \Cola\Object {

	/**
	 * @var Manifest\Hash
	 */
	public $Hash;
	
	/**
	 * @var \BungieNetPlatform\Enums\ItemBindStatus
	 */
	public $BindStatus;
	
	/**
	 * @var bool
	 */
	public $IsEquipped;
	
	/**
	 * @var string
	 */
	public $InstanceId;
	
	/**
	 * @var int
	 */
	public $ItemLevel;
	
	/**
	 * @var int
	 */
	public $StackSize;
	
	/**
	 * @var int
	 */
	public $QualityLevel;
	
	/**
	 * @var StatCollection
	 */
	public $Stats;
	
	/**
	 * @var Stat
	 */
	public $PrimaryStat;
	
	/**
	 * @var bool
	 */
	public $CanEquip;
	
	/**
	 * @var int
	 */
	public $EquipRequiredLevel;
	
	/**
	 * @var Manifest\Hash
	 */
	public $UnlockFlagHashRequiredToEquip;
	
	/**
	 * @var \BungieNetPlatform\Enums\EquipFailureReason
	 */
	public $CannotEquipReason;
	
	/**
	 * @var \BungieNetPlatform\Enums\DamageType
	 */
	public $DamageType;
	
	/**
	 * @var int
	 */
	public $DamageTypeNodeIndex;
	
	/**
	 * @var int
	 */
	public $DamageTypeStepIndex;
	
	/**
	 * @var LevelProgression
	 */
	public $Progression;
	
	/**
	 * @var Manifest\Hash
	 */
	public $TalentGridHash;
	
	/**
	 * @var \Cola\Set
	 */
	public $Nodes;
	
	/**
	 * @var bool
	 */
	public $UseCustomDyes;
	
	/**
	 * @var \Cola\Set
	 */
	public $ArtRegions;
	
	/**
	 * @var bool
	 */
	public $IsEquipment;
	
	/**
	 * @var bool
	 */
	public $IsGridComplete;
	
	/**
	 * @var \Cola\Set
	 */
	public $Perks;
	
	/**
	 * @var \BungieNetPlatform\Enums\ItemLocation
	 */
	public $Location;
	
	/**
	 * @var int|UNKNOWN_ENUM_?
	 */
	public $TransferStatus;
	
	/**
	 * @var bool
	 */
	public $Locked;
	
	/**
	 * @var bool
	 */
	public $Lockable;
	
	public function __construct() {
		$this->Stats = new StatCollection();
		$this->Nodes = new \Cola\Set();
		$this->ArtRegions = new \Cola\Set();
		$this->Perks = new \Cola\Set();
	}

}
