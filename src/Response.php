<?php

namespace BungieNetPlatform;

use Cola\Json;
use GuzzleHttp\Message;

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
	
	public static function parseResponse(Message\Response $response){
		
		$self = new static();
		$json = $response->json();
		
		$self->_ErrorCode = \intval($json['ErrorCode'], 10);
		$self->_ErrorStatus = $json['ErrorStatus'];
		$self->_Message = $json['Message'];
		$self->_MessageData = (object)$json['MessageData'];
		$self->_Response = (object)$json['Response'];
		$self->_ThrottleSeconds = \intval($json['ThrottleSeconds'], 10);
		
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
		return $this->jsonSerialize();
	}

	/**
	 * Returns this response as a JSON formatted string
	 * @return string
	 */
	public function jsonSerialize() {
		return Json::serialise($this);
	}

}
