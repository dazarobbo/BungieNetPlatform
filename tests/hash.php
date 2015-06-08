<?php

	require_once __DIR__ . '/../vendor/autoload.php';
	
	use BungieNetPlatform\Services\Destiny\Manifest\Hash;
	
	//Overflow
	$h1 = new Hash('2301436075');
	assert($h1->__toString() === '2301436075');
	assert($h1->willOverflowAsInt() === true);
	assert($h1->toInt() === 2147483647);
	
	//Raw int
	$h2 = new Hash(1);
	assert($h2->__toString() === '1');
	assert($h2->willOverflowAsInt() === false);
	assert($h2->toInt() === 1);
	
	//int max
	$h3 = new Hash('2147483647');
	assert($h3->__toString() === '2147483647');
	assert($h3->willOverflowAsInt() === false);
	assert($h3->toInt() === 2147483647);