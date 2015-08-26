<?php

namespace BungieNetPlatform\Services;

use Cola\Json;
use Cola\Object;
use BungieNetPlatform\BungieNet;
use BungieNetPlatform\Platform;
use BungieNetPlatform\PlatformResponse;
use BungieNetPlatform\Exceptions\PlatformException;
use GuzzleHttp\Psr7\Request as PsrRequest;

/**
 * Service
 * 
 * Base class for any specific service types (ie. User, Destiny, etc...)
 * 
 * @since version 1.0.0
 * @version 1.0.0
 * @author dazarobbo <dazarobbo@live.com>
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
	 * service. The request should have only a partial path in the 
	 * following format /Platform{request path}
	 * @param PsrRequest $psrRequest
	 * @return PlatformResponse
	 */
	protected function doRequest(PsrRequest $psrRequest){
		
		$uri = BungieNet::getPlatformUri();
		
		$uri = $uri->withPath(
					$uri->getPath() .
					'/' .
					$this->_Name . 
					$psrRequest->getUri()->getPath());
		
		$uri = $uri->withQuery($psrRequest->getUri()->getQuery());
		$uri = $uri->withFragment($psrRequest->getUri()->getFragment());
		
		$psrRequest = $psrRequest->withUri($uri);
		
		//
		
		$psrResponse = $this->_Platform->httpRequest($psrRequest);
		
		$json = Json::deserialise(
				$psrResponse->getBody()->getContents(),
				false,
				Json::DEFAULT_INPUT_DEPTH,
				\JSON_BIGINT_AS_STRING
		);
		
		//Check for bad JSON
		if(Json::lastError() !== \JSON_ERROR_NONE){
			throw new PlatformException('Failed to parse JSON');
		}
		
		$response = new PlatformResponse($json);
		
		//Check for exceptions from the platform and throw it locally
		if(($ex = Platform::getResponseException($response)) !== null){
			$ex->Response = $response;
			throw $ex;
		}
		
		return $response;
		
	}
	
}
