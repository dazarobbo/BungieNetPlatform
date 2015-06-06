<?php

namespace BungieNetPlatform;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7;
use BungieNetPlatform\Enums;
use Cola\Json;

/**
 * UserService
 */
class UserService extends Service {
	
	const NAME = 'user';

	public function __construct(Platform $platform) {
		parent::__construct($platform, static::NAME);
	}
	
	public function getAvailableAvatars(){
		return $this->doRequest(new Request('GET', '/getavailableavatars'));
	}
	
	public function getAvailableThemes(){
		return $this->doRequest(new Request('GET', '/getavailablethemes'));
	}
	
	public function getBungieAccount(
			Enums\BungieMembershipType $membershipType,
			$membershipId){
		
		return $this->doRequest(new Request('GET', \sprintf(
				'/getbungieaccount/%s/%s/',
				(string)$membershipType,
				$membershipId)));
		
	}
	
	public function getCountsForCurrentUser(){
		return $this->doRequest('GET', new Request('/getcounts/'));
	}

	public function getCurrentUser(){
		return $this->doRequest(new Request('GET', '/getbungienetuser'));
	}
	
	public function updateNotificationSetting(
			array $notificationTypes){
		
		$request = new Request('POST', '/notification/update/');
				
		$arr = [];
		
		foreach($notificationTypes as $nt){
			$json[] = (object)[
				'notificationType' => $nt->type,
				'notifyEmail' => $nt->email,
				'notifyMobile' => $nt->mobile,
				'notifyWeb' => $nt->web
			];
		}
		
		$json = (object)['settings' => $arr];
		
		$request = $request
				->withBody(Psr7\stream_for(Json::serialise($json)));
		
		return $this->doRequest($request);
		
	}
	
	/**
	 * @todo merge parameters into proper class
	 * @param \stdClass $info
	 */
	public function updateUser(
			\stdClass $info){
		
		$request = new Request('POST', '/updateuser/');
				
		$json = (object)[
			'about' => $info->about,
			'adultMode' => $info->adultMode,
			'displayName' => $info->displayName,
			'emailAddress' => $info->emailAddress,
			'emailUsage' => $info->emailUsage,
			'locale' => $info->locale,
			'localeInheritDefault' => $info->localeInheritDefault,
			'profilePicture' => $info->profilePicture,
			'profileTheme' => $info->profileTheme,
			'showActivity' => $info->showActivity,
			'showFacebookPublic' => $info->showFacebookPublic
		];
		
		$request = $request
				->withBody(Psr7\stream_for(Json::serialise($json)));
		
		return $this->doRequest($request);
		
	}
	
}
