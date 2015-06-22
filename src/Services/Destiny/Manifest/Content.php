<?php

namespace BungieNetPlatform\Services\Destiny\Manifest;

use BungieNetPlatform\BungieNet;
use Cola\Object;

/**
 * Content
 */
class Content extends Object {

	/**
	 * Language the content is in
	 * @var string 
	 */
	protected $_Language;
	
	/**
	 * Path to the remote content file
	 * @var string
	 */
	protected $_Path;
	
	/**
	 * 
	 * @param string $language
	 * @param string $path Remote path to compressed database file
	 */
	public function __construct($language, $path) {
		$this->_Language = $language;
		$this->_Path = $path;
	}
	
	/**
	 * Downloads and uncompresses the database file
	 * @return string Temp file location of database file
	 */
	public function downloadDatabase(){
		
		//Download
		$client = new \GuzzleHttp\Client(['base_url' => BungieNet::PlatformPath() . '/']);
		$r = $client->get($this->_Path);
		
		//Put response in temp file
		$fName = \tempnam(\sys_get_temp_dir(), '');
		$temp = \fopen($fName, 'w');
		\fwrite($temp, $r);
		\fclose($temp);
		
		//Load file into zip archive
		$zip = new \ZipArchive();
		$zip->open($fName);
		$dbTempFile = \tempnam(\sys_get_temp_dir(), '');
		$zip->extractTo($dbTempFile, [ $zip->getNameIndex(0) ]);
		
		//Clean up
		$zip->close();
		\unlink($fName);
		
		return $dbTempFile;
		
	}

	public function __toString() {
		return \sprintf('Manifest content [%s]', $this->_Language);
	}

}
