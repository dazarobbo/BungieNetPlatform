<?php

namespace Cola;

/**
 * Set
 */
interface ISet extends \ArrayAccess, \Countable, IClearable,
		\JsonSerializable, \IteratorAggregate {
	
	public function __construct();
	public function add();
	public function contains($obj);
	public function copy($deep = true);
	public function each(callable $predicate);
	public function every(callable $predicate);
	public function isEmpty();
	public function map(callable $predicate);
	public function remove($obj);
	public function some(callable $predicate);
	public function sort(callable $compare);
	public function unique(callable $compare = null);
	public function toArray();
	public function __toString();
	
}
