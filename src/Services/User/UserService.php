<?php

namespace BungieNetPlatform\Services\User;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7;
use Cola\Json;
use Cola\ArrayList;
use BungieNetPlatform\Platform;
use BungieNetPlatform\Services\Service;
use BungieNetPlatform\Enums\BungieMembershipType;
use BungieNetPlatform\Responses\Response;

/**
 * UserService
 * 
 * @link http://bungienetplatform.wikia.com/wiki/Category:UserService
 * @since version 1.0.0
 * @author dazarobbo <dazarobbo@live.com>
 */
class UserService extends Service {
	
	const NAME = 'User';

	public function __construct(Platform $platform) {
		parent::__construct($platform, static::NAME);
	}
	
	/**
	 * Returns a list of available avatars users can set on their profile.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetAvailableAvatars
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @return Response
	 */
	public function getAvailableAvatars(){
		return new Response($this->doRequest(new Request(
				'GET', '/GetAvailableAvatars')));
	}
	
	/**
	 * Returns a list of available themes the user can set on their profile.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetAvailableThemes
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @return Response
	 */
	public function getAvailableThemes(){
		return new Response($this->doRequest(new Request(
				'GET', '/GetAvailableThemes')));
	}
	
	/**
	 * Returns the account information for the given membershipId and type,
	 * including any exposed BungieNet and Destiny information. Will respect 
	 * privacy of links based on requesting user for anonymous requests.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetBungieAccount
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param BungieMembershipType $membershipType
	 * @param string $membershipId
	 * @return Response
	 */
	public function getBungieAccount(
			BungieMembershipType $membershipType,
			$membershipId){
		
		$resp = $this->doRequest(new Request('GET', \sprintf(
				'/GetBungieAccount/%s/%s/',
				(string)$membershipType,
				$membershipId)));
		
		return new Response($resp);
		
	}
	
	/**
	 * Returns number of bungie.net notifications
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetCountsForCurrentUser
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @return Response
	 */
	public function getCountsForCurrentUser(){
		return new Response($this->doRequest(new Request(
				'GET', '/GetCounts/')));
	}

	/**
	 * Returns account information for the current user
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/GetCurrentUser
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @return Response
	 */
	public function getCurrentUser(){
		return new Response($this->doRequest(new Request(
				'GET', '/GetBungieNetUser/')));
	}
	
	/**
	 * Updates the current user's notification settings.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/UpdateNotificationSetting
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param ArrayList $notificationTypes
	 * @return Response
	 */
	public function updateNotificationSetting(
			ArrayList $notificationTypes){
		
		$request = new Request('POST', '/Notification/Update/');
	
		$list = $notificationTypes->map(function($nt){
			return (object)[
				'notificationType' => $nt->type,
				'notifyEmail' => $nt->email,
				'notifyMobile' => $nt->mobile,
				'notifyWeb' => $nt->web
			];
		});
		
		$json = (object)['settings' => $list->toArray()];
		
		$request = $request
				->withBody(Psr7\stream_for(Json::serialise($json)));
		
		return new Response($this->doRequest($request));
		
	}
		
	/**
	 * Updates the current user's profile settings. Note this page is 
	 * for documentation purposes, it is recommended that any profile 
	 * changes be made through Bungie.net!
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/UpdateUser
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param string $about
	 * @param bool $adultMode
	 * @param string $displayName
	 * @param string $emailAddress
	 * @param type $emailUsage
	 * @param string $locale
	 * @param bool $localeInheritDefault
	 * @param string $profilePicture
	 * @param string $profileTheme
	 * @param bool $showActivity
	 * @param bool $showFacebookPublic
	 * @param bool $showGamertagPublic
	 * @param bool $showGroupMessaging
	 * @param bool $showPsnPublic
	 * @param string $uniqueName
	 * @return Response
	 */
	public function updateUser(
			$about,
			$adultMode,
			$displayName,
			$emailAddress,
			$emailUsage,
			$locale,
			$localeInheritDefault,
			$profilePicture,
			$profileTheme,
			$showActivity,
			$showFacebookPublic,
			$showGamertagPublic,
			$showGroupMessaging,
			$showPsnPublic,
			$uniqueName){
		
		$request = new Request('POST', '/UpdateUser/');
				
		$json = (object)[
			'about' => $about,
			'adultMode' => $adultMode,
			'displayName' => $displayName,
			'emailAddress' => $emailAddress,
			'emailUsage' => $emailUsage,
			'locale' => $locale,
			'localeInheritDefault' => $localeInheritDefault,
			'profilePicture' => $profilePicture,
			'profileTheme' => $profileTheme,
			'showActivity' => $showActivity,
			'showFacebookPublic' => $showFacebookPublic,
			'showGamertagPublic' => $showGamertagPublic,
			'showGroupMessaging' => $showGroupMessaging,
			'showPsnPublic' => $showPsnPublic,
			'uniqueName' => $uniqueName
		];
		
		$request = $request
				->withBody(Psr7\stream_for(Json::serialise($json)));
		
		return new Response($this->doRequest($request));
		
	}
	
}
