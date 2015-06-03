<?php

namespace Cola\Database\MySQL;

use Cola\Functions\Number;

/**
 * String
 */
class String extends \Cola\Database\DataTypes\StringDataType {
	
	const CHAR = 1;
	const VARCHAR = 2;
	const TINYTEXT = 3;
	const TEXT=  4;
	const MEDIUMTEXT = 5;
	const LONGTEXT = 6;
	
	protected $_StringType = static::TEXT;
	
	public function __construct($len, $strType) {
		$this->_StringType = $strType;
		parent::__construct($len);
	}
	
	public function getStringType(){
		return $this->_StringType;
	}
	
	public function setStringType($strType){
		$this->_StringType = $strType;
	}

	/**
	 * Parse a string object to a MySQL string type
	 * Prefers VARCHARs over BLOBs
	 * @param mixed $object
	 * @return \static
	 */
	public static function parse($object){
		
		$len = \strlen($object);
		
		
		
		if(Number::between($len, MySQL::getConstant('CHAR_LEN_MIN'),
				MySQL::getConstant('CHAR_LEN_MAX'))){
			return new static($len, static::CHAR);
		}
		else if(Number::between($len, MySQL::getConstant('VARCHAR_LEN_MIN'),
				MySQL::getConstant('VARCHAR_LEN_MAX'))){
			return new static($len, static::VARCHAR);
		}
		else if(Number::between($len, MySQL::getConstant('MEDIUMTEXT_LEN_MIN'),
				MySQL::getConstant('MEDIUMTEXT_LEN_MAX'))){
			return new static($len, static::MEDIUMTEXT);
		}
		else if(Number::between($len, MySQL::getConstant('LONGTEXT_LEN_MIN'),
				MySQL::getConstant('LONGTEXT_LEN_MAX'))){
			return new static($len, static::LONGTEXT);
		}
		
		return null;
		
	}
	
	public function strTypeToString(){
		switch($this->_StringType){
			case static::CHAR: return 'char';
			case static::VARCHAR: return 'varchar';
			case static::TINYTEXT: return 'tinytext';
			case static::TEXT: return 'text';
			case static::MEDIUMTEXT: return 'mediumtext';
			case static::LONGTEXT: return 'longtext';
			default: throw new \DomainException('String type unknown');
		}
	}

	public function __toString() {
		switch($this->_StringType){
			
			case static::CHAR:
			case static::VARCHAR:
				return \sprintf('%s(%s)', $this->strTypeToString(),
						$this->_Length);
			
			case static::TINYTEXT:
			case static::TEXT:
			case static::MEDIUMTEXT:
			case static::LONGTEXT:
				return $this->strTypeToString();
				
			default:
				throw new \DomainException('No string type defined');
				
		}
	}

}
