<?php

namespace BungieNetPlatform\Services\Destiny;

use GuzzleHttp\Psr7\Uri;

/**
 * Character
 */
class Character extends \Cola\Object {

	/**
	 * @var CharacterBase
	 */
	public $Base;
	
	/**
	 * @var LevelProgression
	 */
	public $LevelProgression;
	
	/**
	 * @var Uri
	 */
	public $EmblemPath;
	
	/**
	 * @var Uri
	 */
	public $BackgroundPath;
	
	/**
	 * @var Manifest\Hash
	 */
	public $EmblemHash;
	
	/**
	 * @var int
	 */
	public $CharacterLevel;
	
	/**
	 * @var int
	 */
	public $BaseCharacterLevel;
	
	/**
	 * @var bool
	 */
	public $IsPrestigeLevel;
	
	/**
	 * @var int
	 */
	public $PercentToNextLevel;
	
	public function __construct() {
		
	}
	
	public function __toString() {
		return $this->Base->ClassType->toWord();
	}

}
