<?php

namespace BungieNetPlatform\Services\Forum;

use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use Cola\Json;
use BungieNetPlatform\Platform;
use BungieNetPlatform\Services\Service;
use BungieNetPlatform\Enums\ForumPostCategory;
use BungieNetPlatform\Responses\Response;

/**
 * ForumService
 * 
 * @link http://bungienetplatform.wikia.com/wiki/Category:ForumService
 * @since version 1.0.0
 * @author dazarobbo <dazarobbo@live.com>
 */
class ForumService extends Service {

	const NAME = 'Forum';
	
	public function __construct(Platform $platform) {
		parent::__construct($platform, static::NAME);
	}

	/**
	 * Creates a forum post.
	 * 
	 * @link http://bungienetplatform.wikia.com/wiki/CreatePost
	 * @since version 1.0.0
	 * @version 1.0.0
	 * @author dazarobbo <dazarobbo@live.com>
	 * @param string $body
	 * @param ForumPostCategory $category
	 * @param int $groupId
	 * @param bool|null $isGroupPrivate
	 * @param string $metadata
	 * @param string $parentPostId
	 * @param bool $subTopicOverride
	 * @param string $subject
	 * @param string $urlLinkOrImage
	 * @return Response
	 */
	public function createPost(
			$body,
			ForumPostCategory $category,
			$groupId,
			$isGroupPrivate,
			$metadata,
			$parentPostId,
			$subTopicOverride,
			$subject,
			$urlLinkOrImage){
		
		$request = new Request('POST', '/CreatePost/');
				
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
		
		return new Response($this->doRequest($request));
		
	}
	
}
