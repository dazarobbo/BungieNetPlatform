<?php

namespace Cola\Database;

/**
 * TypeCollection
 */
class TypeCollection extends \Cola\Set {

	public function __construct() {
		parent::__construct();
	}
	
	public function addType(Type $t) {
		return parent::Add($t);
	}
	
	public function &getTypeByName($name){
		
		$map = $this->map(function($t) use ($name){
			return $t->getName() === $name; });
			
		if($map->isEmpty()){
			$null = null;
			return $null;
		}
		
		return $map->_Storage[0];
			
	}
	
	public function getConstraints(){
		
		$coll = new static();
		
		$coll->_Storage = $this
				->map(function($t){
					return $t instanceof PrimaryType ||
							$t instanceof ForeignType;
				})
				->toArray();
				
		return $coll;
		
	}
	
	public function getrPimaryTypes(){
		
		$coll = new static();
		
		$coll->_Storage = $this
				->map(function($t){	return $t instanceof PrimaryType; })
				->toArray();
		
		return $coll;
			
	}
	
	public function getForeignTypes(){
		
		$coll = new static();
		
		$coll->_Storage = $this
				->map(function($t){	return $t instanceof ForeignType; })
				->toArray();
		
		return $coll;
			
	}
	
	public function __toString() {
		return \implode(', ', \array_map(function($t){
			return $t->__toString(); }, $this->_Storage));
	}

}
