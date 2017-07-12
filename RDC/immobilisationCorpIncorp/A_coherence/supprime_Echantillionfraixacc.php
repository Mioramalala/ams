<?php
/**
 * Created by PhpStorm.
 * User: herenoch
 * Date: 31/08/2016
 * Time: 11:46
 */
/**
 * Created by PhpStorm.
 * User: herenoch
 * Date: 31/08/2016
 * Time: 11:10
 */
	session_start ();
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
	include "$project_path/connexion.php";
$mission_id=@$_SESSION['idMission'];
$id_echantillon_GL=$_GET["id_echantillon_GL"];



    $sqlUpdate="UPDATE tab_ehantillon_gl_fraixacc SET type_fraixacc ='' WHERE id_mission='$mission_id'  and  id_echantillon_GL ='$id_echantillon_GL'";
    $reqlupdate=$bdd->query($sqlUpdate);


?>