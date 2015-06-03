<?php

namespace Cola;

/**
 * BitwiseEnum
 * Inheriting classes should define constants which are
 * mutually exclusive (bit flags)
 */
abstract class BitwiseEnum extends Enum {

	public static function parse($var) {
		
		$flags = 0;
		
		if(!\is_int($var)){
			return null;
		}

		$val = \intval($var, 10);
		$refl = new \ReflectionClass(\get_called_class());
		
		foreach($refl->getConstants() as $cons){
			if(($val & $cons) === $cons){
				$flags |= $cons;
			}
		}

		return $flags;
		
	}

}