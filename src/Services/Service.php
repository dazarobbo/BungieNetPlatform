<?php

namespace BungieNetPlatform\Services;

use BungieNetPlatform\BungieNet;
use BungieNetPlatform\Platform;
use Cola\Json;
use Cola\Object;

/**
 * Service
 */
abstract class Service extends Object {

	/**
	 * @var Platform
	 */
	protected $_Platform;
	
	/**
	 * Name of this service to use in the path
	 * @var string
	 */
	protected $_Name;
	
	public function __construct(Platform $platform, $name) {
		$this->_Platform = $platform;
		$this->_Name = $name;
	}
	
	/**
	 * Initiates a request to the bungie.net platform according to this
	 * service.
	 * @param \GuzzleHttp\Psr7\Request $request
	 * @return \stdClass $json object
	 */
	protected function doRequest(\GuzzleHttp\Psr7\Request $request){
		
		$uri = $request
				->getUri()
				->withPath(
						BungieNet::platformPath() . '/' .
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
