<?php
require "../connexion.php";
	@session_start();
	$tacheEtend_=$_GET["tacheETEND"];
	$check=$_GET["check"];
	$mission_id=$_SESSION['idMission'];
	if($check=="checked")
	{
		$sql="insert into tab_repartionEtendue(id_mission,id_tache) values('$mission_id','$tacheEtend_')";
	}else if ($check=="unchecked")
	{
		$sql="delete  from tab_repartionEtendue where id_mission='$mission_id' and id_tache='$tacheEtend_'";	//insert into tab_repartionEtendue(id_mission,id_tache) values('','')";
	}

	//print "tonga eto".$sql;
	$req = $bdd->query($sql)or die(mysql_error());

	print "OK_enregTacheetendue";


?>