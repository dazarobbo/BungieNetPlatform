<?php

namespace Cola\Database;

/**
 * Table
 */
class Table extends \Cola\Object implements \JsonSerializable {

	/**
	 * Collection of this table's columns
	 * @var TypeCollection
	 */
	protected $_TypeCollection;
	
	/**
	 * Name of this table
	 * @var string
	 */
	protected $_Name;
	
	
	public function __construct($name) {
		$this->_TypeCollection = new TypeCollection();
		$this->setName($name);
	}
	
	public function &getTypes(){
		return $this->_TypeCollection;
	}
	
	public function addType(Type &$type){
		$type->setOwningTable($this);
		$this->_TypeCollection->Add($type);
	}
	
	public function setName($name){
		$this->_Name = $name;
	}
	
	public function getName(){
		return $this->_Name;
	}
	
	public function jsonSerialize() {
		return (object)[
			'name' => $this->_Name,
			'types' => $this->_TypeCollection
		];
	}

}
