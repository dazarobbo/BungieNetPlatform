<?php

	require_once __DIR__ . '/../vendor/autoload.php';
	
	$platform = new \BungieNetPlatform\Platform('key');
	
	$platform->Services->Destiny->getPublicXurVendor();
	