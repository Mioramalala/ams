<?php
// $_session
	//serveur local
	// $connex='';
	// $bdd = new PDO('mysql:host='.$connex.';dbname=data_ams','root', '');
	//*****************************************************************************************
	//serveur test
	$connex='mysql51-57.pro';
	$bdd = new PDO('mysql:host='.$connex.';dbname=tmsconsumuzik','tmsconsumuzik', 'YvCaBUYVU67V');
	//*****************************************************************************************
	//serveur prod
	//$connex='mysql51-60.pro';
	//$bdd = new PDO('mysql:host='.$connex.';dbname=tmsconsuams','tmsconsuams', 'qm2cy8UnQtcm');
	
?>
