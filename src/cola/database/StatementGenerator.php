<?php

namespace Cola\Database;

/**
 * StatementGenerator
 */
abstract class StatementGenerator {

	abstract public function generateTableDefinition(Table $table);

}
