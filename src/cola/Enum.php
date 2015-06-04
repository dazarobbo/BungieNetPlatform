<?php

namespace Cola;

/**
 * Enum
 */
abstract class Enum extends Object {

	protected $_Value;
	
	public static function parse($var){
		
		$refl = new \ReflectionClass(\get_called_class());
		
		foreach($refl->getConstants() as $cons){
			if($cons === $var){
				return $cons;
			}
		}

		return null;
		
	}
	
	public function __construct($val) {
		$this->__set(null, $val);
	}
	
	public function __get($name) {
		return $this->_Value;
	}
	
	public function __set($name, $value) {
		
		$refl = new \ReflectionClass(\get_called_class());
		
		foreach($refl->getConstants() as $cons){
			if($value === $cons){
				$this->_Value = $value;
				return;
			}
		}
		
		throw new \InvalidArgumentException('Illegal value ' . $value . ' for enum class ' . \get_called_class());
		
	}

	public function __toString() {
		return (string)$this->Value;
	}
	
}