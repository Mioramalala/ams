<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
$mission_id=$_SESSION['idMission'];
$obs=array();
$risque=array();
$recom=array();

	$obs=$_GET['obs_'];
	$risque=$_GET['risque_'];
	$recom=$_GET['recom_'];



include '../../connexion.php';

	$i=0;
	foreach ($obs as $value) 
	{

		$sql = 'INSERT INTO tab_synthese_feuille_rdc(SYNTHESE_OBS,SYNTHESE_RISQUE,SYNTHESE_RECOM,MISSION_ID,SYNTHESE_CYCLE,UTIL_ID) 
				VALUES ("'.$value.'","'.$risque[$i].'","'.$recom[$i].'","'.$mission_id.'","paie","'.$UTIL_ID.'")
				ON DUPLICATE KEY UPDATE
				SYNTHESE_OBS = "'.$value.'",
				SYNTHESE_RISQUE = "'.$risque[$i].'",
				SYNTHESE_RECOM = "'.$recom[$i].'"';
	//echo $sql;
	$bdd->query($sql);
	$i++;
		# code...
	}
	
?>