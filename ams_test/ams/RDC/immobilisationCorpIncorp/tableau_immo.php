<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
$mission_id=$_SESSION['idMission'];
$obs=array();
$risque=array();
$recom=array();
$SYNTHESE_ID=array();

	$SYNTHESE_ID=$_GET['SYNTHESE_ID'];
	$obs=$_GET['obs_'];
	$risque=$_GET['risque_'];
	$recom=$_GET['recom_'];

//	var_dump($obs);
//	var_dump($risque);
	//var_dump($recom);

include '../../connexion.php';
	/*$obs=$_POST['obs'];
	$risque=$_POST['risque'];
	$recom=$_POST['recom'];
	$mission_id=$_POST[''];*/
	


	$i=0;
	foreach ($obs as $value) 
	{

		$value=addslashes($value);
		$risque[$i]=addslashes($risque[$i]);
		$recom[$i]=addslashes($recom[$i]);

		if($SYNTHESE_ID[$i]=="")
		{
			$sql = 'INSERT INTO tab_synthese_feuille_rdc(SYNTHESE_OBS,SYNTHESE_RISQUE,SYNTHESE_RECOM,MISSION_ID,SYNTHESE_CYCLE,UTIL_ID) 
					VALUES ("'.$value.'","'.$risque[$i].'","'.$recom[$i].'","'.$mission_id.'","immo","'.$UTIL_ID.'")';
		}else
		{
			$sql="update tab_synthese_feuille_rdc 
				  SET 
				  SYNTHESE_OBS='$value',
				  SYNTHESE_RISQUE='".$risque[$i]."',
				  SYNTHESE_RECOM='".$recom[$i]."',
				  UTIL_ID='".$UTIL_ID."'

				  where SYNTHESE_ID='".$SYNTHESE_ID[$i]."'";
		}


	//echo $sql;
	$bdd->query($sql);

	$file = '../fichier/save_mission/mission.sql';
	file_put_contents($file, $sql.";", FILE_APPEND | LOCK_EX);

	$i++;
		# code...
	}

	
?>