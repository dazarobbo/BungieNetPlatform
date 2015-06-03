<?php

namespace Cola\Database;

/**
 * ConnectionParameters
 */
class ConnectionParameters extends \Cola\Object implements \ArrayAccess {

	protected $_Driver;
	protected $_Host;
	protected $_Charset;
	protected $_DatabaseName;
	protected $_Username;
	protected $_Password;
	protected $_Options = [];
	
	public function __construct($driver = null, $host = null, $username = null, $password = null) {
		$this->_Driver = $driver;
		$this->_Host = $host;
		$this->_Username = $username;
		$this->_Password = $password;
	}
	
	public function getDriver(){
		return $this->_Driver;
	}
	
	public function setDriver($driver){
		$this->_Driver = $driver;
	}
	
	public function getHost(){
		return $this->_Host;
	}
	
	public function setHost($host){
		$this->_Host = $host;
	}
	
	public function getCharset(){
		return $this->_Charset;
	}

	public function setCharset($charset){
		$this->_Charset = $charset;
	}
	
	public function getDatabaseName(){
		return $this->_DatabaseName;
	}
	
	public function setDatabaseName($dbName){
		$this->_DatabaseName = $dbName;
	}
	
	public function getUsername(){
		return $this->_Username;
	}
	
	public function setUsername($username){
		$this->_Username = $username;
	}
	
	public function getPassword(){
		return $this->_Password;
	}
	
	public function setPassword($password){
		$this->_Password = $password;
	}
	
	public function getOptions(){
		return $this->_Options;
	}

	public function addOption($option){
		$this->_Options[] = $option;
	}

	public function offsetExists($offset) {
		throw new \RuntimeException('Not implemented');
	}

	public function offsetGet($offset) {
		throw new \RuntimeException('Not implemented');
	}

	public function offsetSet($offset, $value) {
		$this->_Options[$offset] = $value;
	}

	public function offsetUnset($offset) {
		unset($this->_Options[$offset]);
	}
	
	public function __toString() {
		return __CLASS__;
	}

}