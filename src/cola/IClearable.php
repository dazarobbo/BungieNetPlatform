<?php

namespace Cola;

/**
 * IClearable
 */
interface IClearable {

	/**
	 * Remove all items or those specified by the predicate 
	 * @param \Cola\callable $predicate
	 */
	public function clear(callable $predicate = null);

}
