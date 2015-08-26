<?php

namespace BungieNetPlatform\Services\Destiny;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7;
use Cola\Json;
use Cola\ArrayList;
use Cola\Functions\Boolean;
use BungieNetPlatform\Platform;
use BungieNetPlatform\Services\Service;
use BungieNetPlatform\Enums\BungieMembershipType;
use BungieNetPlatform\Responses\DestinyAccountResponse;
use BungieNetPlatform\Enums\DestinyActivityModeType;
use BungieNetPlatform\Responses\ActivityHistoryResponse;
use BungieNetPlatform\Enums\DestinyClass;
use BungieNetPlatform\Enums\DestinyItemSubType;
use BungieNetPlatform\Enums\DestinyExplorerOrderBy;
use BungieNetPlatform\Enums\TierType;
use BungieNetPlatform\Enums\DestinyExplorerBuckets;
use BungieNetPlatform\Enums\DamageType;
use BungieNetPlatform\Enums\DestinyDefinitionType;
use BungieNetPlatform\Enums\PeriodType;
use BungieNetPlatform\Enums\DestinyStatsGroupType;
use BungieNetPlatform\Enums\DestinyItemType;
use BungieNetPlatform\Services\Destiny\Manifest\Hash;
use BungieNetPlatform\Responses\Response;

/**
 * DestinyService
 * 
 * @link http://bungienetplatform.wikia.com/wiki/Category:DestinyService
 * @since version 1.0.0
 * @author dazarobbo <dazarobbo@live.com>
 */
class DestinyService extends Service {

	const NAME = 'Destiny';
	
	public function __construct(Platform $platform) {
		parent::__construct($platform, static::NAME);
	}
	
	/**
	 * Equips an item from a character's inventory. The endpoint 
	 * will fail if the character is logged in and doing an activity.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/EquipItem
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $characterId
	 * @param string $itemId
	 * @return Response
	 */
	public function equipItem(
			BungieMembershipType $membershipType,
			$characterId,
			$itemId){
		
		$request = new Request('POST', '/EquipItem/');
				
		$json = (object)[
			'membershipType' => (string)$membershipType,
			'itemId' => $itemId,
			'characterId' => $characterId,
		];
		
		$request = $request
				->withBody(Psr7\stream_for(Json::serialise($json)));
		
		return new Response($this->doRequest($request));
		
	}
	
	/**
	 * Equips multiple items from a character's inventory and
	 * returns the updated inventory and character information.
	 * The endpoint will fail if the character is logged in and
	 * doing an activity.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/EquipItems
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $characterId
	 * @param ArrayList $itemIds
	 * @return Response
	 */
	public function equipItems(
			BungieMembershipType $membershipType,
			$characterId,
			ArrayList $itemIds
			){
		
		$request = new Request('POST', '/EquipItems/');
				
		$json = (object)[
			'membershipType' => (string)$membershipType,
			'characterId' => $characterId,
			'itemIds' => $itemIds
		];
		
		$request = $request
				->withBody(Psr7\stream_for(Json::serialise($json)));
		
		return new Response($this->doRequest($request));
		
	}
	
	/**
	 * Returns Destiny account information for the supplied membership
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetAccount
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $membershipId
	 * @return DestinyAccountResponse
	 */
	public function getAccount(
			BungieMembershipType $membershipType,
			$membershipId){
		
		$resp = $this->doRequest(new Request('GET', \sprintf(
				'/%s/Account/%s', (string)$membershipType, $membershipId)));
		
		return new DestinyAccountResponse($resp);
		
	}
	
	/**
	 * Returns recent activity history for a given character.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetActivityHistory
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $destinyMembershipId
	 * @param string $characterId
	 * @param DestinyActivityModeType $mode
	 * @param int $count default is 25
	 * @param int $page default is 0
	 * @return ActivityHistoryResponse
	 */
	public function getActivityHistory(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId,
			DestinyActivityModeType $mode,
			$count = 25,
			$page = 0){
		
		$request = new Request('GET', \sprintf(
				'/Stats/ActivityHistory/%s/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId));
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'mode' => (string)$mode,
					'count' => $count,
					'page' => $page
				]));
		
		$request = $request->withUri($uri);

		return new ActivityHistoryResponse($this->doRequest(
				$request));
		
	}
	
	/**
	 * Returns advisor information about a given character.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetAdvisorsForCurrentCharacter
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $characterId
	 * @return Response
	 */
	public function getAdvisorsForCurrentCharacter(
			BungieMembershipType $membershipType,
			$characterId){
		
		$resp = $this->doRequest(new Request('GET', \sprintf(
				'/%s/MyAccount/Character/%s/Advisors',
				(string)$membershipType,
				$characterId)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Returns Destiny character information with a given characterId. This
	 * endpoint is an extended version of GetCharacterSummary.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetCharacter
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param type $destinyMembershipId
	 * @param type $characterId
	 * @return Response
	 */
	public function getCharacter(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		$resp = $this->doRequest(new Request('GET', \sprintf(
				'/%s/Account/%s/Character/%s/Complete/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Returns activity progress for a given character.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetCharacterActivities
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $destinyMembershipId
	 * @param string $characterId
	 * @return Response
	 */
	public function getCharacterActivities(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		$resp = $this->doRequest(new Request('GET', \sprintf(
				'/%s/Account/%s/Character/Activities/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Returns the inventory of a Destiny character.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetCharacterInventory
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $destinyMembershipId
	 * @param string $characterId
	 * @return Response
	 */
	public function getCharacterInventory(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		$resp = $this->doRequest(new Request('GET', \sprintf(
				'/%s/Account/%s/Character/%s/Inventory',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Returns progression information for a given Destiny character.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetCharacterProgression
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $destinyMembershipId
	 * @param string $characterId
	 * @return Response
	 */
	public function getCharacterProgression(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		$resp = $this->doRequest(new Request('GET', \sprintf(
				'/%s/Account/%s/Character/%s/Progression/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Returns Destiny character information for the given characterId. To 
	 * get a more detailed overview, see the private endpoint
	 * GetDestinyAccountCharacterComplete.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetCharacterSummary
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $destinyMembershipId
	 * @param string $characterId
	 * @return Response
	 */
	public function getCharacterSummary(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		$resp = $this->doRequest(new Request('GET', \sprintf(
				'/%s/Account/%s/Character/%s',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Gets all activities the character has participated in together 
	 * with aggregate statistics for those activities.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetDestinyAggregateActivityStats
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $destinyMembershipId
	 * @param string $characterId
	 * @return Response
	 */
	public function getDestinyAggregateActivityStats(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		$resp = $this->doRequest(new Request('GET', \sprintf(
				'/Stats/AaggregateActivityStats/%s/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Advanced InventoryItem search.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetDestinyExplorerItems
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param DestinyClass $class
	 * @param ArrayList|DestinyItemType[] $destinyItemTypes
	 * @param DestinyItemSubType $subtype
	 * @param DestinyExplorerOrderBy $order
	 * @param type $orderStatHash
	 * @param type $direction
	 * @param TierType $rarity
	 * @param DestinyExplorerBuckets $buckets
	 * @param type $bucketSortTypes
	 * @param type $weaponPerformance
	 * @param int $count Number of results, default is 10
	 * @return Response
	 */
	public function getDestinyExplorerItems(
			DestinyClass $class,
			ArrayList $destinyItemTypes,
			DestinyItemSubType $subtype,
			DestinyExplorerOrderBy $order,
			$orderStatHash,
			$direction,
			TierType $rarity,
			DestinyExplorerBuckets $buckets,
			$bucketSortTypes,
			$weaponPerformance,
			$count = 10){
		
		$request = new Request('GET', '/Explorer/Iitems/');
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'count' => $count,
					'characterClass' => (string)$class,
					'types' => $destinyItemTypes->join(','),
					'subtype' => (string)$subtype,
					'order' => (string)$order,
					'orderstathash' => $orderStatHash,
					'direction' => $direction,
					'rarity' => (string)$rarity,
					'buckets' => (string)$buckets,
					'bucketsorttypes' => $bucketSortTypes,
					'weaponPerformance' => $weaponPerformance
				]));
		
		$request = $request->withUri($uri);
		
		return new Response($this->doRequest($request));
		
	}
	
	/**
	 * Advanced search for TalentNodes.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetDestinyExplorerTalentNodeSteps
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param string $name
	 * @param type $direction
	 * @param type $weaponPerformance
	 * @param type $impactEffects
	 * @param type $guardianAttributes
	 * @param type $lightAbilities
	 * @param DamageType $damageTypes
	 * @param int $page
	 * @param int $count
	 * @return Response
	 */
	public function getDestinyExplorerTalentNodeSteps(
			$name,
			$direction,
			$weaponPerformance,
			$impactEffects,
			$guardianAttributes,
			$lightAbilities,
			DamageType $damageTypes,
			$page = 0,
			$count = 10){
		
		$request = new Request('GET', '/Explorer/TalentNodeSteps');
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'page' => $page,
					'count' => $count,
					'name' => $name,
					'direction' => $direction,
					'weaponPerformance' => $weaponPerformance,
					'impactEffects' => $impactEffects,
					'guardianAttributes' => $guardianAttributes,
					'lightAbilities' => $lightAbilities,
					'damageTypes' => (string)$damageTypes
				]));
		
		$request = $request->withUri($uri);
		
		return new Response($this->doRequest($request));
		
	}
	
	/**
	 * Returns a list of "tiles" used on the Bungie.net website.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetDestinyLiveTileContentItems
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @return Response
	 */
	public function getDestinyLiveTileContentItems(){
		return new Response($this->doRequest(
				new Request('GET', \sprintf('/LiveTiles'))));
	}
	
	/**
	 * Returns the current version of the manifest as a json object.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetDestinyManifest
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @return Response
	 */
	public function getDestinyManifest(){
		return new Response($this->doRequest(
				new Request('GET', \sprintf('/Manifest'))));
	}
	
	/**
	 * Returns the specific item from the current manifest a json object.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetDestinySingleDefinition
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param DestinyDefinitionType $definitionType
	 * @param string $definitionId
	 * @return Response
	 */
	public function getDestinySingleDefinition(
			DestinyDefinitionType $definitionType,
			$definitionId){
	
		$resp = $this->doRequest(new Request('GET', \sprintf(
				'/Manifest/%s/%s',
				(string)$definitionType,
				$definitionId)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Returns Destiny excellence badges for a given account. No longer in use.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetExcellenceBadges
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $destinyMembershipId
	 * @return Response
	 */
	public function getExcellenceBadges(
			BungieMembershipType $membershipType,
			$destinyMembershipId){
		
		$resp = $this->doRequest(new Request('GET', \sprintf(
				'/Stats/GetExcellenceBadges/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Returns the Grimoire for a given account.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetGrimoireByMembership
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $destinyMembershipId
	 * @param type $flavour
	 * @param type $single
	 * @return Response
	 */
	public function getGrimoireByMembership(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$flavour,
			$single){
		
		$request = new Request('GET', \sprintf(
				'/Vanguard/Grimoire/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId));
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'flavour' => $flavour,
					'single' => $single
				]));
		
		$request = $request->withUri($uri);
		
		return new Response($this->doRequest($request));
		
	}
	
	/**
	 * Returns Grimoire definitions. This is the equivalent pulling
	 * the GrimoireDefinition from the Manifest.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetGrimoireDefinition
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @return Response
	 */
	public function getGrimoireDefinition(){
		return new Response($this->doRequest(
				new Request('GET', '/Vanguard/Grimoire/Definition')));
	}
	
	/**
	 * Returns historical stat information about a given Destiny character.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetHistoricalStats
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param strimg $destinyMembershipId
	 * @param string $characterId
	 * @param PeriodType $periodType
	 * @param DestinyActivityModeType $modes
	 * @param DestinyStatsGroupType $groups
	 * @param string $monthStart
	 * @param string $monthEnd
	 * @param string $dayStart
	 * @param string $dayEnd
	 * @return Response
	 */
	public function getHistoricalStats(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId,
			PeriodType $periodType,
			DestinyActivityModeType $modes,
			DestinyStatsGroupType $groups,
			$monthStart,
			$monthEnd,
			$dayStart,
			$dayEnd){
		
		$request = new Request('GET', \sprintf(
				'/Stats/%s/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId));
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'periodType' => (string)$periodType,
					'modes' => (string)$modes,
					'groups' => (string)$groups,
					'monthstart' => $monthStart,
					'monthend' => $monthEnd,
					'daystart' => $dayStart,
					'dayend' => $dayEnd
				]));
		
		$request = $request->withUri($uri);
		
		return new Response($this->doRequest($request));
		
	}
	
	/**
	 * Returns the equivalent of the DestinyHistoricalStatsDefinition
	 * with the statId as the key.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetHistoricalStatsDefinition
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @return Response
	 */
	public function getHistoricalStatsDefinition(){
		return new Response($this->doRequest(
				new Request('GET', '/Stats/Definition/')));
	}
	
	/**
	 * Gets aggregate historical stats organized around each character
	 * for a given account.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetHistoricalStatsForAccount
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $destinyMembershipId
	 * @param DestinyStatsGroupType $groups
	 * @return Response
	 */
	public function getHistoricalStatsForAccount(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			DestinyStatsGroupType $groups){
		
		$request = new Request('GET', \sprintf(
				'/Stats/Account/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId));
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'groups' => (string)$groups,
				]));
		
		$request = $request->withUri($uri);
		
		return new Response($this->doRequest($request));
		
	}
	
	/**
	 * Returns information about a unique item instance associated
	 * with a character.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetItemDetail
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $destinyMembershipType
	 * @param string $characterId
	 * @param string $itemInstanceId
	 * @return Response
	 */
	public function getItemDetail(
			BungieMembershipType $membershipType,
			$destinyMembershipType,
			$characterId,
			$itemInstanceId){
		
		$resp = $this->doRequest(new Request('GET', \sprintf(
				'/%s/Account/%s/Character/%s/Inventory/%s/',
				(string)$membershipType,
				$destinyMembershipType,
				$characterId,
				$itemInstanceId)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Returns leaderboard stats compared against friends. Note you 
	 * may need to re-authenticate with PSN/Xbox in order to see full
	 * rankings.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetLeaderboards
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $destinyMembershipId
	 * @param DestinyActivityModeType $modes
	 * @return Response
	 */
	public function getLeaderboards(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			DestinyActivityModeType $modes){
		
		$request = new Request('GET', \sprintf(
				'/Stats/Leaderboards/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId));
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'modes' => (string)$modes
				]));
		
		$request = $request->withUri($uri);
		
		return new Response($this->doRequest($request));
		
	}
	
	/**
	 * Returns leaderboard stats for a given character compared against 
	 * friends. Note you may need to re-authenticate with PSN/Xbox in
	 * order to see full rankings.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetLeaderboardsForCharacter
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $destinyMembershipId
	 * @param string $characterId
	 * @param DestinyActivityModeType $modes
	 * @return Response
	 */
	public function getLeaderboardsForCharacter(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId,
			DestinyActivityModeType $modes){
		
		$request = new Request('GET', \sprintf(
				'/Stats/Leaderboards/%s/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId));
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'modes' => (string)$modes
				]));
		
		$request = $request->withUri($uri);
		
		return new Response($this->doRequest($request));
		
	}
	
	/**
	 * Returns leaderboard stats compared against PSN friends. Note,
	 * you may need re-authenticate with PSN in order to see full rankings.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetLeaderboardsForPsn
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.oom>
	 * @param ArrayList|DestinyActivityModeType[] $modes
	 * @param type $code
	 * @return Response
	 */
	public function getLeaderboardsForPsn(
			ArrayList $modes,
			$code){
		
		$request = new Request('GET', '/Stats/LeaderboardsForPsn/');
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'modes' => $modes->join(','),
					'code' => $code
				]));
		
		$request = $request->withUri($uri);
		
		return new Response($this->doRequest($request));
		
	}
	
	/**
	 * Returns the numerical id of a player based on their display name, 
	 * zero if not found.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetMembershipIdByDisplayName
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $displayName
	 * @param bool $ignoreCase
	 * @return Response
	 */
	public function getMembershipIdByDisplayName(
			BungieMembershipType $membershipType,
			$displayName,
			$ignoreCase = false){
		
		$request = new Request('GET', \sprintf(
				'/%s/Stats/GetMembershipByDisplayName/%s',
				(string)$membershipType,
				$displayName));
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'ignorecase' => Boolean::toString($ignoreCase)
				]));
		
		$request = $request->withUri($uri);
		
		return new Response($this->doRequest($request));
		
	}
	
	/**
	 * Returns the Grimoire for the currently signed in account.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetMyGrimoire
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param type $flavour
	 * @param type $single
	 * @return Response
	 */
	public function getMyGrimoire(
			BungieMembershipType $membershipType,
			$flavour,
			$single){
		
		$request = new Request('GET', \sprintf(
				'/Vanguard/Grimoire/%s/',
				(string)$membershipType));
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'flavour' => $flavour,
					'single' => $single
				]));
		
		$request = $request->withUri($uri);
		
		return new Response($this->doRequest($request));
		
	}
	
	/**
	 * Gets the available post game carnage report for the activity
	 * ID.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetPostGameCarnageReport
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param string $activityId
	 * @return Response
	 */
	public function getPostGameCarnageReport(
			$activityId){
		
		$resp = $this->doRequest(new Request('GET', \sprintf(
				'/Stats/PostGameCarnageReport/%s/',
				$activityId)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Returns information about current daily, weekly and special events.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetPublicAdvisors
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @return Response
	 */
	public function getPublicAdvisors(){
		return new Response($this->doRequest(
				new Request('GET', '/Advisors/')));
	}
	
	/**
	 * Returns advisor information about the vendor Xur in Destiny.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetPublicXurVendor
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @return Response
	 */
	public function getPublicXurVendor(){
		return new Response($this->doRequest(
				new Request('GET', '/Advisors/Xur')));
	}
	
	/**
	 * Returns a list of currently active events.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetSpecialEventAdvisors
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @return Response
	 */
	public function getSpecialEventAdvisors(){
		return new Response($this->doRequest(
				new Request('GET', '/Events/')));
	}

	/**
	 * Gets details about unique weapon usage, including all exotic weapons.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetUniqueWeaponHistory
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $destinyMembershipId
	 * @param string $characterId
	 * @return Response
	 */
	public function getUniqueWeaponHistory(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		$resp = $this->doRequest(new Request('GET', \sprintf(
				'/Stats/UniqueWeapons/%s/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Returns the contents of player's Vault.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetVault
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $accountId
	 * @return Response
	 */
	public function getVault(
			BungieMembershipType $membershipType,
			$accountId){
		
		$request = new Request('GET', \sprintf(
				'/%s/MyAccount/Vault/',
				(string)$membershipType));
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'accountId' => $accountId
				]));
		
		$request = $request->withUri($uri);
		
		return new Response($this->doRequest($request));
		
	}
	
	/**
	 * Returns information about a Vendor for a given Destiny character.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetVendorForCurrentCharacter
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $characterId
	 * @param string $vendorId
	 * @return Response
	 */
	public function getVendorForCurrentCharacter(
			BungieMembershipType $membershipType,
			$characterId,
			$vendorId){
		
		$resp = $this->doRequest(new Request('GET', \sprintf(
				'/%s/MyAccount/Character/%s/Vendor/%s/',
				(string)$membershipType,
				$characterId,
				$vendorId)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Returns an item from a Vendor's inventory for a given character.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetVendorItemDetailForCurrentCharacter
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $characterId
	 * @param string $vendorId
	 * @param string $itemId
	 * @return Response
	 */
	public function getVendorItemDetailForCurrentCharacter(
			BungieMembershipType $membershipType,
			$characterId,
			$vendorId,
			$itemId){
		
		$resp = $this->doRequest(new Request('GET', \sprintf(
				'/%s/MyAccount/Character/%s/Vendor/%s/Item/%s/',
				(string)$membershipType,
				$characterId,
				$vendorId,
				$itemId)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Returns a summary of Vendors for a given Destiny character.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetVendorSummariesForCurrentCharacter
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $characterId
	 * @return Response
	 */
	public function getVendorSummariesForCurrentCharacter(
			BungieMembershipType $membershipType,
			$characterId){
		
		$resp = $this->doRequest(new Request('GET', \sprintf(
				'/%s/MyAccount/Character/%s/Vendors/Summaries/',
				(string)$membershipType,
				$characterId)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Returns a list of players by username and platform.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/SearchDestinyPlayer
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $displayName
	 * @return Response
	 */
	public function searchDestinyPlayer(
			BungieMembershipType $membershipType,
			$displayName){
		
		$resp = $this->doRequest(new Request('GET', \sprintf(
				'/SearchDestinyPlayer/%s/%s/',
				(string)$membershipType,
				$displayName)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Changes the lock state on an equipable item.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/SetItemLockState
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $characterId
	 * @param string $itemId
	 * @param bool $state
	 * @return Response
	 */
	public function setItemLockState(
			BungieMembershipType $membershipType,
			$characterId,
			$itemId,
			$state){
		
		$request = new Request('POST', '/SetLockState/');
				
		$json = (object)[
			'membershipType' => (string)$membershipType,
			'characterId' => $characterId,
			'itemId' => $itemId,
			'state' => $state
		];
		
		$request = $request
				->withBody(Psr7\stream_for(Json::serialise($json)));
		
		return new Response($this->doRequest($request));
		
	}
	
	/**
	 * Moves items to and from a character and the vault.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/TransferItem
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $characterId
	 * @param Hash $itemReferenceHash
	 * @param string $itemId
	 * @param int $stackSize
	 * @param bool $transferToVault
	 * @return Response
	 */
	public function transferItem(
			BungieMembershipType $membershipType,
			$characterId,
			Hash $itemReferenceHash,
			$itemId,
			$stackSize,
			$transferToVault){
		
		$request = new Request('POST', '/TransferItem/');
		
		$json = (object)[
			'membershipType' => (string)$membershipType,
			'itemReferenceHash' => (string)$itemReferenceHash,
			'itemId' => $itemId,
			'stackSize' => $stackSize,
			'characterId' => $characterId,
			'transferToVault' => $transferToVault
		];
		
		$request = $request
				->withBody(Psr7\stream_for(Json::serialise($json)));
		
		return new Response($this->doRequest($request));
		
	}
	
}
