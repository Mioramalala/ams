<?php
date_default_timezone_set('UTC');

	@session_start();
	if(@$_COOKIE['tpscon_noactif']=="")
	{
		//DECONNEXTION AUTOMATIQUE
		session_unset();
		session_destroy();
	}else
	{
		$temps =60*15;
		@setcookie('tpscon_noactif', NULL, -1);
		@setcookie ("tpscon_noactif", $temps, time() + $temps);
	}
// $_session
	//serveur local
	 $connex='localhost';
	$var_connex='online';
	 //$bdd = new PDO('mysql:host='.$connex.';dbname=data_ams','root', '');
	//*****************************************************************************************
	//serveur test
	//$connex='mysql51-57.pro';
	//$bdd = new PDO('mysql:host='.$connex.';dbname=tmsconsumuzik','tmsconsumuzik', 'YvCaBUYVU67V');
	//*****************************************************************************************
	//serveur prod
	//$connex='mysql51-60.pro';
	
	try {
	    $bdd = new PDO('mysql:host='.$connex.';dbname=tmsconsuams','root', 'root');
		$bdd->exec("set names utf8");
	}
	catch(PDOException $e)
	 {
	    echo "Connection failed: " . $e->getMessage();
	 }
	@session_start();
	if(@$_SESSION['id']!="")
	   {
		      	
			   $UTIL_ID=@$_SESSION['id'];
			   $admin=$bdd->query("select STATUT_CONNEXION from tab_utilisateur where UTIL_ID='$UTIL_ID'");
			   $res_=$admin->fetch();
				$UTIL_ACTIF=$res_['STATUT_CONNEXION'];
			   if($UTIL_ACTIF==1)
			   {
				   $dateMaintenant=date("Y-m-d H:i:s");
				   $admin=$bdd->query("UPDATE tab_utilisateur SET date_connect='$dateMaintenant'  WHERE UTIL_ID ='$UTIL_ID'");
			   }
	  }
	
?>
