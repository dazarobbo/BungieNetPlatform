<?php

namespace BungieNetPlatform\Services\Destiny;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7;
use Cola\Json;
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
use BungieNetPlatform\Enums\DestinyActivityModeType;
use BungieNetPlatform\Enums\DestinyStatsGroupType;

/**
 * DestinyService
 * @see http://bungienetplatform.wikia.com/wiki/Category:DestinyService
 */
class DestinyService extends Service {

	const NAME = 'destiny';
	
	public function __construct(Platform $platform) {
		parent::__construct($platform, static::NAME);
	}
	
	/**
	 * 
	 * @param BungieMembershipType $membershipType
	 * @param string|int $membershipId
	 * @return DestinyAccountResponse
	 */
	public function getAccount(
			BungieMembershipType $membershipType,
			$membershipId){
		
		$json = $this->doRequest(new Request('GET', \sprintf(
				'/%d/account/%s', (string)$membershipType, $membershipId)));
		
		return new DestinyAccountResponse($json);
		
	}
	
	public function getActivityHistory(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId,
			DestinyActivityModeType $mode,
			$count = 25,
			$page = 0){
		
		$request = new Request('GET', \sprintf(
				'/stats/activityhistory/%s/%s/%s',
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
		
		return new ActivityHistoryResponse(
				$this->doRequest($request));
	}
	
	public function getAdvisorsForCurrentCharacter(
			BungieMembershipType $membershipType,
			$characterId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/%s/myaccount/character/%s/advisors',
				(string)$membershipType,
				$characterId)));
		
	}
	
	public function getCharacter(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/%s/account/%s/character/%s/complete/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
	}
	
	public function getCharacterActivities(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/%s/account/%s/character/activities/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
	}
	
	public function getCharacterInventory(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/%s/account/%s/character/%s/inventory',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
	}
	
	public function getCharacterProgression(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/%s/account/%s/character/%s/progression/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
	}
	
	public function getCharacterSummary(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/%s/account/%s/character/%s',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
	}
	
	public function getDestinyAggregateActivityStats(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/stats/aggregateactivitystats/%s/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
	}
	
	public function getDestinyExplorerItems(
			DestinyClass $class,
			array $destinyItemType,
			DestinyItemSubType $subtype,
			DestinyExplorerOrderBy $order,
			$orderStatHash,
			$direction,
			TierType $rarity,
			DestinyExplorerBuckets $buckets,
			$bucketSortTypes,
			$weaponPerformance,
			$count = 10){
		
		$request = new Request('GET', '/explorer/items/');
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'count' => $count,
					'characterClass' => (string)$class,
					'types' => \implode(',', $destinyItemType),
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
		
		return $this->doRequest($request);
		
	}
	
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
		
		$request = new Request('GET', '/explorer/talentnodesteps');
		
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
		
		return $this->doRequest($request);
		
	}
	
	public function getDestinyLiveTileContentItems(){
		return $this->doRequest(new Request('GET', \sprintf('/livetiles')));
	}
	
	public function getDestinyManifest(){
		return $this->doRequest(new Request('GET', \sprintf('/manifest')));
	}
	
	public function getDestinySingleDefinition(
			DestinyDefinitionType $definitionType,
			$definitionId){
	
		return $this->doRequest(new Request('GET', \sprintf(
				'/manifest/%s/%s',
				(string)$definitionType,
				$definitionId)));
		
	}
	
	public function getExcellenceBadges(
			BungieMembershipType $membershipType,
			$destinyMembershipId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/stats/getexcellencebadges/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId)));
		
	}
	
	public function getGrimoireByMembership(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$flavour,
			$single){
		
		$request = new Request('GET', \sprintf(
				'/vanguard/grimoire/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId));
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'flavour' => $flavour,
					'single' => $single
				]));
		
		$request = $request->withUri($uri);
		
		return $this->doRequest($request);
		
	}
	
	public function getGrimoireDefinition(){
		return $this->doRequest(new Request('GET', '/vanguard/grimoire/definition'));
	}
	
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
				'/stats/%s/%s/%s/',
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
		
		return $this->doRequest($request);
		
	}
	
	public function getHistoricalStatsDefinition(){
		return $this->doRequest(new Request('GET', '/stats/definition/'));
	}
	
	public function getHistoricalStatsForAccount(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			DestinyStatsGroupType $groups){
		
		$request = new Request('GET', \sprintf(
				'/stats/account/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId));
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'groups' => (string)$groups,
				]));
		
		$request = $request->withUri($uri);
		
		return $this->doRequest($request);
		
	}
	
	public function getItemDetail(
			BungieMembershipType $membershipType,
			$destinyMembershipType,
			$characterId,
			$itemInstanceId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/%s/account/%s/character/%s/inventory/%s/',
				(string)$membershipType,
				$destinyMembershipType,
				$characterId,
				$itemInstanceId)));
		
	}
	
	public function getLeaderboards(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			DestinyActivityModeType $modes){
		
		$request = new Request('GET', \sprintf(
				'/stats/leaderboards/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId));
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'modes' => (string)$modes
				]));
		
		$request = $request->withUri($uri);
		
		return $this->doRequest($request);
		
	}
	
	public function getLeaderboardsForCharacter(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId,
			DestinyActivityModeType $modes){
		
		$request = new Request('GET', \sprintf(
				'/stats/leaderboards/%s/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId));
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'modes' => (string)$modes
				]));
		
		$request = $request->withUri($uri);
		
		return $this->doRequest($request);
		
	}
	
	public function getLeaderboardsForPsn(
			DestinyActivityModeType $modes,
			$code){
		
		$request = new Request('GET', '/stats/leaderboardsforpsn/');
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'modes' => (string)$modes,
					'code' => $code
				]));
		
		$request = $request->withUri($uri);
		
		return $this->doRequest($request);
		
	}
	
	public function getMembershipIdByDisplayName(
			BungieMembershipType $membershipType,
			$displayName,
			$ignoreCase = false){
		
		$request = new Request('GET', \sprintf(
				'/%s/stats/getmembershipbydisplayname/%s',
				(string)$membershipType,
				$displayName));
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'ignorecase' => $ignoreCase
				]));
		
		$request = $request->withUri($uri);
		
		return $this->doRequest($request);
		
	}
	
	public function getMyGrimoire(
			BungieMembershipType $membershipType,
			$flavour,
			$single){
		
		$request = new Request('GET', \sprintf(
				'/vanguard/grimoire/%s/',
				(string)$membershipType));
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'flavour' => $flavour,
					'single' => $single
				]));
		
		$request = $request->withUri($uri);
		
		return $this->doRequest($request);
		
	}
	
	public function getPostGameCarnageReport(
			$activityId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/stats/postgamecarnagereport/%s/',
				$activityId)));
		
	}
	
	public function getPublicAdvisors(){
		return $this->doRequest(new Request('GET', '/advisors/'));
	}
	
	public function getPublicXurVendor(){
		return $this->doRequest(new Request('GET', '/advisors/xur'));
	}
	
	public function getSpecialEventAdvisors(){
		return $this->doRequest(new Request('GET', '/events/'));
	}

	public function getUniqueWeaponHistory(
			BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/stats/uniqueweapons/%s/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
	}
	
	public function getVault(
			BungieMembershipType $membershipType,
			$accountId){
		
		$request = new Request('GET', \sprintf(
				'/%s/myaccount/vault/',
				(string)$membershipType));
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'accountId' => $accountId
				]));
		
		$request = $request->withUri($uri);
		
		return $this->doRequest($request);
		
	}
	
	public function getVendorForCurrentCharacter(
			BungieMembershipType $membershipType,
			$characterId,
			$vendorId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/%s/myaccount/character/%s/vendor/%s/',
				(string)$membershipType,
				$characterId,
				$vendorId)));
		
	}
	
	public function getVendorItemDetailForCurrentCharacter(
			BungieMembershipType $membershipType,
			$characterId,
			$vendorId,
			$itemId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/%s/myaccount/character/%s/vendor/%s/item/%s/',
				(string)$membershipType,
				$characterId,
				$vendorId,
				$itemId)));
		
	}
	
	public function getVendorSummariesForCurrentCharacter(
			BungieMembershipType $membershipType,
			$characterId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/%s/myaccount/character/%s/vendors/summaries/',
				(string)$membershipType,
				$characterId)));
		
	}
	
	public function searchDestinyPlayer(
			BungieMembershipType $membershipType,
			$displayName){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/searchdestinyplayer/%s/%s/',
				(string)$membershipType,
				$displayName)));
		
	}
	
	public function setLockState(
			BungieMembershipType $membershipType,
			$characterId,
			$itemId,
			$state){
		
		$request = new Request('POST', '/setlockstate/');
				
		$json = (object)[
			'membershipType' => (string)$membershipType,
			'characterId' => $characterId,
			'itemId' => $itemId,
			'state' => $state
		];
		
		$request = $request
				->withBody(Psr7\stream_for(Json::serialise($json)));
		
		return $this->doRequest($request);
		
	}
	
	public function transferItem(
			BungieMembershipType $membershipType,
			$characterId,
			$itemReferenceHash,
			$itemId,
			$stackSize,
			$transferToVault){
		
		$request = new Request('POST', '/transferitem/');
		
		$json = (object)[
			'membershipType' => (string)$membershipType,
			'itemReferenceHash' => $itemReferenceHash,
			'itemId' => $itemId,
			'stackSize' => $stackSize,
			'characterId' => $characterId,
			'transferToVault' => $transferToVault
		];
		
		$request = $request
				->withBody(Psr7\stream_for(Json::serialise($json)));
		
		return $this->doRequest($request);
		
	}
	
}
