<?php
//$mission_id=@$_GET['mission_id'];
@session_start();

include '../../connexion.php';
$mission_id    = $_SESSION['idMission'];

if(isset($_FILES['file_Planif_gen']) && $_FILES['file_Planif_gen']['error'] == 0) {
	if(is_uploaded_file($_FILES['file_Planif_gen']['tmp_name'])) { 
		// ---- Renomer le fichier en $NewName -----
		$infosfichier = pathinfo($_FILES['file_Planif_gen']['name']);
		$extension    = $infosfichier['extension'];
		$NewName      = "RA_plan_gen.".$extension;

		// ------- Chemin  a enregistrer dans la BDD -----
		$dossier = "/repertoire_document/doc_planification/Mission_".$mission_id."_".$NewName;
		// -----  REpertoire contenant le fichier renomer --->
		$renomer = $_SERVER['DOCUMENT_ROOT'].$dossier;
		
		echo $dossier;

		if(file_exists($renomer)) { // si le fichier existe deja on le remplace par le nouveau
			//unlink($dossier);
			$result = move_uploaded_file($_FILES['file_Planif_gen']['tmp_name'],utf8_decode($renomer));
			if ($result != 1) { 
				die("Error uploading file.  Please try again");
			}
			
			$verif         = $bdd->query("SELECT COUNT(*) as nb FROM tab_renvoie WHERE MISSION_ID='$mission_id' AND RENVOIE_OBJECTIF='planif_gen'");
			$nombre_enregi = $verif->fetch();
			$nb            = $nombre_enregi['nb'];
			//$fichier=$verif['RENVOIE_LIEN'];
			//echo("enreg".$nb);
			if($nb == 1){
				$insert = $bdd->query("UPDATE tab_renvoie SET RENVOIE_LIEN='$dossier' WHERE MISSION_ID=".$mission_id." AND RENVOIE_OBJECTIF='planif_gen'");
			}else{
				$insert = $bdd->query("INSERT INTO tab_renvoie (RENVOIE_LIEN,MISSION_ID,RENVOIE_OBJECTIF) VALUES ('$dossier','$mission_id','planif_gen')");
			}
			
	   }else{
		
			$result = move_uploaded_file($_FILES['file_Planif_gen']['tmp_name'],utf8_decode($renomer));
			//rename($loader,$renomer);
			if ($result != 1) { 
				die("Error uploading file.  Please try again");
			}
			$verif         = $bdd->query("SELECT COUNT(*) as nb FROM tab_renvoie WHERE MISSION_ID='$mission_id' AND RENVOIE_OBJECTIF='planif_gen'");
			$nombre_enregi = $verif->fetch();
			$nb            = $nombre_enregi['nb'];
			//echo("enreg".$nb);
			if($nb == 1) {
				$insert = $bdd->query("UPDATE tab_renvoie SET RENVOIE_LIEN='$dossier' WHERE MISSION_ID=".$mission_id." AND RENVOIE_OBJECTIF='planif_gen'");
			} else {
				$insert = $bdd->query("INSERT INTO tab_renvoie (RENVOIE_LIEN,MISSION_ID,RENVOIE_OBJECTIF) VALUES ('$dossier','$mission_id','planif_gen')");
			}
	   }
	}
}
?>