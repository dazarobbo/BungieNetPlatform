<?php

namespace Cola\Database\DataTypes;

/**
 * ITypeChooser
 */
interface ITypeChooser {
	
	/**
	 * Method should return a Database\DataTypes\DataType
	 */
	public function getType($object);
	
}
