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
	 * Cache of items from database indexed by normalised hash value
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
	
	/**
	 * Retrieves content using local cache or using base method
	 * to query database
	 * @param string $hashValue
	 * @return \Cola\Set
	 */
	public function getContent($hashValue) {
		
		if(isset($this->_Cache[$hashValue])){
			return $this->_Cache[$hashValue];
		}
		
		$content = parent::getContent($hashValue);
		$this->setCacheItem($hashValue, $content);
		
		return $content;
		
	}
	
	/**
	 * Sets an item in the cache and removes old items when
	 * necessary
	 * @param string $hashValue
	 * @param \Cola\Set $content
	 */
	protected function setCacheItem($hashValue, $content){
		
		//If not set to no limit, take 75% of the cache starting
		//at the end where the most recently added items will be
		if($this->_CacheSize !== static::NO_LIMIT){
			if(\count($this->_Cache) >= $this->_CacheSize){
				$this->_Cache = \array_slice(
						$this->_Cache,
						-$this->_CacheSize,
						\floor($this->_CacheSize * 0.75),
						true);
			}
		}
		
		$this->_Cache[$hashValue] = $content;
		
	}
	
}
