<?php

namespace BungieNetPlatform\Services\Destiny\Manifest;

use Cola\Functions\Number;
use Cola\Object;
use Cola\Json;
use BungieNetPlatform\Enums\HashTableType;
use BungieNetPlatform\Enums\HashType;
use BungieNetPlatform\Services\Destiny\ActivityBundle;
use BungieNetPlatform\Responses\Parsing\Manifest as ManifestParsing;

/**
 * BasicHashTranslator
 * 
 * Given a hash value this translator will return matching
 * objects from a database
 */
class BasicHashTranslator extends Object implements IHashTranslator {

	/**
	 * @var ContentDatabase
	 */
	protected $_Database;
	
	public function __construct(ContentDatabase &$database) {
		$this->_Database = $database;
	}
	
	/**
	 * Retrieves database content matching the hash value
	 * @param Hash $hash
	 * @return mixed
	 */
	public function getContent(Hash $hash){

		$stmt = $this->_Database->Connection->prepare(\sprintf(
				'select json from %s where %s = :query;',
				$hash->getType()->getTableName(),
				$hash->getType()->getTableType()->getColumnName()));
		
		switch($hash->getType()->getTableType()->getValue()){
			
			case HashTableType::ID:
				$stmt->bindValue(':query', static::normaliseId(\strval($hash)),
						\PDO::PARAM_INT);
				break;
			
			case HashTableType::KEY:
				$stmt->bindValue(':query', \strval($hash), \PDO::PARAM_STR);
				break;
			
			default:
				throw new \RuntimeException('Unknown hash type');
			
		}
		
		$stmt->execute();
		
		if($stmt->columnCount() === 0){
			return null;
		}
		
		$row = $stmt->fetch(\PDO::FETCH_NUM);		
		$json = Json::deserialise($row[0]);
		$content = static::parseJson($json, $hash->getType());
		
		return $content;
		
	}
		
	/**
	 * Converts an unsigned hash value to a signed 32 bit value.
	 * The result is an overflown int, which is expected.
	 * @param string|int $hashValue This should be a string, an int
	 * will not work on 32 bit arch
	 * @return string
	 */
	public static function normaliseId($hashValue){
		
		//2^31 - 1
		$max = Number::sub(Number::pow(2, 31), 1);
		
		//If larger than signed 32 bit int, subtract 32 bits
		if(Number::greaterThan($hashValue, $max)){
			return Number::sub($hashValue, Number::pow(2, 32));
		}
		
		return $hashValue;
		
	}
	
	/**
	 * Given content from the database, this function returns
	 * the corresponding type or the content if undetermined
	 * @param \stdClass|array $json
	 * @param HashType $type
	 * @return mixed
	 */
	protected static function parseJson($json, HashType $type){
		
		switch($type->getValue()){
			
			case HashType::ACTIVITY_BUNDLE:
				return ManifestParsing::parseActivityBundle($json);
			
			case HashType::CLASS_DEFINITION:
				return ManifestParsing::parseClassDefinition($json);
				
		}
		
		return $json;
		
	}

}
