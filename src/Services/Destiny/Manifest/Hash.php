<?php

namespace BungieNetPlatform\Services\Destiny\Manifest;

use Cola\Functions\Number;
use Cola\Object;
use Cola\IComparable;

/**
 * Hash
 */
class Hash extends Object implements IComparable {

	/**
	 * @var string
	 */
	protected $_Hash;
	
	public function __construct($str) {
		$this->_Hash = $str;
	}
	
	/**
	 * Platform-dependent method to check if, when casting to an int,
	 * the int will overflow or a PHP variable will not be large
	 * enough to hold it. The bcmath extension is required for this
	 * method to work correctly.
	 * @return bool
	 */
	public function willOverflowAsInt(){
		return Number::greaterThan($this->_Hash, \PHP_INT_MAX);
	}
	
	/**
	 * Casts the hash to an int variable. Warning: this may overflow
	 * if you're using 32-bit PHP, so use willOverflowAsInt to check
	 * beforehand
	 * @return int
	 */
	public function toInt(){
		return (int)$this->_Hash;
	}
	
	/**
	 * Given an IHashTranslator, returns the content related to this hash value
	 * @param \BungieNetPlatform\Services\Destiny\Manifest\IHashTranslator $translator
	 * @return type
	 */
	public function getContent(IHashTranslator $translator){
		return $translator->getContent($this->_Hash);
	}
	
	public function __toString() {
		return (string)$this->_Hash;
	}

	public function compareTo($obj) {
		
		if(!($obj instanceof static)){
			throw new \RuntimeException('$obj is not a ' . __CLASS__);
		}
		
		return Number::compare($this->_Hash, $obj->_Hash);
		
	}

}
