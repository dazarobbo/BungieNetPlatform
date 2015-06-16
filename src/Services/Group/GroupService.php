<?php

namespace BungieNetPlatform\Services\Group;

use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use Cola\Json;
use Cola\Functions\Boolean;
use BungieNetPlatform\Platform;
use BungieNetPlatform\Services\Service;
use BungieNetPlatform\Enums\BungieMembershipType;

/**
 * GroupService
 */
class GroupService extends Service {

	const NAME = 'group';
	
	public function __construct(Platform $platform) {
		parent::__construct($platform, static::NAME);
	}

	public function disableClanForGroup(
			$groupId,
			BungieMembershipType $membershipType){
		
		return $this->doRequest(new Request('POST', \sprintf(
				'/%s/Clans/Disable/%s/',
				$groupId,
				(string)$membershipType)));
		
	}
	
	public function editGroupV2(
			$groupId,
			$name,
			$clanCallsign,
			$motto,
			$about,
			$tags){
		
		$request = new Request('POST', \sprintf(
				'/%s/EditV2/',
				$groupId));
		
		$json = (object)[
			'name' => $name,
			'clanCallsign' => $clanCallsign,
			'motto' => $motto,
			'about' => $about,
			'tags' => $tags
		];
		
		$request = $request
				->withBody(Psr7\stream_for(Json::serialise($json)));
		
		return $this->doRequest($request);
		
	}
	
	public function enableClanForGroup(
			$groupId,
			BungieMembershipType $membershipType){
		
		return $this->doRequest(new Request('POST', \sprintf(
				'/%s/Clans/Enable/%s/',
				$groupId,
				(string)$membershipType)));
		
	}
	
	public function getAllGroupsForCurrentUser(
			$clanOnly = false,
			$populateFriends = false){
		
		$request = new Request('GET', '/MyGroups/All/');
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'clanonly' => Boolean::toString($clanOnly),
					'populatefriends' => Boolean::toString($populateFriends)
				]));
		
		$request = $request->withUri($uri);
		
		return $this->doRequest($request);
		
	}
	
	public function getMembersOfGroupV3(
			$groupId,
			$currentPage,
			$itemsPerPage,
			$memberType,
			$platformType,
			$sort,
			$nameSearch){
		
		$request = new Request('GET', \sprintf(
				'/%s/MembersV3/',
				$groupId));
		
		$uri = $request
				->getUri()
				->withQuery(\http_build_query([
					'itemsPerPage' => $itemsPerPage,
					'currentPage' => $currentPage,
					'memberType' => $memberType,
					'platformType' => $platformType,
					'sort' => $sort,
					'nameSearch' => $nameSearch
				]));
		
		$request = $request->withUri($uri);
		
		return $this->doRequest($request);
		
	}

}
