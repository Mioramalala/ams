<?php
		@session_start();
		include '../../connexion.php';
		$mission_id=$_SESSION['idMission'];
		//$id_entreprise =$_SESSION["id_Entre"];
		//$nomEntreprise=$_SESSION["dernie_denom"][1];
		//$objetif_renvoie="planif_gen";
		
		$rep=$bdd->query("SELECT RENVOIE_LIEN FROM tab_renvoie where RENVOIE_OBJECTIF='planif_gen' and  MISSION_ID=".$mission_id);
		$data=$rep->fetch();
		$lien_doc=$data['RENVOIE_LIEN']; 
		$test=$_SERVER['DOCUMENT_ROOT'].$lien_doc;
		if(file_exists($test)){
			print ($lien_doc);
		}
?>