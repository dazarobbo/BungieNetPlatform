<?php

namespace Cola\Database\MySQL;

use Cola\Functions\Number;

/**
 * Integer
 */
class Integer extends \Cola\Database\IntegerDataType {

	const TINY_INT = 1;
	const SMALL_INT = 2;
	const MEDIUM_INT = 3;
	const INT = 4;
	const BIG_INT = 5;
	
	/**
	 * By default, use int type
	 * @var int One of this class' constants 
	 */
	protected $_IntType = static::INT;
	
	public function __construct($len) {
		parent::__construct($len);
	}
	
	public function getIntType(){
		return $this->_IntType;
	}
	
	public function setIntType($intType){
		$this->_IntType = $intType;
	}
	
	public function intTypeToString(){
		switch($this->_IntType){
			case static::TINY_INT: return 'tinyint';
			case static::SMALL_INT: return 'smallint';
			case static::MEDIUM_INT: return 'mediumint';
			case static::INT: return 'int';
			case static::BIG_INT: return 'bigint';
			default: throw new \DomainException('Unknown integer type');
		}
	}
	
	/**
	 * Determines the most appropriate int type
	 * @param string $intStr String containing an integer value
	 */
	public static function parse($intStr){
		
		$int = new static(\strlen($intStr));
		
		if(Number::between($int, MySQL::getConstant('TINYINT_MIN'),
				MySQL::getConstant('TINYINT_MAX'))){
			$int->_IntType = static::TINY_INT;
		}
		else if(Number::between($int, MySQL::getConstant('SMALLINT_MIN'),
				MySQL::getConstant('SMALLINT_MAX'))){
			$int->_IntType = static::SMALL_INT;
		}
		else if(Number::between($int, MySQL::getConstant('MEDIUMINT_MIN'),
				MySQL::getConstant('MEDIUMINT_MAX'))){
			$int->_IntType = static::MEDIUM_INT;
		}
		else if(Number::between($int, MySQL::getConstant('INT_MIN'),
				MySQL::getConstant('INT_MAX'))){
			$int->_IntType = static::INT;
		}
		else if(Number::between($int, MySQL::getConstant('BIGINT_MIN'),
				MySQL::getConstant('BIGINT_MAX'))){
			$int->_IntType = static::BIG_INT;
		}
		else{
			//No types can hold this
			return null;
		}
				
		return $int;
		
	}
	
	public function __toString() {
		return \sprintf('%s(%s)', $this->intTypeToString(),
				$this->_Length);
	}

}
