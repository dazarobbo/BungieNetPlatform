<?php

namespace Cola\Database\MySQL;

use Cola\Functions\Number;

/**
 * Decimal
 */
class Decimal extends \Cola\Database\DataTypes\DecimalDataType {

	public function __construct($mLen, $dLen) {
		parent::__construct($mLen, $dLen);
	}
	
	/**
	 * Parse a PHP float/string to a MySQL decimal type
	 * @link https://dev.mysql.com/doc/refman/5.6/en/precision-math-decimal-characteristics.html
	 * @param mixed $object
	 * @return \static
	 */
	public static function parse($object){
		
		$num = \preg_replace('/[^\.\d]/', '', \strval($object));
		
		list($m, $d) = \explode('.', $num, 2);
		
		$mLen = \strlen($m);
		$dLen = \strlen($d);
				
		if(!Number::between($mLen, MySQL::getConstant('DECIMAL_M_MIN'),
				MySQL::getConstant('DECIMAL_M_MAX'))){
			return null;
		}
		
		if(!Number::between($dLen, MySQL::getConstant('DECIMAL_D_MIN'),
				MySQL::getConstant('DECIMAL_D_MAX'))){
			return null;
		}
		
		if($dLen > $mLen){
			return null;
		}
		
		return new static($mLen, $dLen);
		
	}
	
	public function __toString() {
		return \sprintf('decimal(%s,%s)', $this->_Precision, $this->_Scale);
	}

}
