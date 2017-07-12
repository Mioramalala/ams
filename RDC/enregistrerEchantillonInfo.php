<?php

@session_start();
include '../connexion.php';
$mission_id = @$_SESSION['idMission'];
$UTIL_ID    = @$_SESSION['UTIL_ID'];

$id_echantillon_GL=array();
$id_echantillon_GL=$_POST['id_echantillon_GL'];
//var_dump($id_echantillon_GL);

function sauvegarderFichier($fichier, $mission, $cycle, $objectif, $compte, $reference, $bdd) {
	$ancienNom = "";

	if($fichier['error'] == 0) {
		$tmpName = $fichier['tmp_name'];
		
		if(is_uploaded_file($tmpName)) {
		
			$ancienNom    = $fichier['name'];

			$infosfichier = pathinfo($ancienNom);
			$extension    = $infosfichier['extension'];
			$dossier      = '../renvoi_echantillon/';
			
			$nouveauNom = "renvoi_".$mission."_".$cycle."_".$objectif."_".$compte."_".$reference.".".$extension;

			// supprimer l'ancien fichier s'il éxiste ------------------
			$sql_get_extension = "SELECT renvoi FROM tab_ehantillon_gl WHERE 
				GL_GEN_CYCLE = :cycle    AND 
				objectif     = :objectif AND 
				compt_ech_gl = :compte   AND 
				id_mission   = :mission";

			$reponse = $bdd->prepare($sql_get_extension);
			$reponse->execute(array(
				"cycle"    => $cycle,
				"objectif" => $objectif,
				"compte"   => $compte,
				"mission"  => $mission
			));
			if($donnee = $reponse->fetch()) {
				$renvoi     = $donnee["renvoi"];
				$renvoi_ext = pathinfo($renvoi)["extension"];
				$oldFile    = $dossier."renvoi_".$mission."_".$cycle."_".$objectif."_".$compte."_".$reference.".".$renvoi_ext;

				if(file_exists($oldFile))
					unlink($oldFile);
			//-----------------------------------------------------------
			}
			
			move_uploaded_file($tmpName, utf8_decode($dossier.$nouveauNom));
		}	
	}

	return $ancienNom;
}

if(isset($_POST["comptes"]) AND isset($_POST["references"]) AND isset($_POST["cycle"]) AND isset($_POST["objectif"])) {
	$comptes    = explode('/', $_POST["comptes"]);
	$references = explode('/', $_POST["references"]);
	$cycle      = $_POST["cycle"];
	$objectif   = $_POST["objectif"];

	foreach ($comptes as $key => $compte)
	{
		$reference   = $references[$key];
		$pointage    = "";
		$regularite  = "";
		$observation = "";
		$renvoiNom   = "";
		$bc          = "";
		$bl          = "";

		if(isset($_POST["pointage_".$compte."_".$reference]))    $pointage    = $_POST["pointage_".$compte."_".$reference];
		if(isset($_POST["regularite_".$compte."_".$reference]))  $regularite  = $_POST["regularite_".$compte."_".$reference];
		if(isset($_POST["observation_".$compte."_".$reference])) $observation = $_POST["observation_".$compte."_".$reference];
		if(isset($_POST["bc_".$compte."_".$reference]))          $bc          = $_POST["bc_".$compte."_".$reference];
		if(isset($_POST["bl_".$compte."_".$reference]))          $bl          = $_POST["bl_".$compte."_".$reference];
		if(isset($_FILES["renvoi_".$compte."_".$reference]))
		{

			$renvoiNom = sauvegarderFichier($_FILES["renvoi_".$compte."_".$reference], $mission_id, $cycle, $objectif, $compte, $reference, $bdd);
			if($renvoiNom != "") {
				$sql     = "UPDATE tab_ehantillon_gl SET renvoi = :renvoi, UTIL_ID = :util_id WHERE GL_GEN_CYCLE = :cycle AND objectif = :objectif AND compt_ech_gl = :compte AND ref_ech_gl = :reference AND id_mission = :mission";
				$reponse = $bdd->prepare($sql);
				$reponse->execute(array(
					'renvoi'      => $renvoiNom,
					'util_id'     => $UTIL_ID,
					'cycle'       => $cycle,
					'objectif'    => $objectif,
					'compte'      => $compte,
					'reference'   => $reference,
					'mission'     => $mission_id
				));
			}
		}


		if(Count($id_echantillon_GL)>0)
        {


        }else
        {

		$sql = "UPDATE tab_ehantillon_gl SET 
			pointage      = :pointage, 
			regularite_pj = :regularite, 
			observation   = :observation,
			bc            = :bc,
			bl            = :bl,
			UTIL_ID       = :util_id

			WHERE 

			GL_GEN_CYCLE = :cycle AND objectif = :objectif AND compt_ech_gl = :compte AND ref_ech_gl = :reference AND id_mission = :mission";

			$reponse = $bdd->prepare($sql);
			$reponse->execute(array(
				'pointage'    => $pointage,
				'regularite'  => $regularite,
				'observation' => $observation,
				'bc'          => $bc,
				'bl'          => $bl,
				'util_id'     => $UTIL_ID,
				'cycle'       => $cycle,
				'objectif'    => $objectif,
				'compte'      => $compte,
				'reference'   => $reference,
				'mission'     => $mission_id
			));



	}
}
else {
}