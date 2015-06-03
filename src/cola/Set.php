<?php

namespace Cola;

use Cola\Functions\PHPArray;

/**
 * Set
 */
class Set extends Object implements ISet {

	protected $_Storage = [];
	
	public function __construct() {
	}

	public function add() {
		foreach(\func_get_args() as $arg){
			$this->_Storage[] = $arg;
		}
		return $this;
	}

	public function clear(callable $predicate = null) {
		
		if(\is_callable($predicate)){
			foreach($this->_Storage as $key => $value){
				if($predicate($value)){
					unset($this->_Storage[$key]);
				}
			}
			\array_values($this->_Storage);
		}
		else{
			$this->_Storage = [];
		}
		
		return $this;
		
	}

	public function contains($obj) {
		return \in_array($obj, $this->_Storage, true);
	}
	
	public function copy($deep = true){
		
		$set = new static();
		
		foreach($this->_Storage as $item){
			$set->_Storage[] = $deep ? clone $item : $item;
		}
		
		return $set;
		
	}

	public function count($mode = \COUNT_NORMAL) {
		return \count($this->_Storage, $mode);
	}
	
	public function each(callable $action){
		PHPArray::each($this->_Storage, $action);		
	}
	
	public function every(callable $predicate) {
		return PHPArray::every($this->_Storage, $predicate);
	}

	public function getIterator() {
		return new \ArrayIterator($this->_Storage);
	}

	public function jsonSerialize() {
		return $this->_Storage;
	}

	public function isEmpty() {
		return $this->count() === 0;
	}

	public function map(callable $predicate) {
		$set = new static();
		$set->_Storage = PHPArray::map($this->_Storage, $predicate);
		return $set;
	}

	public function offsetExists($offset) {
		return isset($this->_Storage[$offset]);
	}

	public function &offsetGet($offset) {
		return $this->_Storage[$offset];
	}

	public function offsetSet($offset, $value) {

		if(isset($offset)){
			$this->_Storage[$offset] = $value;
		}
		else{
			$this->_Storage[] = $value;
		}
		
	}

	public function offsetUnset($offset) {
		unset($this->_Storage[$offset]);
		\array_values($this->_Storage);
	}
	
	public function remove($obj) {
		
		foreach($this->_Storage as $key => $item){
			if($item === $obj){
				unset($this->_Storage[$key]);
			}
		}
		
		\array_values($this->_Storage);
		
		return $this;
		
	}
		
	public function some(callable $predicate) {
		return PHPArray::some($this->_Storage, $predicate);		
	}

	public function sort(callable $compare) {
		\usort($this->_Storage, $compare);
		return $this;
	}

	public function toArray() {
		return $this->_Storage;
	}
	
	public function unique(callable $compare = null) {
		
		if(\is_callable($compare)){
		
			$set = new static();
			
			foreach($this->_Storage as $item){
				if($set->some(function($elem) use ($item, $compare) {
					return $compare($item, $elem); })){
						$set->_Storage[] = $item;
				}
			}
			
			$this->_Storage = $set->_Storage;
			
		}
		else{
			\array_unique($this->_Storage);
		}
		
	}

}
