<?php

namespace BungieNetPlatform\Responses\Parsing;

use BungieNetPlatform\Services\Destiny\DestinyAccount;
use BungieNetPlatform\Enums\BungieMembershipType;
use BungieNetPlatform\Services\Destiny\Inventory;
use BungieNetPlatform\Services\Destiny\BucketItem;
use BungieNetPlatform\Services\Destiny\Manifest\Hash;
use BungieNetPlatform\Services\Destiny\Item;
use BungieNetPlatform\Enums\ItemBindStatus;
use BungieNetPlatform\Enums\EquipFailureReason;
use BungieNetPlatform\Enums\DamageType;
use BungieNetPlatform\Services\Destiny\Node;
use BungieNetPlatform\Services\Destiny\Perk;
use BungieNetPlatform\Enums\ItemLocation;
use BungieNetPlatform\Enums\HashType;
use GuzzleHttp\Psr7\Uri;
use Cola\Set;

/**
 * Account
 */
abstract class Account {

	public static function parseAccount(\stdClass $json){
		
		$acc = new DestinyAccount();
		
		$acc->MembershipId = \strval($json->membershipId);
		$acc->MembershipType = BungieMembershipType::parse($json->membershipType);
		
		foreach($json->characters as $char){
			$acc->Characters->add(Character::parseCharacter($char));
		}
		
		$acc->ClanName = $json->clanName;
		$acc->ClanTag = $json->clanTag;
		$acc->Inventory = static::parseInventory($json->inventory);
		$acc->GrimoireScore = $json->grimoireScore;
		
		return $acc;
		
	}
	
	public static function parseInventory(\stdClass $json){
		
		$iv = new Inventory();
		
		foreach($json->buckets as $name => $bucket){
			
			$iv->Buckets[$name] = new Set();
			
			foreach($bucket as $item){
				$iv->Buckets[$name]->add(static::parseBucketItem($item));
			}
			
		}
		
		return $iv;
		
	}
	
	public static function parseBucketItem(\stdClass $json){
		
		$bi = new BucketItem();
		
		$bi->Hash = new Hash($json->bucketHash, HashType::INVENTORY_BUCKET());
		
		foreach($json->items as $item){
			$bi->Items->add(static::parseItem($item));
		}
		
		return $bi;
		
	}
	
	public static function parseItem(\stdClass $json){
		
		$item = new Item();
		
		$item->Hash = new Hash($json->itemHash, HashType::INVENTORY_ITEM());
		$item->BindStatus = ItemBindStatus::parse($json->bindStatus);
		$item->IsEquipped = $json->isEquipped;
		$item->InstanceId = $json->itemInstanceId;
		$item->ItemLevel = $json->itemLevel;
		$item->StackSize = $json->stackSize;
		$item->QualityLevel = $json->qualityLevel;
		
		foreach($json->stats as $obj){
			$item->Stats->add(Character::parseStat($obj));
		}

		$item->PrimaryStat = Character::parseStat($json->primaryStat);
		$item->CanEquip = $json->canEquip;
		$item->EquipRequiredLevel = $json->equipRequiredLevel;
		$item->UnlockFlagHashRequiredToEquip = new Hash(
				$json->unlockFlagHashRequiredToEquip,
				HashType::UNLOCK_FLAG());
		$item->CannotEquipReason = EquipFailureReason::parse($json->cannotEquipReason);
		$item->DamageType = DamageType::parse($json->damageType);
		$item->DamageTypeNodeIndex = $json->damageTypeNodeIndex;
		$item->DamageTypeStepIndex = $json->damageTypeStepIndex;
		$item->Progression = Character::parseLevelProgression($json->progression);
		$item->TalentGridHash = new Hash($json->talentGridHash,
				HashType::TALENT_GRID());
		
		foreach($json->nodes as $obj){
			$item->Nodes->add(static::parseNode($obj));
		}
		
		$item->UseCustomDyes = $json->useCustomDyes;
		
		foreach($json->artRegions as $key => $index){
			$item->ArtRegions[$key] = $index;
		}
		
		$item->IsEquipment = $json->isEquipment;
		$item->IsGridComplete = $json->isGridComplete;
		
		foreach($json->perks as $obj){
			$item->Perks->add(static::parsePerk($obj));
		}
		
		$item->Location = ItemLocation::parse($json->location);
		$item->TransferStatus = $json->transferStatus;
		$item->Locked = $json->locked;
		$item->Lockable = $json->lockable;
		
		return $item;
		
	}
	
	public static function parsePerk(\stdClass $json){
		
		$perk = new Perk();
		
		$perk->IconPath = new Uri($json->iconPath);
		$perk->Hash = new Hash($json->perkHash, HashType::SANDBOX_PERK());
		$perk->IsActive = $json->isActive;
		
		return $perk;
		
	}
	
	public static function parseNode(\stdClass $json){
		
		$node = new Node();
		
		$node->IsActivated = $json->isActivated;
		$node->StepIndex = $json->stepIndex;
		$node->State = $json->state;
		$node->Hidden = $json->hidden;
		$node->Hash = new Hash($json->nodeHash); //?
		
		return $node;
		
	}

}
