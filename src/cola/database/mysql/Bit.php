<?php

namespace Cola\Database\MySQL;

use Cola\Functions\Number;

/**
 * Bit
 * @link https://dev.mysql.com/doc/refman/5.6/en/bit-type.html
 */
class Bit {

	/**
	 * Number of bits
	 * @var int
	 */
	protected $_M;

	public function __construct($len = 1) {
		$this->setLength($len);
	}
	
	public function setLength($len){
		
		if(Number::between($len, MySQL::getConstant('BIT_M_MIN'),
				MySQL::getConstant('BIT_M_MAX'))){
			$this->_M = $len;
		}
		else{
			throw new \RangeException('Bit type length invalid');
		}
		
	}
	
	public function getLength(){
		return $this->_M;
	}

	public function __toString() {
		return \sprintf('bit(%s)', $this->_M);
	}

}
