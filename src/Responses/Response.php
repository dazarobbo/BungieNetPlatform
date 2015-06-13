<?php

namespace BungieNetPlatform\Responses;

use BungieNetPlatform\PlatformResponse;

/**
 * Response
 */
abstract class Response extends \Cola\Object {

	/**
	 * Inner response
	 * @var \BungieNetPlatform\PlatformResponse
	 */
	protected $_PlatformResponse;

	public function __construct(\stdClass $json) {
		$this->_PlatformResponse = new PlatformResponse($json);
	}
	
	/**
	 * Returns the base response information
	 * @return \BungieNetPlatform\PlatformResponse
	 */
	public function &getInnerResponse(){
		return $this->_PlatformResponse;
	}
	
	public function __toString() {
		return (string)$this->_PlatformResponse->getErrorStatus();
	}

}
