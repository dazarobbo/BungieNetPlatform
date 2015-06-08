<?php

namespace BungieNetPlatform\Services\Group;

use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use Cola\Json;
use Cola\Functions\Boolean;
use BungieNetPlatform\Platform;
use BungieNetPlatform\Enums;
use BungieNetPlatform\Services\Service;

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
			Enums\BungieMembershipType $membershipType){
		
		return $this->doRequest(new Request('POST', \sprintf(
				'/%s/clans/disable/%s/',
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
				'/%s/editv2/',
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
			Enums\BungieMembershipType $membershipType){
		
		return $this->doRequest(new Request('POST', \sprintf(
				'/%s/clans/enable/%s/',
				$groupId,
				(string)$membershipType)));
		
	}
	
	public function getAllGroupsForCurrentUser(
			$clanOnly = false,
			$populateFriends = false){
		
		$request = new Request('GET', '/mygroups/all/');
		
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
				'/%s/membersv3/',
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
