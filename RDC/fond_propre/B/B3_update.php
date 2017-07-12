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
	),
	array(
		'RDC_OBJECTIF'=>'B',
		'RDC_CYCLE'=>'Fond propre',
		'RDC_RANG'=>4,
		'MISSION_ID'=>$_SESSION['idMission'],
	)
);

$cmt_B3=array();
$GL_GEN_ID=array();
$cmt_B3=$_POST['cmt_B3'];
$GL_GEN_ID=$_POST['GL_GEN_ID'];


$i=0;
foreach ($cmt_B3 as $key => $cmtvalue){
	global $bdd,$GL_GEN_ID,$cmt_B3,$file;
	$req="
	UPDATE 
		tab_gl_gen		 	  
	SET 
		GL_GEN_COMMENTAIRE = '$cmtvalue'
	WHERE 
		GL_GEN_ID='".$GL_GEN_ID[$i]."' AND
		GL_GEN_CYCLE='A- Fonds propres' AND
		GL_GEN_COMPTES like '1%'  AND
		MISSION_ID='".$_SESSION['idMission']."'";
	$req22=$bdd->query($req) or die (mysql_error());
	$backup_sql.=$req;

	$i++;
 }

_save_backup();
