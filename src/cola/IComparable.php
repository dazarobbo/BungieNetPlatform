<?php

namespace Cola;

/**
 * IComparable
 */
interface IComparable {

	/**
	 * Returns -1 if $this occurs before $obj,
	 * 0 if $this is equal to $obj, 1 if $this occurs
	 * after $obj
	 * @param mixed $obj
	 * @return int
	 */
	public function compareTo($obj);
	
}
