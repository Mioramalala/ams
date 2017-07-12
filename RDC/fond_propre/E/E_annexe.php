<?php
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

	$UTIL_ID=$_SESSION['id'];
	$MISSION_ID=$_SESSION['idMission'];
	$annexe=$_POST["note"];
	$nature=$_POST["nature"];
	
	__writting_into(
	array(
		"NATURE"=>$nature,
		"ANNEXE"=>$annexe,
		"UTIL_ID"=>$UTIL_ID,
	),
	array(
		"MISSION_ID"=>$MISSION_ID
	),
	"tab_fp_annexe");
	
	_save_backup();
	var_dump($backup_sql);
