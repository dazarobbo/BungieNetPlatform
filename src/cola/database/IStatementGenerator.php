<?php

namespace Cola\Database;

/**
 * IStatementGenerator
 */
interface IStatementGenerator {
	
	public function onDatabaseDefined($name);
	public function onCreateTable($name);
	public function onTableNameDefined($name);
	public function onPrimaryKeyDefined(TypeCollection $coll);
	public function onTypeDefined(Type $type);
	public function onConstraintDefined();
	public function onForeignKeyDefined();
	public function onCommentDefined($comment);
	
	public function __toString();
	
}
