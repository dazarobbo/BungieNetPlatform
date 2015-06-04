<?php

namespace BungieNetPlatform;

/**
 * DestinyService
 * @see http://bungienetplatform.wikia.com/wiki/Category:DestinyService
 */
class DestinyService extends Service {

	public function __construct(Platform $platform) {
		parent::__construct($platform);
	}
		
	public function getPublicXurVendor(){
		return $this->_Platform->doRequest(new \GuzzleHttp\Psr7\Request('GET', '/platform/destiny/advisors/xur'));
	}

}
