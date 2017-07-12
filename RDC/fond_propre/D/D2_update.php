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


_writting_rep(
	array(
		'UTIL_ID' => $UTIL_ID,
		'RDC_COMMENTAIRE'=> $_POST['cmt1'],
		'RDC_REPONSE' => $_POST['rep1'],
		'RDC_COMMENTAIRE_SUI_PROC' => $_POST['trav_D2'],
	),
	array(
		'RDC_OBJECTIF'=>'D',
		'RDC_CYCLE'=>'Fond propre',
		'RDC_RANG'=>2,
		'MISSION_ID'=>$_SESSION['idMission'],
	)
);
_writting_rep(
	array(
		'UTIL_ID' => $UTIL_ID,
		'RDC_COMMENTAIRE'=> $_POST['cmt2'],
		'RDC_REPONSE' => $_POST['rep2'],
		'RDC_COMMENTAIRE_SUI_PROC' => $_POST['trav_D2'],
	),
	array(
		'RDC_OBJECTIF'=>'D',
		'RDC_CYCLE'=>'Fond propre',
		'RDC_RANG'=>3,
		'MISSION_ID'=>$_SESSION['idMission'],
	)
);
_writting_rep(
	array(
		'UTIL_ID' => $UTIL_ID,
		'RDC_COMMENTAIRE'=> $_POST['cmt3'],
		'RDC_REPONSE' => $_POST['rep3'],
		'RDC_COMMENTAIRE_SUI_PROC' => $_POST['trav_D2'],
	),
	array(
		'RDC_OBJECTIF'=>'D',
		'RDC_CYCLE'=>'Fond propre',
		'RDC_RANG'=>4,
		'MISSION_ID'=>$_SESSION['idMission'],
	)
);
_writting_rep(
	array(
		'UTIL_ID' => $UTIL_ID,
		'RDC_COMMENTAIRE'=> $_POST['cmt4'],
		'RDC_REPONSE' => $_POST['rep4'],
		'RDC_COMMENTAIRE_SUI_PROC' => $_POST['trav_D2'],
	),
	array(
		'RDC_OBJECTIF'=>'D',
		'RDC_CYCLE'=>'Fond propre',
		'RDC_RANG'=>5,
		'MISSION_ID'=>$_SESSION['idMission'],
	)
);

_save_backup();
