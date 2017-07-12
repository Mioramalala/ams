<?php 

	session_start ();
		/*
		Please don't move this file, it's using DOCUMENT_ROOT  on a request that save data in file before calling ajax on it to run sql #Jimmy
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../../../";
	
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
	
	
	/*
	#Jimmy using library _write_rep
	*/

	$RDC_CYCLE="Fond propre";
	$RDC_OBJECTIF="B";
	$RDC_RANG="1";
	$MISSION_ID=$_SESSION['idMission'];
	
	$RDC_ID=$_GET['idRdc'];
	
	_write_rep($_GET["rep1"],$_GET["cmt1"],$UTIL_ID,$RDC_OBJECTIF,$RDC_CYCLE,$RDC_RANG,$_SESSION['idMission']);



_save_backup();
	
	