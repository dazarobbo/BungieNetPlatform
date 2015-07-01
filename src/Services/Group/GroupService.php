<?php

namespace BungieNetPlatform\Services\Group;

use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use Cola\Json;
use Cola\Functions\Boolean;
use Cola\ArrayList;
use BungieNetPlatform\Platform;
use BungieNetPlatform\Services\Service;
use BungieNetPlatform\Enums\BungieMembershipType;
use BungieNetPlatform\Responses\Response;

/**
 * GroupService
 * 
 * @link http://bungienetplatform.wikia.com/wiki/Category:GroupService
 * @since version 1.0.0
 * @author dazarobbo <dazarobbo@live.com>
 */
class GroupService extends Service {

	const NAME = 'Group';
	
	public function __construct(Platform $platform) {
		parent::__construct($platform, static::NAME);
	}

	/**
	 * Disables clan features for a given membershipType (PSN or Xbox).
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/DisableClanForGroup
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param int $groupId
	 * @param BungieMembershipType $membershipType
	 * @return Response
	 */
	public function disableClanForGroup(
			$groupId,
			BungieMembershipType $membershipType){
		
		$resp = $this->doRequest(new Request('POST', \sprintf(
				'/%s/Clans/Disable/%s/',
				$groupId,
				(string)$membershipType)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Makes changes to a give group.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/EditGroupV2
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param int $groupId
	 * @param string $name
	 * @param string $clanCallsign
	 * @param string $motto
	 * @param string $about
	 * @param ArrayList|string[] $tags
	 * @return Response
	 */
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
			'tags' => $tags->join(',')
		];
		
		$request = $request
				->withBody(Psr7\stream_for(Json::serialise($json)));
		
		return new Response($this->doRequest($request));
		
	}
	
	/**
	 * Enables clan features for a given membershipType (PSN or Xbox).
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/EnableClanForGroup
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param int $groupId
	 * @param BungieMembershipType $membershipType
	 * @return Response
	 */
	public function enableClanForGroup(
			$groupId,
			BungieMembershipType $membershipType){
		
		$resp = $this->doRequest(new Request('POST', \sprintf(
				'/%s/Clans/Enable/%s/',
				$groupId,
				(string)$membershipType)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Get all groups for the current user.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetAllGroupsForCurrentUser
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param bool $clanOnly
	 * @param bool $populateFriends
	 * @return Response
	 */
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
		
		return new Response($this->doRequest($request));
		
	}
	
	/**
	 * Returns a list of members for a given group.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetMembersOfGroupV3
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param int $groupId
	 * @param int $currentPage
	 * @param int $itemsPerPage
	 * @param type $memberType
	 * @param type $platformType
	 * @param type $sort
	 * @param type $nameSearch
	 * @return Response
	 */
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
		
		return new Response($this->doRequest($request));
		
	}

}
