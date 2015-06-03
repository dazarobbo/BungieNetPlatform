<?php

namespace Cola\Database\DataTypes;

/**
 * IntegerDataType
 */
abstract class IntegerDataType extends DataType {

	protected $_Length;
	
	public function __construct($len) {
		$this->_Length = $len;
	}
	
	public function getLength(){
		return $this->_Length;
	}
	
	public function setLength($length){
		$this->_Length = $length;
	}

}
