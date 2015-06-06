<?php

namespace BungieNetPlatform;

use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use BungieNetPlatform\Enums;
use Cola\Json;

/**
 * ForumService
 */
class ForumService extends Service {

	const NAME = 'forum';
	
	public function __construct(Platform $platform) {
		parent::__construct($platform, static::NAME);
	}

	public function createPost(
			$body,
			Enums\ForumPostCategory $category,
			$groupId,
			$isGroupPrivate,
			$metadata,
			$parentPostId,
			$subTopicOverride,
			$subject,
			$urlLinkOrImage){
		
		$request = new Request('POST', '/createpost/');
				
		$json = (object)[
			'parentPostId' => $parentPostId,
			'subTopicOverride' => $subTopicOverride,
			'subject' => $subject,
			'body' => $body,
			'category' => (string)$category,
			'groupId' => $groupId,
			'isGroupPrivate' => $isGroupPrivate,
			'urlLinkOrImage' => $urlLinkOrImage,
			'metadata' => $metadata
		];
		
		$request = $request
				->withBody(Psr7\stream_for(Json::serialise($json)));
		
		return $this->doRequest($request);
		
	}
	
}
