<?php

namespace BungieNetPlatform\Responses\Parsing;

use BungieNetPlatform\Services\Destiny\ActivityBundle;
use BungieNetPlatform\Services\Destiny\Manifest\Hash;
use BungieNetPlatform\Enums\HashType;
use Cola\Functions\Object;
use BungieNetPlatform\BungieNet;
use BungieNetPlatform\Services\Destiny\ClassDefinition;
use BungieNetPlatform\Enums\DestinyClass;

/**
 * Manifest
 */
abstract class Manifest {

	public static function parseActivityBundle(\stdClass $json){

		$av = new ActivityBundle();
		
		$av->Hash = new Hash($json->bundleHash, HashType::ACTIVITY_BUNDLE());
		$av->Name = Object::propertiesExist($json, 'activityName')
				? $json->activityName
				: null;
		$av->Description = Object::propertiesExist($json, 'activityDescription')
				? $json->activityDescription
				: null;
		$av->Icon = BungieNet::getBaseUri()->withPath($json->icon);
		$av->ReleaseIcon = BungieNet::getBaseUri()->withPath($json->releaseIcon);
		$av->ReleaseTime = $json->releaseTime !== 0
				? \DateTime::createFromFormat('U', $json->releaseTime) //assumption
				: null;
		$av->DestinationHash = new Hash($json->destinationHash, HashType::DESTINATION());
		$av->PlaceHash = new Hash($json->placeHash, HashType::PLACE());
		$av->ActivityTypeHash = new Hash($json->activityTypeHash, HashType::ACTIVITY_TYPE());
		
		foreach($json->activityHashes as $ah){
			$av->ActivityHashes->add(new Hash($ah, HashType::ACTIVITY()));
		}
		
		return $av;
		
	}
	
	public static function parseClassDefinition(\stdClass $json){
		
		$cd = new ClassDefinition();
		
		$cd->Hash = new Hash($json->classHash, HashType::CLASS_DEFINITION());
		$cd->Type = new DestinyClass($json->classType);
		$cd->Name = $json->className;
		$cd->NameMale = $json->classNameMale;
		$cd->NameFemale = $json->classNameFemale;
		$cd->Identifier = $json->classIdentifier;
		$cd->MentorVendorIdentifier = $json->mentorVendorIdentifier;
		
		return $cd;
		
	}

}
