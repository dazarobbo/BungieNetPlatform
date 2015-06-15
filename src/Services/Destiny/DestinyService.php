<?php

namespace BungieNetPlatform\Services\Destiny;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7;
use Cola\Json;
use BungieNetPlatform\Platform;
use BungieNetPlatform\Enums;
use BungieNetPlatform\Responses;
use BungieNetPlatform\Services\Service;

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
	 * @param Enums\BungieMembershipType $membershipType
	 * @param type $membershipId
	 * @return Responses\DestinyAccountResponse
	 */
	public function getAccount(
			Enums\BungieMembershipType $membershipType,
			$membershipId){
		
		$json = $this->doRequest(new Request('GET', \sprintf(
				'/%d/account/%s', (string)$membershipType, $membershipId)));
		
		return new Responses\DestinyAccountResponse($json);
		
	}
	
	public function getActivityHistory(
			Enums\BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId,
			Enums\DestinyActivityModeType $mode,
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
		
		return new Responses\ActivityHistoryResponse(
				$this->doRequest($request));
	}
	
	public function getAdvisorsForCurrentCharacter(
			Enums\BungieMembershipType $membershipType,
			$characterId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/%s/myaccount/character/%s/advisors',
				(string)$membershipType,
				$characterId)));
		
	}
	
	public function getCharacter(
			Enums\BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/%s/account/%s/character/%s/complete/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
	}
	
	public function getCharacterActivities(
			Enums\BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/%s/account/%s/character/activities/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
	}
	
	public function getCharacterInventory(
			Enums\BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/%s/account/%s/character/%s/inventory',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
	}
	
	public function getCharacterProgression(
			Enums\BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/%s/account/%s/character/%s/progression/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
	}
	
	public function getCharacterSummary(
			Enums\BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/%s/account/%s/character/%s',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
	}
	
	public function getDestinyAggregateActivityStats(
			Enums\BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/stats/aggregateactivitystats/%s/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
	}
	
	public function getDestinyExplorerItems(
			Enums\DestinyClass $class,
			array $destinyItemType,
			Enums\DestinyItemSubType $subtype,
			Enums\DestinyExplorerOrderBy $order,
			$orderStatHash,
			$direction,
			Enums\TierType $rarity,
			Enums\DestinyExplorerBuckets $buckets,
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
			Enums\DamageType $damageTypes,
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
			Enums\DestinyDefinitionType $definitionType,
			$definitionId){
	
		return $this->doRequest(new Request('GET', \sprintf(
				'/manifest/%s/%s',
				(string)$definitionType,
				$definitionId)));
		
	}
	
	public function getExcellenceBadges(
			Enums\BungieMembershipType $membershipType,
			$destinyMembershipId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/stats/getexcellencebadges/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId)));
		
	}
	
	public function getGrimoireByMembership(
			Enums\BungieMembershipType $membershipType,
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
			Enums\BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId,
			Enums\PeriodType $periodType,
			Enums\DestinyActivityModeType $modes,
			Enums\DestinyStatsGroupType $groups,
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
			Enums\BungieMembershipType $membershipType,
			$destinyMembershipId,
			Enums\DestinyStatsGroupType $groups){
		
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
			Enums\BungieMembershipType $membershipType,
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
			Enums\BungieMembershipType $membershipType,
			$destinyMembershipId,
			Enums\DestinyActivityModeType $modes){
		
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
			Enums\BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId,
			Enums\DestinyActivityModeType $modes){
		
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
			Enums\DestinyActivityModeType $modes,
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
			Enums\BungieMembershipType $membershipType,
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
			Enums\BungieMembershipType $membershipType,
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
			Enums\BungieMembershipType $membershipType,
			$destinyMembershipId,
			$characterId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/stats/uniqueweapons/%s/%s/%s/',
				(string)$membershipType,
				$destinyMembershipId,
				$characterId)));
		
	}
	
	public function getVault(
			Enums\BungieMembershipType $membershipType,
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
			Enums\BungieMembershipType $membershipType,
			$characterId,
			$vendorId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/%s/myaccount/character/%s/vendor/%s/',
				(string)$membershipType,
				$characterId,
				$vendorId)));
		
	}
	
	public function getVendorItemDetailForCurrentCharacter(
			Enums\BungieMembershipType $membershipType,
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
			Enums\BungieMembershipType $membershipType,
			$characterId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/%s/myaccount/character/%s/vendors/summaries/',
				(string)$membershipType,
				$characterId)));
		
	}
	
	public function searchDestinyPlayer(
			Enums\BungieMembershipType $membershipType,
			$displayName){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/searchdestinyplayer/%s/%s/',
				(string)$membershipType,
				$displayName)));
		
	}
	
	public function setLockState(
			Enums\BungieMembershipType $membershipType,
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
			Enums\BungieMembershipType $membershipType,
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
