<?php

namespace BungieNetPlatform\Responses;

use BungieNetPlatform\PlatformResponse;
use Cola\Object;

/**
 * Response
 * 
 * Base class for endpoint responses
 * 
 * @since version 1.0.0
 * @version 1.0.0
 * @author dazarobbo <dazarobbo@live.com>
 */
class Response extends Object {

	/**
	 * Inner response
	 * @var PlatformResponse
	 */
	protected $_PlatformResponse;

	public function __construct(PlatformResponse $response) {
		$this->_PlatformResponse = $response;
	}
	
	/**
	 * Returns the base response information
	 * @return PlatformResponse
	 */
	public function &getInnerResponse(){
		return $this->_PlatformResponse;
	}
	
	public function __toString() {
		return (string)$this->_PlatformResponse->getErrorStatus();
	}

}
