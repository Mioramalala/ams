<?php 
	session_start();
	include '../../../connexion.php';
	$UTIL_ID=$_SESSION['id'];

	//Pour la revu analytique
	if(isset($_POST['compte']) && isset($_POST['cmt'])){
		$compte = $_POST['compte'];
		$cmt = $_POST['cmt'];

		$req=$bdd->query("SELECT * FROM tab_ra WHERE RA_COMPTE = '".$compte."' AND MISSION_ID='".$_SESSION['idMission']."'");
		$rowCount = $req->rowCount();

		if( $rowCount == 0 ){
			$req0=$bdd->query("SELECT *,SUM(RA_SD_N) AS SD_N,SUM(RA_SC_N) AS SC_N,SUM(RA_SD_N1) AS SD_N1,SUM(RA_SC_N1) AS SC_N1,SUM(RA_D) AS DEBIT,SUM(RA_C) AS CREDIT,SUM(RA_SD_VARIATION) AS VARIATION_SD,SUM(RA_SC_VARIATION) AS VARIATION_SC,SUM(RA_POURCENTAGE_D) AS POURCENTAGE_D,SUM(RA_POURCENTAGE_C) AS POURCENTAGE_C  FROM tab_ra WHERE RA_COMPTE = '".$compte."' AND MISSION_ID='0'");
			$donnees = $req0 ->fetch(); 

			$reqI=$bdd->exec("INSERT INTO  tab_ra ( RA_COMPTE, RA_LIBELLE, RA_D, RA_C, RA_SD_N, RA_SC_N, RA_SD_N1, RA_SC_N1, RA_SD_VARIATION, RA_SC_VARIATION, RA_POURCENTAGE_D, RA_POURCENTAGE_C, RA_COMMENTAIRE, MISSION_ID, RA_CYCLE,UTIL_ID) VALUES ('".$compte."','".$donnees['RA_LIBELLE']."','".$donnees['DEBIT']."','".$donnees['CREDIT']."','".$donnees['SD_N']."','".$donnees['SC_N']."','".$donnees['SD_N1']."','".$donnees['SC_N1']."','".$donnees['VARIATION_SD']."','".$donnees['VARIATION_SC']."','".$donnees['POURCENTAGE_D']."','".$donnees['POURCENTAGE_C']."','".$cmt."',".$_SESSION['idMission'].",'paie',".$UTIL_ID.")");
			
			$reqI1="INSERT INTO  tab_ra ( RA_COMPTE, RA_LIBELLE, RA_D, RA_C, RA_SD_N, RA_SC_N, RA_SD_N1, RA_SC_N1, RA_SD_VARIATION, RA_SC_VARIATION, RA_POURCENTAGE_D, RA_POURCENTAGE_C, RA_COMMENTAIRE, MISSION_ID, RA_CYCLE,UTIL_ID) VALUES ('".$compte."','".$donnees['RA_LIBELLE']."','".$donnees['DEBIT']."','".$donnees['CREDIT']."','".$donnees['SD_N']."','".$donnees['SC_N']."','".$donnees['SD_N1']."','".$donnees['SC_N1']."','".$donnees['VARIATION_SD']."','".$donnees['VARIATION_SC']."','".$donnees['POURCENTAGE_D']."','".$donnees['POURCENTAGE_C']."','".$cmt."',".$_SESSION['idMission'].",'paie',".$UTIL_ID.")";
		
			$file = '../../../fichier/save_mission/mission.sql';
			file_put_contents($file, $reqI1.";", FILE_APPEND | LOCK_EX);
				
			
		}
		else{
			$reqU=$bdd->exec('UPDATE tab_ra SET UTIL_ID = "'.$UTIL_ID.'",RA_COMMENTAIRE="'.$cmt.'" WHERE RA_COMPTE="'.$compte.'" AND MISSION_ID='.$_SESSION['idMission']);
			
			$reqU1='UPDATE tab_ra SET UTIL_ID = "'.$UTIL_ID.'",RA_COMMENTAIRE="'.$cmt.'" WHERE RA_COMPTE="'.$compte.'" AND MISSION_ID='.$_SESSION['idMission'];
		
			$file = '../../../fichier/save_mission/mission.sql';
			file_put_contents($file, $reqU1.";", FILE_APPEND | LOCK_EX);
		}
	}
	//Pour la synthese
	if(isset($_POST['synthese']) && isset($_POST['conclusion'])){
		$synthese = $_POST['synthese'];
		$conclusion = $_POST['conclusion'];
		//Pour la synthèse
		$req=$bdd->query("SELECT * FROM tab_synthese_ra WHERE SYNTHESE_OBJECTIF = 'paie' AND MISSION_ID='".$_SESSION['idMission']."'");
		$rowCount = $req->rowCount();
		
		if( $rowCount == 0 ){
			$reqSyn0=$bdd->exec("INSERT INTO tab_synthese_ra ( SYNTHESE, SYNTHESE_OBJECTIF, MISSION_ID,UTIL_ID) VALUES ('".$synthese."',".$_SESSION['idMission'].",'paie',".$UTIL_ID.")");
			
			$reqSyn00="INSERT INTO tab_synthese_ra ( SYNTHESE, SYNTHESE_OBJECTIF, MISSION_ID,UTIL_ID) VALUES ('".$synthese."',".$_SESSION['idMission'].",'paie',".$UTIL_ID.")";
		
			$file = '../../../fichier/save_mission/mission.sql';
			file_put_contents($file, $reqSyn00.";", FILE_APPEND | LOCK_EX);
		}
		else{
			$reqSyn1=$bdd->exec('UPDATE tab_synthese_ra SET UTIL_ID = "'.$UTIL_ID.'",SYNTHESE="'.$synthese.'" WHERE SYNTHESE_OBJECTIF = "paie" AND MISSION_ID='.$_SESSION['idMission']);
			
			$reqSyn11='UPDATE tab_synthese_ra SET UTIL_ID = "'.$UTIL_ID.'",SYNTHESE="'.$synthese.'" WHERE SYNTHESE_OBJECTIF = "paie" AND MISSION_ID='.$_SESSION['idMission'];
		
			$file = '../../../fichier/save_mission/mission.sql';
			file_put_contents($file, $reqSyn11.";", FILE_APPEND | LOCK_EX);
		}
		//Pour la conclusion
		$req=$bdd->query("SELECT * FROM tab_conclusion_ra WHERE CONCLUSION_OBJECTIF = 'paie' AND MISSION_ID='".$_SESSION['idMission']."'");
		$rowCount = $req->rowCount();
		
		if( $rowCount == 0 ){
			$reqSyn2=$bdd->exec("INSERT INTO  tab_conclusion_ra ( CONCLUSION, CONCLUSION_OBJECTIF, MISSION_ID,UTIL_ID) VALUES ('".$conclusion."',".$_SESSION['idMission'].",'paie',".$UTIL_ID.")");
			
			$reqSyn22="INSERT INTO  tab_conclusion_ra ( CONCLUSION, CONCLUSION_OBJECTIF, MISSION_ID,UTIL_ID) VALUES ('".$conclusion."',".$_SESSION['idMission'].",'paie',".$UTIL_ID.")";
		
			$file = '../../../fichier/save_mission/mission.sql';
			file_put_contents($file, $reqSyn22.";", FILE_APPEND | LOCK_EX);
		}
		else{
			$reqSyn3=$bdd->exec('UPDATE tab_conclusion_ra SET UTIL_ID = "'.$UTIL_ID.'",CONCLUSION="'.$conclusion.'" WHERE CONCLUSION_OBJECTIF = "paie" AND MISSION_ID='.$_SESSION['idMission']);
			
			$reqSyn33='UPDATE tab_conclusion_ra SET UTIL_ID = "'.$UTIL_ID.'",CONCLUSION="'.$conclusion.'" WHERE CONCLUSION_OBJECTIF = "paie" AND MISSION_ID='.$_SESSION['idMission'];
		
			$file = '../../../fichier/save_mission/mission.sql';
			file_put_contents($file, $reqSyn33.";", FILE_APPEND | LOCK_EX);
		}
	}

?>