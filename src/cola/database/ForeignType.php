<?php

namespace Cola\Database;

/**
 * ForeignType
 */
class ForeignType extends Type implements \JsonSerializable {

	protected $_PrimaryType = null;
	
	public function __construct($name, $dataType, &$primaryType) {
		parent::__construct($name, $dataType);
		$this->_PrimaryType = $primaryType;
	}
	
	public function setPrimaryType(Type &$type){
		$this->_PrimaryType = $type;
	}
	
	public function &getPrimaryType(){
		return $this->_PrimaryType;
	}
		
	public function jsonSerialize() {
		$o = parent::jsonSerialize();
		$o->foreign = true;
		return $o;
	}

}
