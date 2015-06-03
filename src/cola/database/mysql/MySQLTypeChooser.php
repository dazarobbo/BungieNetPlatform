<?php

namespace Cola\Database\MySQL;

/**
 * MySQLTypeChooser
 */
class MySQLTypeChooser extends \Cola\Object implements \Cola\Database\DataTypes\ITypeChooser {

	public function __construct() {
		
	}

	public function getType($object) {
		
		$type = \strtolower(\gettype($object));
		
		if(is_int($type)){
			
			$int = Integer::parse($object);
			
			//If an integer type was not enough to store the value
			//let it fall through to string type
			if($int !== null){
				return $int;
			}
			
		}
		
		if(\is_float($object)){
			//Prefer decimal over floating point
			return Decimal::parse($object);
		}
		
		if(\is_bool($object)){
			return Boolean::parse($object);
		}
		
		return String::parse($object);
		
	}

}
