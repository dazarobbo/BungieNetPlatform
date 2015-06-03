<?php

namespace Cola\Database\MySQL;

/**
 * MySQLStatementGenerator
 */
class MySQLStatementGenerator extends \Cola\Database\StatementGenerator {

	protected function getTableDefinitions(Table $table){
		
		$defs = [];
		
		//Columns
		foreach($table->getTypes() as $type){
			$defs[] = $this->defineColumn($type);
		}
		
		//Constraints
		$defs[] = $this->definePrimaryKey($table->getTypes()
				->GetPrimaryTypes());
		
		foreach($table->getTypes()->getForeignTypes() as $fType){
			$defs[] = $this->defineForeignKey($fType);
		}
		
		return $defs;
		
	}

	protected function defineTable(Table $table) {
				
		return \sprintf(
				'create table `%s` (%s);',
				$table->getName(),
				\implode(', ', $this->getTableDefinitions($table))
				);
		
	}
	
	protected function defineColumn(Type $type) {
		return \sprintf('`%s` %s', $type->getName(),
				$type->getDataType());
	}
	
	protected function definePrimaryKey(TypeCollection $coll){
		return \sprintf('primary key (%s)', \implode(',', \array_map(function($t){
			return \sprintf('`%s`', $t->getName());
		}, $coll->ToArray())));
	}
	
	protected function defineForeignKey(ForeignType $type){
		return \sprintf('foreign key (`%s`) references `%s` (`%s`)',
				$type->getName(),
				$type->getPrimaryType()->getOwningTable()->getName(),
				$type->getPrimaryType()->getName());
	}
	
	public function __toString() {
		return __CLASS__;
	}

	public function generateTableDefinition(Table $table) {
		return $this->defineTable($table);
	}

}
