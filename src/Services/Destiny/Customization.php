<?php

namespace BungieNetPlatform\Services\Destiny;

/**
 * Customization
 */
class Customization extends \Cola\Object {

	/**
	 * @var Manifest\Hash
	 */
	public $Personality;
	
	/**
	 * @var Manifest\Hash
	 */
	public $Face;
	
	/**
	 * @var Manifest\Hash
	 */
	public $SkinColor;
	
	/**
	 * @var Manifest\Hash
	 */
	public $LipColor;
	
	/**
	 * @var Manifest\Hash
	 */
	public $EyeColor;
	
	/**
	 * @var Manifest\Hash
	 */
	public $HairColor;
	
	/**
	 * @var Manifest\Hash
	 */
	public $FeatureColor;
	
	/**
	 * @var Manifest\Hash
	 */
	public $DecalColor;
	
	/**
	 * @var bool
	 */
	public $WearHelmet;
	
	/**
	 * @var int
	 */
	public $HairIndex;
	
	/**
	 * @var int
	 */
	public $FeatureIndx;
	
	/**
	 * @var int
	 */
	public $DecalIndex;
	
	public function __construct() {
		
	}

}
