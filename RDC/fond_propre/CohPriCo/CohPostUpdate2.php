<?php
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

include "$project_path/connexion.php";

$UTIL_ID=$_SESSION['id'];

$rep=$_POST['rep1'];
$cmt=$_POST['cmt1'];

$rep2=$_POST['rep2'];
$cmt2=$_POST['cmt2'];


_write_rep($rep,$cmt,$UTIL_ID,'A','Fond propre',3,$_SESSION['idMission']);
_write_rep($rep2,$cmt2,$UTIL_ID,'A','Fond propre',4,$_SESSION['idMission']);

_save_backup();

