<?php

namespace BungieNetPlatform;

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
	
	protected function doRequest(\GuzzleHttp\Psr7\Request $request){
		
		$uri = $request
				->getUri()
				->withPath(
						BungieNet::platformPath() . '/' .
						$this->_Name .
						$request->getUri()->getPath());
					
		$request = $request->withUri($uri);
		
		return $this->_Platform->doRequest($request);
		
	}
	
}
