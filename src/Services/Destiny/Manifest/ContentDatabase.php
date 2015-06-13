<?php

namespace BungieNetPlatform\Services\Destiny\Manifest;

use Cola\Database\ConnectionParameters;
use Cola\Database\Database;
use PDO;

/**
 * ContentDatabase
 */
class ContentDatabase extends Database {

	const TYPE = 'sqlite';
	const CHARSET = 'utf8';
	
	protected $_DbPath;
	
	public function __construct($dbPath) {
		$this->_DbPath = $dbPath;
		$params = new ConnectionParameters(static::TYPE, $dbPath);
		$params->setCharset(static::CHARSET);
		parent::__construct($params);
	}
	
	public function getPath(){
		return $this->_DbPath;
	}
	
	public function getTableNames(){
		
		$stmt = $this->Connection->query(
			'select tbl_name from sqlite_master where type = \'table\';');

		$tables = \array_map(function($row){ return $row[0]; }, 
				$stmt->fetchAll(PDO::FETCH_NUM));
		
		return $tables;
		
	}

	public function __toString() {
		return $this->getPath();
	}

}
