<?php

namespace BungieNetPlatform\Responses\Parsing;

use BungieNetPlatform\Services\Destiny\CharacterBase;
use BungieNetPlatform\Enums\BungieMembershipType;
use BungieNetPlatform\Enums\DestinyGender;
use BungieNetPlatform\Enums\DestinyClass;
use BungieNetPlatform\Services\Destiny\Manifest\Hash;
use BungieNetPlatform\Enums\HashType;
use BungieNetPlatform\Services\Destiny\StatCollection;
use BungieNetPlatform\Services\Destiny\Stat;
use BungieNetPlatform\Services\Destiny\Customization;
use BungieNetPlatform\Services\Destiny\PeerView;
use BungieNetPlatform\Services\Destiny\Equipment;
use BungieNetPlatform\Services\Destiny\Dye;
use BungieNetPlatform\Services\Destiny\LevelProgression;
use BungieNetPlatform\Services\Destiny\ActivityHistoryItem;
use BungieNetPlatform\Services\Destiny\ActivityHistoryItemDetails;
use BungieNetPlatform\Services\Destiny\ActivityHistoryItemStat;
use BungieNetPlatform\Services\Destiny\ActivityHistoryItemStatBasic;
use BungieNetPlatform\Enums\DestinyActivityModeType;
use Cola\Set;
use GuzzleHttp\Psr7\Uri;

/**
 * Character
 */
abstract class Character {

	public static function parseCharacter(\stdClass $json){
		
		$character = new \BungieNetPlatform\Services\Destiny\Character();
		
		$character->Base = static::parseBase($json->characterBase);
		$character->LevelProgression = static::parseLevelProgression($json->levelProgression);
		$character->EmblemPath = new Uri($json->emblemPath);
		$character->BackgroundPath = new Uri($json->backgroundPath);
		$character->EmblemHash = new Hash($json->emblemHash); //?
		$character->CharacterLevel = $json->characterLevel;
		$character->BaseCharacterLevel = $json->baseCharacterLevel;
		$character->IsPrestigeLevel = $json->isPrestigeLevel;
		$character->PercentToNextLevel = $json->percentToNextLevel;
		
		return $character;
		
	}
	
	public static function parseLevelProgression(\stdClass $json){
		
		$lp = new LevelProgression();
		
		$lp->DailyProgress = new Hash($json->dailyProgress, HashType::PROGRESSION());
		$lp->WeeklyProgress = new Hash($json->weeklyProgress, HashType::PROGRESSION());
		$lp->CurrentProgress = new Hash($json->currentProgress, HashType::PROGRESSION());
		$lp->Level = $json->level;
		$lp->Step = $json->step;
		$lp->ProgressToNextLevel = $json->progressToNextLevel;
		$lp->NextLevelAt = $json->nextLevelAt;
		$lp->ProgressionHash = new Hash($json->progressionHash, HashType::PROGRESSION());
		
		return $lp;
		
	}
	
	public static function parseBase(\stdClass $json) {
		
		$base = new CharacterBase();
		
		$base->MembershipId = $json->membershipId;
		$base->MembershipType = BungieMembershipType::parse($json->membershipType);
		$base->CharacterId = $json->characterId;
		$base->DateLastPlayed = new \DateTime($json->dateLastPlayed);
		$base->MinutesPlayedThisSession = \intval($json->minutesPlayedThisSession);
		$base->MinutesPlayedTotal = \intval($json->minutesPlayedTotal);
		$base->PowerLevel = $json->powerLevel;
		$base->RaceHash = new Hash($json->raceHash, HashType::RACE());
		$base->GenderHash = new Hash($json->genderHash, HashType::GENDER());
		$base->ClassHash = new Hash($json->classHash, HashType::CLASS_DEFINITION());
		$base->CurrentActivityHash = new Hash($json->currentActivityHash, HashType::ACTIVITY());
		$base->LastCompletedStoryHash = new Hash($json->lastCompletedStoryHash, HashType::ACTIVITY());
		$base->Stats = static::parseStatCollection($json->stats);
		$base->GrimoireScore = $json->grimoireScore;
		$base->PeerView = static::parsePeerView($json->peerView);
		$base->GenderType = DestinyGender::parse($json->genderType);
		$base->ClassType = DestinyClass::parse($json->classType);
		$base->BuildStatGroupHash = new Hash($json->buildStatGroupHash, HashType::STAT_GROUP());
		
		return $base;
		
	}
	
	public static function parseStatCollection(\stdClass $json){
		
		$coll = new StatCollection();
		
		foreach($json as $name => $obj){
			$stat = static::parseStat($obj);
			$stat->Name = $name;
			$coll->add($stat);
		}
		
		return $coll;
		
	}
	
	public static function parseStat(\stdClass $json){
		
		$stat = new Stat();
		
		$stat->Hash = new Hash($json->statHash, HashType::STAT());
		$stat->Value = $json->value;
		$stat->MaximumValue = $json->maximumValue;
		
		return $stat;
		
	}

	public static function parseCustomization(\stdClass $json){
		
		$custom = new Customization();
		
		$custom->Personality = new Hash($json->personality); //?
		$custom->Face = new Hash($json->face); //?
		$custom->SkinColor = new Hash($json->skinColor); //?
		$custom->LipColor = new Hash($json->lipColor); //?
		$custom->EyeColor = new Hash($json->eyeColor); //?
		$custom->HairColor = new Hash($json->hairColor); //?
		$custom->FeatureColor = new Hash($json->featureColor); //?
		$custom->DecalColor = new Hash($json->decalColor); //?
		$custom->WearHelmet = $json->wearHelmet;
		$custom->HairIndex = $json->hairIndex;
		$custom->FeatureIndx = $json->featureIndex;
		$custom->DecalIndex = $json->decalIndex;
		
		return $custom;
		
	}
	
	public static function parsePeerView(\stdClass $json){
		
		$peerView = new PeerView();
		
		$peerView->Equipment = static::parseEquipment($json->equipment);
		
		return $peerView;
		
	}
	
	public static function parseEquipment(array $arr){
		
		$set = new Set();
		
		foreach($arr as $obj){
			
			$equipment = new Equipment();
			$equipment->Hash = new Hash($obj->itemHash, HashType::INVENTORY_ITEM());
			
			foreach($obj->dyes as $dyeObj){
				$equipment->Dyes = static::parseDye($dyeObj);
			}
			
			$set->add($equipment);
			
		}
		
		return $set;
		
	}
	
	public static function parseDye(\stdClass $json){
		
		$dye = new Dye();
		
		$dye->ChannelHash = new Hash($json->channelHash); //?
		$dye->DyeHash = new Hash($json->dyeHash); //?
		
		return $dye;
		
	}
	
	public static function parseActivityHistoryItem(\stdClass $json){
		
		$item = new ActivityHistoryItem();
		
		$item->Period = new \DateTime($json->period);
		$item->Details = static::parseActivityHistoryItemDetails($json->activityDetails);
		
		foreach($json->values as $name => $statObj){
			$item->Values[$name] = static::parseActivityHistoryStatItem($statObj);
		}
		
		return $item;
		
	}
	
	public static function parseActivityHistoryItemDetails(\stdClass $json){
		
		$details = new ActivityHistoryItemDetails();
		
		$details->ReferenceId = $json->referenceId;
		$details->InstanceId = $json->instanceId;
		$details->Mode = DestinyActivityModeType::parse($json->mode);
		
		return $details;
		
	}
	
	public static function parseActivityHistoryStatItem(\stdClass $json){
		
		$stat = new ActivityHistoryItemStat();
		
		$stat->Id = $json->statId;
		$stat->Basic = static::parseActivityHistoryStatItemBasic($json->basic);
		
		return $stat;
		
	}
	
	public static function parseActivityHistoryStatItemBasic(\stdClass $json){
		
		$basic = new ActivityHistoryItemStatBasic();
		
		$basic->Value = $json->value;
		$basic->DisplayValue = $json->displayValue;
		
		return $basic;
		
	}
	
}
