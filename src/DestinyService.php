<?php

namespace BungieNetPlatform;

use GuzzleHttp\Psr7\Request;

/**
 * DestinyService
 * @see http://bungienetplatform.wikia.com/wiki/Category:DestinyService
 */
class DestinyService extends Service {

	const NAME = 'destiny';
	
	public function __construct(Platform $platform) {
		parent::__construct($platform, static::NAME);
	}
		
	public function getPublicXurVendor(){
		return $this->doRequest(new Request('GET', '/advisors/xur'));
	}

}
