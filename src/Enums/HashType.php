<?php

namespace BungieNetPlatform\Enums;

use BungieNetPlatform\Enums\HashTableType;

/**
 * HashType
 */
class HashType extends \Cola\Enum {

	const ACTIVITY = 1;
	const ACTIVITY_TYPE = 2;
	const CLASS_DEFINITION = 3;
	const GENDER = 4;
	const INVENTORY_BUCKET = 5;
	const INVENTORY_ITEM = 6;
	const PROGRESSION = 7;
	const RACE = 8;
	const TALENT_GRID = 9;
	const UNLOCK_FLAG = 10;
	const HISTORICAL_STATS = 11;
	const DIRECTOR_BOOK = 12;
	const STAT = 13;
	const SANDBOX_PERK = 14;
	const DESTINATION = 15;
	const PLACE = 16;
	const ACTIVITY_BUNDLE = 17;
	const STAT_GROUP = 18;
	const SPECIAL_EVENT = 19;
	const FACTION = 20;
	const VENDOR_CATEGORY = 21;
	const ENEMY_RACE = 22;
	const SCRIPTED_SKULL = 23;
	const GRIMOIRE_CARD = 24;
	
	protected static $_TableMap = array(
		self::ACTIVITY => 'DestinyActivityDefinition',
		self::ACTIVITY_TYPE => 'DestinyActivityTypeDefinition',
		self::CLASS_DEFINITION => 'DestinyClassDefinition',
		self::GENDER => 'DestinyGenderDefinition',
		self::INVENTORY_ITEM => 'DestinyInventoryBucketDefinition',
		self::INVENTORY_ITEM => 'DestinyInventoryItemDefinition',
		self::PROGRESSION => 'DestinyProgressionDefinition',
		self::RACE => 'DestinyRaceDefinition',
		self::TALENT_GRID => 'DestinyTalentGridDefinition',
		self::UNLOCK_FLAG => 'DestinyUnlockFlagDefinition',
		self::HISTORICAL_STATS => 'DestinyHistoricalStatsDefinition',
		self::DIRECTOR_BOOK => 'DestinyDirectorBookDefinition',
		self::STAT => 'DestinyStatDefinition',
		self::SANDBOX_PERK => 'DestinySandboxPerkDefinition',
		self::DESTINATION => 'DestinyDestinationDefinition',
		self::PLACE => 'DestinyPlaceDefinition',
		self::ACTIVITY_BUNDLE => 'DestinyActivityBundleDefinition',
		self::STAT_GROUP => 'DestinyStatGroupDefinition',
		self::SPECIAL_EVENT => 'DestinySpecialEventDefinition',
		self::FACTION => 'DestinyFactionDefinition',
		self::VENDOR_CATEGORY => 'DestinyVendorCategoryDefinition',
		self::ENEMY_RACE => 'DestinyEnemyRaceDefinition',
		self::SCRIPTED_SKULL => 'DestinyScriptedSkullDefinition',
		self::GRIMOIRE_CARD => 'DestinyGrimoireCardDefinition'
	);
	
	protected static $_PropertyMap = array(
		self::ACTIVITY => 'activityHash',
		self::ACTIVITY_TYPE => 'activityTypeHash',
		self::CLASS_DEFINITION => 'classHash',
		self::GENDER => 'genderHash',
		self::INVENTORY_ITEM => 'bucketHash',
		self::INVENTORY_ITEM => 'itemHash',
		self::PROGRESSION => 'progressionHash',
		self::RACE => 'raceHash',
		self::TALENT_GRID => 'gridHash',
		self::UNLOCK_FLAG => 'flagHash',
		self::HISTORICAL_STATS => 'statId',
		self::DIRECTOR_BOOK => 'bookHash',
		self::STAT => 'statHash',
		self::SANDBOX_PERK => 'perkHash',
		self::DESTINATION => 'destinationHash',
		self::PLACE => 'placeHash',
		self::ACTIVITY_BUNDLE => 'bundleHash',
		self::STAT_GROUP => 'statGroupHash',
		self::SPECIAL_EVENT => 'eventHash',
		self::FACTION => 'factionHash',
		self::VENDOR_CATEGORY => 'categoryHash',
		self::ENEMY_RACE => 'raceHash',
		self::SCRIPTED_SKULL => 'skullHash',
		self::GRIMOIRE_CARD => 'cardId'
	);
	
	protected static $_TableType = array(
		self::ACTIVITY => HashTableType::ID,
		self::ACTIVITY_TYPE => HashTableType::ID,
		self::CLASS_DEFINITION => HashTableType::ID,
		self::GENDER => HashTableType::ID,
		self::INVENTORY_ITEM => HashTableType::ID,
		self::INVENTORY_ITEM => HashTableType::ID,
		self::PROGRESSION => HashTableType::ID,
		self::RACE => HashTableType::ID,
		self::TALENT_GRID => HashTableType::ID,
		self::UNLOCK_FLAG => HashTableType::ID,
		self::HISTORICAL_STATS => HashTableType::KEY,
		self::DIRECTOR_BOOK => HashTableType::ID,
		self::STAT => HashTableType::ID,
		self::SANDBOX_PERK => HashTableType::ID,
		self::DESTINATION => HashTableType::ID,
		self::PLACE => HashTableType::ID,
		self::ACTIVITY_BUNDLE => HashTableType::ID,
		self::STAT_GROUP => HashTableType::ID,
		self::SPECIAL_EVENT => HashTableType::ID,
		self::FACTION => HashTableType::ID,
		self::VENDOR_CATEGORY => HashTableType::ID,
		self::ENEMY_RACE => HashTableType::ID,
		self::SCRIPTED_SKULL => HashTableType::ID,
		self::GRIMOIRE_CARD => HashTableType::ID
	);
	
	public function getTableName(){
		
		if(isset(static::$_TableMap[$this->_Value])){
			return static::$_TableMap[$this->_Value];
		}
		
		return null;
		
	}
	
	/**
	 * 
	 * @return HashTableType
	 */
	public function getTableType(){
		
		if(isset(static::$_TableType[$this->_Value])){
			return new HashTableType(static::$_TableType[$this->_Value]);
		}
		
		return null;
		
	}
	
	public function getPropertyName(){
		
		if(isset(static::$_PropertyMap[$this->_Value])){
			return static::$_PropertyMap[$this->_Value];
		}
		
		return null;
		
	}

}
