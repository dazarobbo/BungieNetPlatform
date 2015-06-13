<?php

namespace BungieNetPlatform\Services\Destiny;

/**
 * PeerView
 */
class PeerView extends \Cola\Object {

	/**
	 * @var \Cola\Set
	 */
	public $Equipment;
	
	public function __construct() {
		$this->Equipment = new \Cola\Set();
	}

}
