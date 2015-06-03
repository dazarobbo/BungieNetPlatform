<?php

namespace Cola\Database\DataTypes;

/**
 * FloatingPointDataType
 */
abstract class FloatingPointDataType extends DataType {

	protected $_Precision;
	protected $_Scale;
	
	public function __construct($precision, $scale) {
		$this->_Precision = $precision;
		$this->_Scale = $scale;
	}
	
	public function getPrecision(){
		return $this->_Precision;
	}
	
	public function setPrecision($precision){
		$this->_Precision = $precision;
	}
	
	public function getScale(){
		return $this->_Scale;
	}
	
	public function setScale($scale){
		$this->_Scale = $scale;
	}

}
