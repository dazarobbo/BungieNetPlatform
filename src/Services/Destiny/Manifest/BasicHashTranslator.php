<?php

namespace BungieNetPlatform\Services\Destiny\Manifest;

use Cola\Functions\PHPArray;
use Cola\Functions\Number;
use Cola\Object;
use Cola\Json;
use BungieNetPlatform\Enums\HashTableType;

/**
 * BasicHashTranslator
 * 
 * Given a hash value this translator will return matching
 * objects from a database
 */
class BasicHashTranslator extends Object implements IHashTranslator {

	/**
	 * @var string name of a view of all tables with hash values
	 * @deprecated
	 */
	const VIEW_NAME = 'hash_view';
	
	/**
	 * @var string name of the generated table containing hash values
	 */
	const TABLE_NAME = 'hash_table';
	
	/**
	 * @var ContentDatabase
	 */
	protected $_Database;
	
	public function __construct(ContentDatabase &$database) {
		$this->_Database = $database;
		//$this->initialise();
	}
	
	/**
	 * Creates a view of existing tables given an array
	 * of table names
	 * @param array $tables
	 * @deprecated
	 */
	protected function createHashView(array $tables){
		
		$sql = \sprintf('create view %s as ', static::VIEW_NAME);
		
		foreach($tables as $key => $tbl){
			$sql .= \sprintf('select id, json from %s', $tbl);
			if(!PHPArray::last($tables, $key)){
				$sql .= ' union ';
			}
		}
		
		$this->_Database->Connection->exec($sql);
		
	}
	
	/**
	 * Creates one table containing all id and json pairs.
	 * The id column properly holds unsigned values, and an
	 * index is generated for it.
	 * @param array $tables
	 */
	protected function createMassTable(array $tables){
		
		$this->_Database->Connection->exec(\sprintf(
				'create table %s (id int not null, json blob default(null));',
				static::TABLE_NAME));
		
		$sql = '';
		
		foreach($tables as $tbl){
			
			$sql = \sprintf(
					'insert into %s select case ' .
					'when id < 0 then id + 4294967296 ' .
					'else id ' . 
					'end as id, json ' .
					'from %s;',
					static::TABLE_NAME,
					$tbl);
			
			$this->_Database->Connection->exec($sql);
			
		}
		
		$this->_Database->Connection->exec(\sprintf(
				'create index %s_index on %s(id);',
				static::TABLE_NAME,
				static::TABLE_NAME));
		
	}
	
	/**
	 * Retrieves database content matching the hash value
	 * @param Hash $hash
	 * @return \stdClass
	 */
	public function getContent(Hash $hash){

		$stmt = $this->_Database->Connection->prepare(\sprintf(
				'select json from %s where %s = :query;',
				$hash->getType()->getTableName(),
				$hash->getType()->getTableType()->getColumnName()));
		
		switch($hash->getType()->getTableType()->getValue()){
			
			case HashTableType::ID:
				$stmt->bindValue(':query', $this->normaliseId(\strval($hash)),
						\PDO::PARAM_INT);
				break;
			
			case HashTableType::KEY:
				$stmt->bindValue(':query', \strval($hash), \PDO::PARAM_STR);
				break;
			
		}
		
		$stmt->execute();
		
		if($stmt->columnCount() === 0){
			return null;
		}
		
		$obj = $stmt->fetch(\PDO::FETCH_NUM);		
		$obj = Json::deserialise($obj[0]);
		
		return $obj;
		
	}
	
	/**
	 * Gets an array of table names who use an 'id' column
	 * @return string[]
	 */
	protected function getHashTables(){
		
		$hashTables = [];
		$allTables = $this->_Database->getTableNames();
		
		foreach($allTables as $tbl){
			
			//Cannot use prepared statement here; syntax error
			$stmt = $this->_Database->Connection->query(\sprintf(
					'pragma table_info(%s);', $tbl));
			
			$r = $stmt->fetchAll();
			
			if(PHPArray::some($r, function($row){ return $row['name'] === 'id'; })){
				$hashTables[] = $tbl;
			}
			
		}
		
		return $hashTables;
		
	}
	
	/**
	 * Checks if the mass table already exists and if not, creates it
	 */
	protected function initialise(){
		if(!\in_array(static::TABLE_NAME, $this->_Database->getTableNames())){
			$tables = $this->getHashTables();
			$this->createMassTable($tables);
		}
	}
	
	/**
	 * Converts an unsigned hash value to a signed 32 bit value.
	 * The result is an overflown int, which is expected.
	 * @param string|int $hashValue This should be a string, an int
	 * will not work on 32 bit arch
	 * @return string
	 */
	public function normaliseId($hashValue){
		
		//2^31 - 1
		$max = Number::sub(Number::pow(2, 31), 1);
		
		//If larger than signed 32 bit int, subtract 32 bits
		if(Number::greaterThan($hashValue, $max)){
			return Number::sub($hashValue, Number::pow(2, 32));
		}
		
		return $hashValue;
		
	}

}
