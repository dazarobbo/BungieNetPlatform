<?php

namespace BungieNetPlatform\Services\Destiny\Manifest;

use Cola\Functions\Number;
use Cola\Object;
use Cola\IEquatable;
use BungieNetPlatform\Enums\HashType;

/**
 * Hash
 * 
 * $hash = new Hash('43786345', HashType::ACTIVITY());
 * 
 * @since version 1.0.0
 * @version 1.0.0
 * @author dazarobbo <dazarobbo@live.com>
 */
class Hash extends Object implements IEquatable {

	/**
	 * @var string internal hash value
	 */
	protected $_Hash = '';
	
	/**
	 * @var HashType
	 */
	protected $_Type;
	
	/**
	 * @var IHashTranslator
	 */
	protected static $DefaultHashTranslator = null;
	
	
	/**
	 * Create a new hash
	 * @param string $str
	 * @param HashType $type
	 */
	public function __construct($str, HashType $type = null){
		$this->_Hash = \strval($str);
		$this->_Type = $type;
	}
	
	/**
	 * Whether this Hash equals another
	 * @param self $obj
	 * @return bool
	 */
	public function equals($obj) {
		
		if(!($obj instanceof static)){
			throw new \RuntimeException('Incompatible types');
		}
		
		return $this->_Type === $obj->_Type && $this->_Hash === $obj->_Hash;
		
	}
	
	/**
	 * Given an IHashTranslator, returns the content related to this hash value.
	 * If one is not provided, a previously-set default translator will be tried.
	 * @param IHashTranslator $translator
	 * @return mixed
	 */
	public function getContent(IHashTranslator $translator = null){
		
		if(isset($translator)){
			return $translator->getContent($this);
		}
		else if(isset(static::$DefaultHashTranslator)){
			return static::$DefaultHashTranslator->getContent($this);
		}
		
		throw new \DomainException('No translator defined');
		
	}
	
	/**
	 * Type that this hash represents
	 * @return HashType
	 */
	public function getType(){
		return $this->_Type;
	}
	
	/**
	 * Sets a default translator to be used for any Hash instance when getContent
	 * is called without a parameter.
	 * @param IHashTranslator $translator
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
		return $this->_Hash;
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
