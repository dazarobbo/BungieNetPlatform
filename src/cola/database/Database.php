<?php

namespace Cola\Database;

/**
 * Database
 */
class Database extends \Cola\Object {

	/**
	 * The connection to the database
	 * @access public
	 * @var PDO
	 */
	public $Connection = null;
	
	/**
	 * Determines if the database is connected
	 * @access public
	 * @return bool True if connected, otherwise false
	 */
	public function connected(){
		return $this->Connection instanceof \PDO;
	}

	/**
	 * Attempt to connect to the database. Does nothing if already connected.
	 * @access public
	 * @return static
	 */
	public static function connect(ConnectionParameters $config){

		$con = new static();
		
		switch(\strtolower(\trim($config->getDriver()))){
			
			case 'sqlite':
				$con->Connection = new \PDO(
						\sprintf('sqlite:%s', $config->getHost()),
						$config->getUsername(),
						$config->getPassword(),
						$config->getOptions());
				break;
			
			default:
				$con->Connection = new \PDO(\sprintf(
						'%s:host=%s;charset=%s;dbname=%s',
						$config->getDriver() ? $config->getDriver() : '',
						$config->getHost() ? $config->getHost() : '',
						$config->getCharset() ? $config->getCharset() : '',
						$config->getDatabaseName() ? $config->getDatabaseName() : ''
					),
					$config->getUsername(),
					$config->getPassword(),
					$config->getOptions());
				break;
			
		}
		
		return $con;

	}

	/**
	 * Disconnects the database connection
	 * @access public
	 * @return void
	 */
	public function disconnect(){
		$this->Connection = null;
	}

	protected function __construct(ConnectionParameters $params){
		$this->Connection = static::connect($params)->Connection;
	}
	
	public function __destruct() {
		$this->disconnect();
	}

}