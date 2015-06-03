<?php

namespace Cola;

/**
 * Enum
 */
abstract class Enum extends Object {

	public static function parse($var){
		
		$refl = new \ReflectionClass(\get_called_class());
		
		foreach($refl->getConstants() as $cons){
			if($cons === $var){
				return $cons;
			}
		}

		return null;
		
	}
	
}