<?php

	@session_start();

// $_session
	//serveur local
	 $connex='localhost';
	$var_connex='online';
	 //$bdd = new PDO('mysql:host='.$connex.';dbname=data_ams','root', '');
	//*****************************************************************************************
	//serveur test
	//$connex='mysql51-57.pro';
	//$bdd = new PDO('mysql:host='.$connex.';dbname=tmsconsumuzik','tmsconsumuzik', 'YvCaBUYVU67V');
	//*****************************************************************************************//
	//serveur prod
	//$connex='mysql51-60.pro';
	
	try {
	    $bdd = new PDO('mysql:host=localhost;dbname=tmsconsuams','root', '123456');
		$bdd->exec("set names utf8");
	}
	catch(PDOException $e)
	 {
	    echo "Connection failed: " . $e->getMessage();
	 }
	 
	
	if(!isset($_COOKIE['tpscon_noactif']) || $_COOKIE['tpscon_noactif']=="")
	{
		//DECONNEXTION AUTOMATIQUE
		//var_dump("no_actif");
		if(isset($_SESSION['id'])){
			
			   $UTIL_ID=@$_SESSION['id'];
				$admin=$bdd
					->query(
						"UPDATE
							tab_utilisateur
						SET
							STATUT_CONNEXION='0'
						WHERE
							UTIL_ID ='$UTIL_ID'
						"
					);
					
					
			unset($_SESSION["id"]);
			unset($_SESSION["user"]);
			unset($_SESSION['idMission']);
			
			
			session_unset();
			session_destroy();
			?><script>location.href="?redirected=true";</script><?php
			die();
		
		}
		if(!isset($_GET["redirected"]) && !count($_POST)){
			?><script>location.href="?redirected=true";</script><?php
			die();
		}
			/*		
		session_unset();
		session_destroy();
		*/
		/*
		@setcookie('tpscon_noactif', NULL, -1);
		unset($_SESSION["id"]);
		unset($_SESSION["user"]);
		*/
	}
	else
	{
		
		if(isset($_SESSION['id'])){
			$uid=str_replace("'","\\'",$_SESSION['id']);
		   $c_user=$bdd->query("
			SELECT
				count(*) as c_count
			FROM
				tab_utilisateur
			WHERE
				UTIL_ID='$uid'
				AND
			STATUT_CONNEXION=1
			");
			$ok=false;
			if($c=$c_user->fetch()){
				if($c["c_count"]){
					$ok=true;
				}
			}
			if(!$ok){
				?><script>location.href="?redirected=true";</script><?php
					session_unset();
					session_destroy();
				die();
			}
			
		}
		
		
		
		
		$temps =60*30;
		//$temps =10;
		@setcookie('tpscon_noactif', NULL, -1);
		@setcookie ("tpscon_noactif", $temps, time() + $temps);
	}
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
