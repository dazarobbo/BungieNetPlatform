<?php

namespace BungieNetPlatform\Services\Destiny\Manifest;

use BungieNetPlatform\BungieNet;
use Cola\Object;
use Cola\IComparable;

/**
 * Manifest
 */
class Manifest extends Object implements IComparable {
	
	/**
	 * Version of this manifest
	 * @var Version
	 */
	protected $_Version;
	
	/**
	 * Values representing/within the manifest
	 * @var stdClass
	 */
	protected $_Content;
	
	/**
	 * Version of this manifest
	 * @return Version
	 */
	public function getVersion(){
		return $this->_Version;
	}
	
	/**
	 * Returns the content of the manifest
	 * @return stdClass
	 */
	public function getContent(){
		return $this->_Content;
	}
		
	public static function getLatestManifest(){
		
		$client = new \GuzzleHttp\Client(['base_url' => BungieNet::PlatformPath() . '/']);
		$resp = $client->get('destiny/manifest')->json();
		
		$self = new static();
		$self->_Version = new Version($resp['Response']['version']);
		$self->_Content = (object)$resp['Response'];
		
		return $self;
		
	}
	
	public function __toString() {
		return $this->_Version->__toString();
	}

	/**
	 * Compare this manifest to another based on version
	 * @param Version $obj
	 * @return int
	 */
	public function compareTo($obj) {
		return $this->_Version->compareTo($obj->_Version);
	}

	protected function __construct(){
	}

}