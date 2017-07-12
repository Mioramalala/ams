<?php
/**
 * Created by PhpStorm.
 * User: herenoch
 * Date: 30/08/2016
 * Time: 17:19
 */
@session_start();

		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../../../"; #using $project_path
	
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
$mission_id=@$_SESSION['idMission'];
include "$project_path/connexion.php";


$idfrais_acc=$_GET["idfrais_acc"];
$cout=$_GET["cout"];

$sql="delete from tbl_detaillefraix_acc where id_frais_acc='$idfrais_acc' and type_fraixacc='$cout'";
$bdd->query($sql);


?>