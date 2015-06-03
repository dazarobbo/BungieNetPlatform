<?php

namespace Cola;

/**
 * Json
 */
abstract class Json {

	/**
	 * Holds the last error resulted from calling a json_* function
	 * @var int
	 */
	protected static $_LastError = \JSON_ERROR_NONE;

	/**
	 * Serialises an object to a JSON formatted string
	 * @param mixed $o
	 * @return string
	 */
	public static function serialise($o){
		$s = \json_encode($o);
		self::$_LastError = \json_last_error();
		return $s;
	}

	/**
	 * Deserialises a JSON formatted string to a PHP object/variable
	 * @param string $str
	 * @return mixed
	 */
	public static function deserialise($str){
		$o = \json_decode($str);
		self::$_LastError = \json_last_error();
		return $o;
	}

	/**
	 * Returns the last error (if any) from calling Serialise or Deserialise
	 * @see http://php.net/manual/en/function.json-last-error.php
	 * @return int One of the JSON_ constants
	 */
	public static function lastError(){
		return self::$_LastError;
	}

}