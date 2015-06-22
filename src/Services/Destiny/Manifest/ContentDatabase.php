<?php

namespace BungieNetPlatform\Services\Destiny\Manifest;

use Cola\Database\Database;
use Cola\Database\ConnectionParameters;

/**
 * ContentDatabase
 */
class ContentDatabase extends Database {

	/**
	 * @var string database driver to provide PDO
	 */
	const TYPE = 'sqlite';
	
	/**
	 * @var string database charset
	 */
	const CHARSET = 'utf8';
	
	
	/**
	 * Filesystem path to the database
	 * @var string
	 */
	protected $_DbPath;
	
	
	/**
	 * 
	 * @param type $dbPath
	 * @param ConnectionParameters $override optional override default parameters
	 */
	public function __construct($dbPath, ConnectionParameters $override = null) {
		
		$this->_DbPath = $dbPath;
		
		$params = null;
		
		if($override === null){
			$params = new ConnectionParameters(static::TYPE, $dbPath);
			$params->setCharset(static::CHARSET);
			$params[\PDO::ATTR_PERSISTENT] = true;
			$params[\PDO::ATTR_ERRMODE] = \PDO::ERRMODE_EXCEPTION;
		}
		else{
			$params = $override;
		}
		
		parent::__construct($params);
		
	}
	
	/**
	 * Returns the location of the database
	 * @return string
	 */
	public function getPath(){
		return $this->_DbPath;
	}
	
	/**
	 * Queries the database for a list of the tables
	 * @return string[]
	 */
	public function getTableNames(){
		
		$stmt = $this->Connection->query(
			'select tbl_name from sqlite_master where type = \'table\';');

		$tables = \array_map(function($row){ return $row[0]; }, 
				$stmt->fetchAll(\PDO::FETCH_NUM));
		
		return $tables;
		
	}
	
	/**
	 * Quereies the database for a list of views 
	 * @return string[]
	 */
	public function getViewNames(){
		
		$stmt = $this->Connection->query(
			'select tbl_name from sqlite_master where type = \'view\';');

		$views = \array_map(function($row){ return $row[0]; }, 
				$stmt->fetchAll(\PDO::FETCH_NUM));
		
		return $views;
		
	}
	
	public function __toString() {
		return $this->getPath();
	}

}
