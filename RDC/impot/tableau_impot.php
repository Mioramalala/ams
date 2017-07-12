<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
include '../../connexion.php';
	$obs=$_POST['obs'];
	$risque=$_POST['risque'];
	$recom=$_POST['recom'];
	$mission_id=$_POST['mission_id'];
	
	$sql = 'INSERT INTO tab_synthese_feuille_rdc(SYNTHESE_OBS,SYNTHESE_RISQUE,SYNTHESE_RECOM,MISSION_ID,SYNTHESE_CYCLE,UTIL_ID) 
				VALUES ("'.$obs.'","'.$risque.'","'.$recom.'","'.$mission_id.'","impot","'.$UTIL_ID.'")
				ON DUPLICATE KEY UPDATE
				SYNTHESE_OBS = "'.$obs.'",
				SYNTHESE_RISQUE = "'.$risque.'",
				SYNTHESE_RECOM = "'.$recom.'"';

	echo $sql;
	$bdd->exec($sql);
?>