<?php

namespace Cola\Database\DataTypes;

/**
 * DataType
 * The data type (ie. varchar, int, etc...) of a column
 */
abstract class DataType extends \Cola\Object {

	abstract public function __toString();
	
}
