<?php

namespace BungieNetPlatform\Services\Destiny\Manifest;

/**
 * IHashTranslator
 * 
 * @since version 1.0.0
 * @version 1.0.0
 * @author dazarobbo <dazarobbo@live.com>
 */
interface IHashTranslator {
	
	/**
	 * Given in a hash value, this method returns the respective
	 * content the hash points to
	 * @param Hash
	 * @return mixed
	 */
	public function getContent(Hash $hash);
	
}
