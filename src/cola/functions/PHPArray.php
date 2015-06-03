<?php

namespace Cola\Functions;

/**
 * _Array
 */
class PHPArray {

	/**
	 * Checks whether a given set of keys exist in an array
	 * @param array $arr The array to search
	 * @return boolean True if all keys exist, otherwise false
	 */
	public static function keysExist(array $arr /*, $key1, $key2, etc...*/){
		
		for($i = 1, $l = \func_num_args() - 1; $i <= $l; ++$i){
			if(!\array_key_exists(\func_get_arg($i), $arr)){
				return false;
			}
		}
		
		return true;
		
	}
	
	/**
	 * Checks whether a given array is an associative
	 * array (one which has at least 1 element with a string
	 * as the key)
	 * @see http://stackoverflow.com/a/4254008/570787
	 * @param array $a
	 * @return bool
	 */
	public static function isAssociative(array $a){
		return (bool)\count(\array_filter(\array_keys($a), 'is_string'));
	}
	
	/**
	 * Traverses an array and generates a new array with the returned values
	 * which pass the predicate function
	 * @param array $arr
	 * @param callable $predicate ($value, $key)
	 * @return array
	 */
	public static function map(array &$arr, callable $predicate){

		$ret = array();

		foreach($arr as &$k => &$v){
			if($predicate($v, $k)){
				$ret[$k] = $v;
			}
		}

		return $ret;

	}

	/**
	 * Performs an action for each element in the array
	 * @param array $arr
	 * @param callable $action Function with two optional parameters: $v value, $k key
	 */
	public static function each(array &$arr, callable $action){
		foreach($arr as &$k => &$v){
			$action($v, $k);
		}
	}

	/**
	 * Checks if all elements in the array pass a predicate function
	 * @param array $arr
	 * @param callable $predicate
	 * @return boolean
	 */
	public static function every(array &$arr, callable $predicate){
		foreach($arr as &$k => &$v){
			if($predicate($v, $k) !== true){
				return false;
			}
		}
		return true;
	}

	/**
	 * Checks if any element passes a predicate function
	 * @param array $arr
	 * @param callable $predicate
	 * @return boolean
	 */
	public static function some(array &$arr, callable $predicate){
		foreach($arr as &$k => &$v){
			if($predicate($v, $k) === true){
				return true;
			}
		}
		return false;
	}

	/**
	 * Checks if an element passes the predicate function
	 * @param array $arr
	 * @param callable $predicate
	 * @return boolean
	 */
	public static function find(array &$arr, callable $predicate){
		return static::some($arr, $predicate);
	}

	/**
	 * Returns the key for the element which passes the given predicate function
	 * @param array $arr
	 * @param callable $predicate
	 * @return mixed|null Null is returned if no match was found
	 */
	public static function findKey(array &$arr, callable $predicate){
		foreach($arr as &$k => &$v){
			if($predicate($v, $k) === true){
				return $k;
			}
		}
		return null;
	}	
	
	/**
	 * Checks if $key is the last element in $array
	 * @param array $array
	 * @param type $key
	 * @return bool
	 * @throws InvalidArgumentException
	 */
	function last(array $array, $key){
		\end($array);
		return \key($array) === $key;
	}
	
}
