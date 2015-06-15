<?php

namespace BungieNetPlatform\Services\Destiny\Manifest;

use Cola\Functions\Number;
use Cola\Object;
use Cola\IComparable;
use Cola\IClearable;

/**
 * Version
 */
class Version extends Object implements IComparable, \ArrayAccess,
		\Serializable, \JsonSerializable, \IteratorAggregate,
		\Countable, IClearable {

	/**
	 * @var int Default value for missing parts
	 */
	const DEFAULT_VALUE = 0;
	
	/**
	 * @var int Number of parts in a version
	 */
	const PARTS_LENGTH = 6;
	
	/**
	 * Integers representing each part of the version string
	 * @var \SplFixedArray
	 */
	protected $_Parts;
	
	
	public function clear(callable $predicate = null) {
		$this->initialise();
	}
	
	public function __clone() {
		$this->_Parts = clone $this->_Parts;
	}
	
	public function count($mode = \COUNT_NORMAL) {
		return \count($this->_Parts, $mode);
	}
	
	/**
	 * Compares a version instance to another
	 * @param static $other
	 * @return int -1 if this is older, 0 if the same, 1 if newer
	 * @throws \InvalidArgumentException
	 */
	public function compareTo($other) {
		
		if(!($other instanceof static)){
			throw new \InvalidArgumentException('$other must be a comparable version instance');
		}
		
		if($other === $this){
			return Number::COMPARISON_EQUAL;
		}
		
		for($i = 0; $i < static::PARTS_LENGTH; ++$i){
			
			$cmp = Number::compare($this->_Parts[$i], $other->_Parts[$i]);
			
			if($cmp !== Number::COMPARISON_EQUAL){
				return $cmp;
			}
			
		}
		
		//If no parts are different it's the same
		return Number::COMPARISON_EQUAL;
		
	}
	
	/**
	 * Create a new version 
	 * @param string|null $str Optional existing version string
	 */
	public function __construct($str = null){
		
		$this->_Parts = new \SplFixedArray(static::PARTS_LENGTH);
		
		$this->initialise();
		
		if($str !== null){
			$this->parseString($str);
		}
		
	}
	
	public function getIterator() {
		return new \ArrayIterator($this->_Parts);
	}
	
	protected function initialise(){
		for($i = 0; $i < static::PARTS_LENGTH; ++$i){
			$this->_Parts[$i] = static::DEFAULT_VALUE;
		}
	}
	
	public function jsonSerialize() {
		return (string)this;
	}
	
	public function offsetExists($offset) {
		return $offset >= 0 && $offset < static::PARTS_LENGTH;
	}

	public function offsetGet($offset) {
		return $this->_Parts[$offset];
	}

	/**
	 * Set an individual part of the version
	 * @param int $offset
	 * @param int $value
	 */
	public function offsetSet($offset, $value) {
		$this->_Parts[$offset] = \intval($value, 10);
	}

	/**
	 * Resets a part of the version to the default
	 * @param type $offset
	 */
	public function offsetUnset($offset) {
		$this->_Parts[$offset] = static::DEFAULT_VALUE;
	}
	
	/**
	 * Parses a version string
	 * @param string $str
	 */
	protected function parseString($str){
		
		$parts = \preg_split('/[^\d]+/', \trim($str), static::PARTS_LENGTH,
				\PREG_SPLIT_NO_EMPTY);
		
		//Only copy the minimum there and no more than the max allowed
		for($i = 0, $l = \min(\count($parts), static::PARTS_LENGTH); $i < $l; ++$i){
			$this->_Parts[$i] = \intval($parts[$i], 10);
		}
		
	}
	
	public function serialize() {
		return \serialize((string)$this);
	}

	public function unserialize($serialized) {
		$this->__construct($serialized);
	}
	
	/**
	 * Returns the string representation of this instance
	 * eg. '44675.15.04.03.2157-5'
	 * @return string
	 */
	public function __toString() {
		return \vsprintf(
				'%01.0u.%02.0u.%02.0u.%02.0u.%04.0u-%.0u',
				$this->_Parts->toArray());
	}
	
}
