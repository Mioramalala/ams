<?php
@session_start();

		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
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
		'RDC_COMMENTAIRE_RESP_COND' => $_POST['trav_B2'],
	),
	array(
		'RDC_OBJECTIF'=>'B',
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
		'RDC_COMMENTAIRE_RESP_COND' => $_POST['trav_B2'],
	),
	array(
		'RDC_OBJECTIF'=>'B',
		'RDC_CYCLE'=>'Fond propre',
		'RDC_RANG'=>3,
		'MISSION_ID'=>$_SESSION['idMission'],
	)
);
/////insert (trav - B2) RESPECT DES CONDITIONS DE DISTRIBUTION DE DIVIDENDES ET DES AVANCES SUR DIVIDENDES//////////

$requete3="INSERT INTO  tab_rdc_fp_b_resp_cond_distrib (cmt_resp_cond_distib, MISSION_ID,UTIL_ID) VALUE ('".$trav_B2."',".$MISSION_ID.",".$UTIL_ID.")";
	
$reqInsert=$bdd->exec($requete3);

$backup_sql.="$requete3;";

	
_save_backup();
	
	