<?php

namespace BungieNetPlatform;

use Cola\Json;

/**
 * Response
 */
class PlatformResponse extends \Cola\Object implements \JsonSerializable {

	/**
	 * @var \stdClass
	 */
	protected $_Response;
	
	/**
	 * @var int
	 */
	protected $_ErrorCode;
	
	/**
	 * @var int
	 */
	protected $_ThrottleSeconds;
	
	/**
	 * @var int
	 */
	protected $_ErrorStatus;
	
	/**
	 * @var string
	 */
	protected $_Message;
	
	/**
	 * @var \stdClass
	 */
	protected $_MessageData;

	public function __construct(\stdClass $json = null) {
		
		if($json !== null){
			$this->_ErrorCode = $json->ErrorCode;
			$this->_ErrorStatus = $json->ErrorStatus;
			$this->_Message = $json->Message;
			$this->_MessageData = $json->MessageData;
			$this->_Response = $json->Response;
			$this->_ThrottleSeconds = $json->ThrottleSeconds;
		}
		
	}
	
	/**
	 * Object response from the application
	 * @return \stdClass
	 */
	public function &getResponse(){
		return $this->_Response;
	}
	
	/**
	 * Error code relating to an invalid request
	 * @see http://bungienetplatform.wikia.com/wiki/ErrorCodes
	 * @return int
	 */
	public function getErrorCode(){
		return $this->_ErrorCode;
	}
	
	/**
	 * Number of seconds to wait before performing another action
	 * @return int
	 */
	public function getThrottleSeconds(){
		return $this->_ThrottleSeconds;
	}
	
	/**
	 * Exception name relating to the invalid request
	 * @see http://bungienetplatform.wikia.com/wiki/ErrorCodes
	 * @todo Perhaps modify this to return an enum code
	 * @return string
	 */
	public function getErrorStatus(){
		return $this->_ErrorStatus;
	}
	
	/**
	 * @return string
	 */
	public function &getMessage(){
		return $this->_Message;
	}
	
	/**
	 * @return \stdClass
	 */
	public function &getMessageData(){
		return $this->_MessageData;
	}

	/**
	 * See jsonSerialize
	 * @return string
	 */
	public function __toString() {
		return Json::serialise($this); 
	}

	/**
	 * @return \static
	 */
	public function jsonSerialize() {
				
		$o = \get_object_vars($this);
		
		//Remove _ prefix
		foreach($o as $k => $v){
			if(\Cola\Functions\String::startsWith($k, '_')){
				unset($o[$k]);
				$o[\substr($k, 1)] = $v;
			}
		}
		
		return $o;
		
	}

}
