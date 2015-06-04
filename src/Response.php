<?php

namespace BungieNetPlatform;

use Cola\Json;

/**
 * Response
 */
class Response extends \Cola\Object implements \JsonSerializable {

	protected $_Response;
	protected $_ErrorCode;
	protected $_ThrottleSeconds;
	protected $_ErrorStatus;
	protected $_Message;
	protected $_MessageData;

	public function __construct() {
		
	}
	
	public static function parseResponse(\stdClass $json){
		
		$self = new static();
		
		$self->_ErrorCode = $json->ErrorCode;
		$self->_ErrorStatus = $json->ErrorStatus;
		$self->_Message = $json->Message;
		$self->_MessageData = $json->MessageData;
		$self->_Response = $json->Response;
		$self->_ThrottleSeconds = $json->ThrottleSeconds;
		
		return $self;
		
	}
	
	public function getResponse(){
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
	 * 
	 * @return string
	 */
	public function getMessage(){
		return $this->_Message;
	}
	
	/**
	 * 
	 * @return \stdClass
	 */
	public function getMessageData(){
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
	 * 
	 * @return \static
	 */
	public function jsonSerialize() {
		return (object)\get_object_vars($this);
	}

}
