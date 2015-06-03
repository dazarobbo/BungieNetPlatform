<?php

namespace Cola\Database\MySQL;

/**
 * MySQL
 */
abstract class MySQL {

	const DATETIME_FORMAT = 'Y-m-d H:i:s';
	
	protected static $_Constants = [];
	
	protected static function calculateValues(){
		
		//https://dev.mysql.com/doc/refman/5.6/en/storage-requirements.html
		static::$_Constants['TINYINT_MIN'] =	\bcmul(\bcpow(2, (8 * 1) - 1), -1);
		static::$_Constants['TINYINT_MAX'] =	\bcsub(\bcpow(2, (8 * 1) - 1),  1);
		static::$_Constants['SMALLINT_MIN'] =	\bcmul(\bcpow(2, (8 * 2) - 1), -1);
		static::$_Constants['SMALLINT_MAX'] =	\bcsub(\bcpow(2, (8 * 2) - 1),  1);
		static::$_Constants['MEDIUMINT_MIN'] =	\bcmul(\bcpow(2, (8 * 3) - 1), -1);
		static::$_Constants['MEDIUMINT_MAX'] =	\bcsub(\bcpow(2, (8 * 3) - 1),  1);
		static::$_Constants['INT_MIN'] =		\bcmul(\bcpow(2, (8 * 4) - 1), -1);
		static::$_Constants['INT_MAX'] =		\bcsub(\bcpow(2, (8 * 4) - 1),  1);
		static::$_Constants['BIGINT_MIN'] =		\bcmul(\bcpow(2, (8 * 8) - 1), -1);
		static::$_Constants['BIGINT_MAX'] =		\bcsub(\bcpow(2, (8 * 8) - 1),  1);
		
		//https://dev.mysql.com/doc/refman/5.6/en/storage-requirements.html
		static::$_Constants['UNSIGNED_TINYINT_MIN'] =	0;
		static::$_Constants['UNSIGNED_TINYINT_MAX'] =	\bcsub(\bcpow(2, (8 * 1)), 1);
		static::$_Constants['UNSIGNED_SMALLINT_MIN'] =	0;
		static::$_Constants['UNSIGNED_SMALLINT_MAX'] =	\bcsub(\bcpow(2, (8 * 2)), 1);
		static::$_Constants['UNSIGNED_MEDIUMINT_MIN'] =	0;
		static::$_Constants['UNSIGNED_MEDIUMINT_MAX'] =	\bcsub(\bcpow(2, (8 * 3)), 1);
		static::$_Constants['UNSIGNED_INT_MIN'] =		0;
		static::$_Constants['UNSIGNED_TNT_MAX'] =		\bcsub(\bcpow(2, (8 * 4)), 1);
		static::$_Constants['UNSIGNED_BIGINT_MIN'] =	0;
		static::$_Constants['UNSIGNED_BIGINT_MAX'] =	\bcsub(\bcpow(2, (8 * 8)), 1);
		
		//https://dev.mysql.com/doc/refman/5.6/en/precision-math-decimal-characteristics.html
		static::$_Constants['DECIMAL_M_MIN'] = 1;
		static::$_Constants['DECIMAL_M_MAX'] = 65;
		static::$_Constants['DECIMAL_D_MIN'] = 0;
		static::$_Constants['DECIMAL_D_MAX'] = 30;
		
		//https://stackoverflow.com/questions/13506832/what-is-the-mysql-varchar-max-size
		static::$_Constants['VARCHAR_LEN_MIN'] = 0;
		static::$_Constants['VARCHAR_LEN_MAX'] = \bcmul(\bcpow(2, (8 * 2) - 1), -1);
		
		//https://dev.mysql.com/doc/refman/5.6/en/char.html
		static::$_Constants['CHAR_LEN_MIN'] = 0;
		static::$_Constants['CHAR_LEN_MAX'] = 255;
		
		//https://dev.mysql.com/doc/refman/5.6/en/string-type-overview.html
		static::$_Constants['TINYTEXT_LEN_MIN'] =	0;
		static::$_Constants['TINYTEXT_LEN_MAX'] =	\bcmul(\bcpow(2, (8 * 1) - 1), -1);
		static::$_Constants['TEXT_LEN_MIN']	=		0;
		static::$_Constants['TEXT_LEN_MAX'] =		\bcmul(\bcpow(2, (8 * 2) - 1), -1);
		static::$_Constants['MEDIUMTEXT_LEN_MIN'] =	0;
		static::$_Constants['MEDIUMTEXT_LEN_MAX'] =	\bcmul(\bcpow(2, (8 * 3) - 1), -1);
		static::$_Constants['LONGTEXT_LEN_MIN'] =	0;
		static::$_Constants['LONGTEXT_LEN_MAX'] =	\bcmul(\bcpow(2, (8 * 4) - 1), -1);
	
		//https://dev.mysql.com/doc/refman/5.6/en/bit-type.html
		static::$_Constants['BIT_M_MIN'] = 1;
		static::$_Constants['BIT_M_MAX'] = 64;
		
	}
	
	public static function getConstant($name){
		
		if(empty(static::$_Constants)){
			static::calculateValues();
		}
		
		return static::$_Constants[\strtoupper($name)];
		
	}

}
