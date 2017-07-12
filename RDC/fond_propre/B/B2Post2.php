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
	
_writting_rep(
	array(
		'UTIL_ID' => $UTIL_ID,
		'RDC_COMMENTAIRE'=> $_POST['cmt1'],
		'RDC_REPONSE' => $_POST['rep1'],
	),
	array(
		'RDC_OBJECTIF'=>'B',
		'RDC_CYCLE'=>'Fond propre',
		'RDC_RANG'=>4,
		'MISSION_ID'=>$_SESSION['idMission'],
	)
);
_save_backup();
/*
//////////////////////////insert (trav - B2) RESPECT DES CONDITIONS DE DISTRIBUTION DE DIVIDENDES ET DES AVANCES SUR DIVIDENDES////////////////////////////////
$reqInsert=$bdd->prepare("INSERT INTO  tab_rdc_fp_b_resp_cond_distrib (cmt_resp_cond_distib, MISSION_ID) VALUE (:g,:h)");
		$reqInsert->execute(array(
		'g'=>$trav_B2,
		'h'=>$MISSION_ID
		));
		*/
?>