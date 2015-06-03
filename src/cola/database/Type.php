<?php

namespace Cola\Database;

use Cola\Database\DataType;

/**
 * Type
 * (aka. database column)
 */
class Type extends \Cola\Object implements \JsonSerializable {
	
	/**
	 * The table this type belongs to
	 * @var Table
	 */
	protected $_OwningTable = null;
	
	/**
	 * The name given to this type
	 * @var type 
	 */
	protected $_Name;
	
	/**
	 * The specific data type for this type (eg. int, varchar, etc...)
	 * @var DataType 
	 */
	protected $_DataType;
	
	/**
	 * Options for this type, such as not null, unique, index, etc...
	 * @var array
	 */
	protected $_Options = [];
	
	
	public function __construct($name, DataType $dataType) {
		$this->_Name = $name;
		$this->_DataType = $dataType;
	}
	
	public function getName(){
		return $this->_Name;
	}
	
	public function getDataType(){
		return $this->_DataType;
	}
	
	public function setDataType(DataType $dataType){
		$this->_DataType = $dataType;
	}
	
	public function setOwningTable(Table &$table){
		$this->_OwningTable = $table;
	}
	
	public function &getOwningTable(){
		return $this->_OwningTable;
	}
	
	public function jsonSerialize() {
		return (object)[
			'name' => $this->_Name,
			'type' => $this->_DataType];	
	}

}
