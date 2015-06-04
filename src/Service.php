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
	
	public function __construct(Platform $platform) {
		$this->_Platform = $platform;
	}
	
}
