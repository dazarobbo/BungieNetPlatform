<?php

namespace BungieNetPlatform\Services\Destiny;

use Cola\ArrayList;
use Cola\Set;

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
	 * @var ArrayList
	 */
	public $Nodes;
	
	/**
	 * @var bool
	 */
	public $UseCustomDyes;
	
	/**
	 * @var Set
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
	 * @var ArrayList
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
		$this->Nodes = new ArrayList();
		$this->ArtRegions = new Set();
		$this->Perks = new ArrayList();
	}

}
