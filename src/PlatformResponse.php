<?php

namespace BungieNetPlatform;

use Cola\Object;

/**
 * Response
 * 
 * Represents base response from the bungie.net platform
 * 
 * @since version 1.0.0
 * @version 1.0.0
 * @author dazarobbo <dazarobbo@live.com>
 */
class PlatformResponse extends Object {

	/**
	 * @var mixed
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
			$this->_Response = \Cola\Functions\Object::propertiesExist($json, 'Response')
					? $json->Response
					: null;
			$this->_ThrottleSeconds = $json->ThrottleSeconds;
		}
		
	}
	
	/**
	 * Object response from the application
	 * @return mixed
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
	public function getMessage(){
		return $this->_Message;
	}
	
	/**
	 * @return \stdClass
	 */
	public function &getMessageData(){
		return $this->_MessageData;
	}

	/**
	 * @return string
	 */
	public function __toString() {
		return $this->_Message;
	}
	
}
