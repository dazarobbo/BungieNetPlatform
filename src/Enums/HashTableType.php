<?php

namespace BungieNetPlatform\Enums;

/**
 * HashTableType
 */
class HashTableType extends \Cola\Enum {

	const ID = 1;
	const KEY = 2;
	
	protected static $_ColumnMap = array(
		self::ID => 'id',
		self::KEY => 'key'
	);
	
	public function getColumnName(){
		
		if(isset(static::$_ColumnMap[$this->_Value])){
			return static::$_ColumnMap[$this->_Value];
		}
		
		return null;
		
	}
	
}
