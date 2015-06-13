<?php

namespace BungieNetPlatform\Services;

use BungieNetPlatform\Platform;
use Cola\Json;

/**
 * Service
 */
abstract class Service extends \Cola\Object {

	/**
	 *
	 * @var Platform
	 */
	protected $_Platform;
	protected $_Name;
	
	public function __construct(Platform $platform, $name) {
		$this->_Platform = $platform;
		$this->_Name = $name;
	}
	
	/**
	 * 
	 * @param \GuzzleHttp\Psr7\Request $request
	 * @return \stdClass $json object
	 */
	protected function doRequest(\GuzzleHttp\Psr7\Request $request){
		
		$uri = $request
				->getUri()
				->withPath(
						\BungieNetPlatform\BungieNet::platformPath() . '/' .
						$this->_Name .
						$request->getUri()->getPath());
					
		$request = $request->withUri($uri);
		
		$response = $this->_Platform->doRequest($request);
		
		$json = Json::deserialise(
				$response->getBody()->getContents(),
				false,
				Json::DEFAULT_INPUT_DEPTH,
				\JSON_BIGINT_AS_STRING
		);
		
		return $json;
		
	}
	
}
