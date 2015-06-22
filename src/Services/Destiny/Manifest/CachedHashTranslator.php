<?php

namespace BungieNetPlatform\Services\Destiny\Manifest;

/**
 * CachedHashTranslator
 * 
 * Retrieves content from a database matching a given hash
 * value. Content is cached for faster access with no limit
 * to its size by default.
 */
class CachedHashTranslator extends BasicHashTranslator {

	/**
	 * @var int used to represent no limit to number of items to
	 * be cached
	 */
	const NO_LIMIT = -1;
	
	/**
	 * Cache of items from database indexed by normalised hash value.
	 * It is structured as follows.<br><br>
	 * [
	 *		'hash value' => [
	 *			'hash type' => content,
	 *			'hash type' => content
	 *		]
	 * ]
	 * @var array
	 */
	protected $_Cache = [];
	
	/**
	 * Maximum number of results permitted in cache
	 * @var int
	 */
	protected $_CacheSize = self::NO_LIMIT;
	

	public function __construct(ContentDatabase &$database,
			$cacheSize = self::NO_LIMIT) {
		
		$this->_CacheSize = $cacheSize;
		parent::__construct($database);
		
	}
	
	protected function getCacheBucket($id){
		
		if(isset($this->_Cache[$id])){
			return $this->_Cache[$id];
		}
		
		return null;
		
	}
	
	public function getCachedItem(Hash $hash){
		
		$bucket = $this->getCacheBucket(\strval($hash));
		
		if($bucket !== null){
			$content = $bucket[$hash->getType()->getValue()];
			if(isset($content)){
				return $content;
			}
		}
		
		return null;
		
	}
	
	/**
	 * Retrieves content using local cache or using base method
	 * to query database
	 * @param Hash
	 * @return \stdClass
	 */
	public function getContent(Hash $hash) {
		
		if(($content = $this->getCachedItem($hash)) !== null){
			return $content;
		}
		
		$content = parent::getContent($hash);
		$this->setCacheItem($hash, $content);
		
		return $content;
		
	}
	
	/**
	 * Sets an item in the cache and removes old items when
	 * necessary
	 * @param Hash $hash
	 * @param \Cola\Set $content
	 */
	protected function setCacheItem(Hash $hash, $content){
		
		//If not set to no limit, take 75% of the cache starting
		//at the end where the most recently added items will be
		if($this->_CacheSize !== static::NO_LIMIT){
			if(\count($this->_Cache, \COUNT_RECURSIVE) >= $this->_CacheSize){
				$this->_Cache = \array_slice(
						$this->_Cache,
						-$this->_CacheSize,
						\floor($this->_CacheSize * 0.75),
						true);
			}
		}
		
		//Set a bucket if it doesn't exist
		if(!isset($this->_Cache[\strval($hash)])){
			$this->_Cache[\strval($hash)] = array();
		}
		
		$this->_Cache[\strval($hash)][$hash->getType()->getValue()] = $content;
		
	}
	
}
