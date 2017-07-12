<?php

 @session_start();
 
		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../"; #using $project_path
	
	/*
	end #Jimmy
	*/
 
 
 /*
 if some day need the sql back-up to active, just use the following variable
 */
 $backup_sql="";
 
 /*
 Agent de alertant l'utilisateur qu'il à été deconnécté
 */
 
include "$project_path/agent_connex_detection.php";

	include "$project_path/connexion.php";
$mission_id = @$_SESSION['idMission'];
$UTIL_ID    = @$_SESSION['UTIL_ID'];

$pointage_=array();
$id_echantillon_GL=array();
$regularite_=array();
$observation_=array();

$comptes=array();
$references=array();
$cycle=array();
$objectif=array();



$id_echantillon_GL=@$_POST['id_echantillon_GL'];
$pointage_=@$_POST['pointage_'];
$regularite_=@$_POST['regularite_'];
$observation_=@$_POST['observation_'];



$comptes    = explode("/",$_POST["comptes"]);

$references = explode("/",$_POST["references"]);
$cycle      = $_POST["cycle"];
$objectif   = $_POST["objectif"];

//var_dump($id_echantillon_GL);


$i=0;
function sauvegarderFichier($fichier, $mission, $cycle, $objectif, $compte, $reference, $bdd) {
    $ancienNom = "";
	$nom_file="renvoi_".$compte."_".$reference;
	if(isset($_FILES[$nom_file])){
		$file=$_FILES[$nom_file];
		$ancienNom=$file["name"];
	}
	else{
		$fichier['error']=true;
	}
	$nouveauNom="";
    if($fichier['error'] == 0) {
        $tmpName = $file['tmp_name'];

        if(is_uploaded_file($tmpName)) {

            $ancienNom    = $file['name'];

            $infosfichier = pathinfo($ancienNom);
            $extension    = $infosfichier['extension'];
            $dossier      = '../renvoi_echantillon/';

            $nouveauNom = "renvoi_".$mission."_".$cycle."_".$objectif."_".$compte."_".$reference.".".$extension;
			
			/*
			#Jimmy
			Après mynthe reflexion, ce code est un detour qui ne marche pas et qui proque des erreur dans le code, suppression temporaire/definitive
			*/
			
			/*
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
			*/
			
			/*
			#Jimmy
			Cette solution est l'effet equivalente et fonctionne bien si l'on doit explicitement effacer un acien fichier s'il existe
			*/
			if(is_file($dossier.$nouveauNom)){
                unlink($dossier.$nouveauNom);
			}
            move_uploaded_file($tmpName, utf8_decode($dossier.$nouveauNom));
			chmod(utf8_decode($dossier.$nouveauNom),0777);
			
        }
    }

    return $nouveauNom;
}

foreach ($comptes as $key => $compte)
{
	$renvoiNom="";
	if(
		isset($_FILES["renvoi_".$comptes[$i]."_".$references[$i]]) &&
		$_FILES["renvoi_".$comptes[$i]."_".$references[$i]]["name"]
	)
	{
		$renvoiNom = sauvegarderFichier($_FILES["renvoi_".$comptes[$i]."_".$references[$i]], $mission_id, $cycle[$i], $objectif[$i], $comptes[$i], $references[$i], $bdd);
	}
	else{
		$sql_renvoi="SELECT renvoi from tab_ehantillon_gl WHERE
			GL_GEN_CYCLE = :cycle    AND 
			objectif     = :objectif AND 
			compt_ech_gl = :compte   AND 
			id_mission   = :mission";
		$reponse = $bdd->prepare($sql_renvoi);
		$reponse->execute(array(
			"cycle"    => $cycle[$i],
			"objectif" => $objectif[$i],
			"compte"   => $comptes[$i],
			"mission"  => $mission_id
		));
		if($donnee = $reponse->fetch()) {
			$renvoi = $donnee["renvoi"];
			$renvoiNom=$renvoi;
		}
	}

	$sql = "UPDATE tab_ehantillon_gl SET 
	pointage      = :pointage, 
	regularite_pj = :regularite, 
	observation   = :observation,
	renvoi   = :renvoi,
	
	UTIL_ID       = :util_id
	WHERE 
	id_echantillon_GL=:id_echant AND id_mission = :mission";

	$reponse = $bdd->prepare($sql);
	$backup_sql.=$sql;
	$reponse->execute(array(
		'pointage' => $pointage_[$i],
		'regularite' => $regularite_[$i],
		'observation' => $observation_[$i],
		'util_id'     => $UTIL_ID,
		'renvoi'     => $renvoiNom,


		'id_echant'=>$id_echantillon_GL[$i],
		'mission' => $mission_id
	));

	print($pointage_[$i]."<br>");
	$i++;

}

$file = "$project_path/fichier/save_mission/mission.sql";


$backup_sql.=$req1;
if($using_backup){
	file_put_contents($file, $backup_sql.";", FILE_APPEND | LOCK_EX);
}
