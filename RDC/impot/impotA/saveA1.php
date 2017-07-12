<?php 
session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

	//Pour la revu analytique
	if(isset($_POST['compte']) && isset($_POST['cmt'])){
		$compte = $_POST['compte'];
		$cmt = $_POST['cmt'];
		
		$req=$bdd->exec('UPDATE tab_ra SET UTIL_ID = "'.$UTIL_ID.'",RA_COMMENTAIRE="'.$cmt.'" WHERE RA_COMPTE="'.$compte.'" AND MISSION_ID='.$_SESSION['idMission']);
		$rep1=$bdd->exec($req);
		
		$req1='UPDATE tab_ra SET UTIL_ID = "'.$UTIL_ID.'",RA_COMMENTAIRE="'.$cmt.'" WHERE RA_COMPTE="'.$compte.'" AND MISSION_ID='.$_SESSION['idMission'];
		
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
		
	}
	//Pour la synthese
	if(isset($_POST['synthese']) && isset($_POST['conclusion'])){
		$synthese = $_POST['synthese'];
		$conclusion = $_POST['conclusion'];
		//Pour la synthèse
		$req2=$bdd->query("SELECT * FROM tab_synthese_ra WHERE SYNTHESE_OBJECTIF = 'impot_taxe' AND MISSION_ID='".$_SESSION['idMission']."'");
		$rowCount = $req2->rowCount();
		
		if( $rowCount == 0){
			$reqSyn0=$bdd->exec("INSERT INTO  tab_synthese_ra ( SYNTHESE, SYNTHESE_OBJECTIF, MISSION_ID,UTIL_ID) VALUES ('".$synthese."',".$_SESSION['idMission'].",'impot_taxe',".$UTIL_ID.")");
			
			$reqSyn00="INSERT INTO  tab_synthese_ra ( SYNTHESE, SYNTHESE_OBJECTIF, MISSION_ID,UTIL_ID) VALUES ('".$synthese."',".$_SESSION['idMission'].",'impot_taxe',".$UTIL_ID.")";
		
			$file = '../../../fichier/save_mission/mission.sql';
			file_put_contents($file, $reqSyn00.";", FILE_APPEND | LOCK_EX);
		
		}
		else{
			$reqSyn1=$bdd->exec('UPDATE tab_synthese_ra SET UTIL_ID = "'.$UTIL_ID.'",SYNTHESE="'.$synthese.'" WHERE SYNTHESE_OBJECTIF = "impot_taxe" AND MISSION_ID='.$_SESSION['idMission']);
			
			$reqSyn11='UPDATE tab_synthese_ra SET UTIL_ID = "'.$UTIL_ID.'",SYNTHESE="'.$synthese.'" WHERE SYNTHESE_OBJECTIF = "impot_taxe" AND MISSION_ID='.$_SESSION['idMission'];
		
			$file = '../../../fichier/save_mission/mission.sql';
			file_put_contents($file, $reqSyn11.";", FILE_APPEND | LOCK_EX);
		}
		//Pour la conclusion
		$req3=$bdd->query("SELECT * FROM tab_conclusion_ra WHERE CONCLUSION_OBJECTIF = 'impot_taxe' AND MISSION_ID=".$_SESSION['idMission']);
		$rowCount = $req3->rowCount();
		
		if( $rowCount == 0 ){
			$reqSyn2=$bdd->exec("INSERT INTO  tab_conclusion_ra ( CONCLUSION, CONCLUSION_OBJECTIF, MISSION_ID,UTIL_ID) VALUES ('".$conclusion."',".$_SESSION['idMission'].",'impot_taxe',".$UTIL_ID.")");
			
			$reqSyn22="INSERT INTO  tab_conclusion_ra ( CONCLUSION, CONCLUSION_OBJECTIF, MISSION_ID,UTIL_ID) VALUES ('".$conclusion."',".$_SESSION['idMission'].",'impot_taxe',".$UTIL_ID.")";
		
			$file = '../../../fichier/save_mission/mission.sql';
			file_put_contents($file, $reqSyn22.";", FILE_APPEND | LOCK_EX);
		}
		else{
			$reqSyn3=$bdd->exec('UPDATE tab_conclusion_ra SET UTIL_ID = "'.$UTIL_ID.'",CONCLUSION="'.$conclusion.'" WHERE CONCLUSION_OBJECTIF = "impot_taxe" AND MISSION_ID='.$_SESSION['idMission']);
			
			$reqSyn33='UPDATE tab_conclusion_ra SET UTIL_ID = "'.$UTIL_ID.'",CONCLUSION="'.$conclusion.'" WHERE CONCLUSION_OBJECTIF = "impot_taxe" AND MISSION_ID='.$_SESSION['idMission'];
		
			$file = '../../../fichier/save_mission/mission.sql';
			file_put_contents($file, $reqSyn33.";", FILE_APPEND | LOCK_EX);
		}
	}

?>