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
	 * @var string internal hash value
	 */
	protected $_Hash = '';
	
	/**
	 * @var IHashTranslator
	 */
	protected static $DefaultHashTranslator = null;
	
	/**
	 * Compares this hash against another
	 * @param static $obj
	 * @return -1, 0, -1 depending on order
	 * @throws \RuntimeException
	 */
	public function compareTo($obj){
		
		if(!($obj instanceof static)){
			throw new \RuntimeException('$obj is not a ' . __CLASS__);
		}
		
		return Number::compare($this->_Hash, $obj->_Hash);
		
	}
	
	public function __construct($str){
		$this->_Hash = $str;
	}
	
	/**
	 * Given an IHashTranslator, returns the content related to this hash value.
	 * If one is not provided, a previously-set default translator will be tried.
	 * @param \BungieNetPlatform\Services\Destiny\Manifest\IHashTranslator $translator
	 * @return \Cola\Set
	 */
	public function getContent(IHashTranslator $translator = null){
		
		if($translator !== null){
			return $translator->getContent($this->_Hash);
		}
		else if(static::$DefaultHashTranslator !== null){
			return static::$DefaultHashTranslator->getContent($this->_Hash);
		}
		
		throw new \DomainException('No translator defined');
		
	}
	
	/**
	 * Sets a default translator to be used for any Hash instance when getContent
	 * is called without a parameter.
	 * @param \BungieNetPlatform\Services\Destiny\Manifest\IHashTranslator $translator
	 */
	public static function setDefaultTranslator(IHashTranslator $translator){
		static::$DefaultHashTranslator = $translator;
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
	
	public function __toString() {
		return (string)$this->_Hash;
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

}
