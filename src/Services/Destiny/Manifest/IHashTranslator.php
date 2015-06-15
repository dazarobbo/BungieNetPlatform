<?php

namespace BungieNetPlatform\Services\Destiny\Manifest;

/**
 * IHashTranslator
 */
interface IHashTranslator {
	
	/**
	 * Given in a hash value, this method returns the respective
	 * content the hash points to
	 * @param string $hashValue
	 * @param \Cola\Set
	 */
	public function getContent($hashValue);
	
}
