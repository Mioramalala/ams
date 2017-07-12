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

$reponse=$_POST['reponse'];
$commentaire=$_POST['commentaire'];
$cycle=$_POST['cycle'];
$objectif=$_POST['objectif'];
$rang=$_POST['rang'];




_writting_rep(
	array(
		'UTIL_ID' => $UTIL_ID,
		'RDC_COMMENTAIRE'=> $_POST['commentaire'],
		'RDC_REPONSE' => $_POST['reponse'],
		'RDC_COMMENTAIRE_SUI_PROC' => $_POST['trav_D2'],
	),
	array(
		'RDC_OBJECTIF'=>$_POST["objectif"],
		'RDC_CYCLE'=>$_POST["cycle"],
		'RDC_RANG'=>$_POST['rang'],
		'MISSION_ID'=>$_SESSION['idMission'],
	)
);

_save_backup();


//It is the test the data in the tab_rdc if the data is exist
$rep0=$bdd->query('select RDC_ID from tab_rdc where RDC_CYCLE="'.$cycle.'" and RDC_OBJECTIF="'.$objectif.'" and RDC_RANG='.$rang.' and MISSION_ID='.$mission_id);

$donnees0=$rep0->fetch();

//get the rdc_id in the tab_rdc
$rdc_id=$donnees0['RDC_ID'];

//if the data not exist it insert all data but if exist it update the comment and the question choice multiple
if($rdc_id==0){
	$req='insert into tab_rdc(RDC_CYCLE, RDC_COMMENTAIRE, RDC_REPONSE, RDC_OBJECTIF, RDC_RANG, MISSION_ID,UTIL_ID) value ("'.$cycle.'","'.$commentaire.'","'.$reponse.'","'.$objectif.'",'.$rang.','.$mission_id.','.$UTIL_ID.')';
	$rep=$bdd->exec($req);
	
	$file = "$project_path/fichier/save_mission/mission.sql";
/*See "Suvit global" for the reason of this remove*/
	// file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
}
else{
	$req1='update tab_rdc set UTIL_ID = "'.$UTIL_ID.'",RDC_COMMENTAIRE="'.$commentaire.'", RDC_REPONSE="'.$reponse.'" where MISSION_ID="'.$mission_id.'" AND RDC_ID='.$rdc_id;
	$rep1=$bdd->exec($req1);
	
	$file = "$project_path/fichier/save_mission/mission.sql";
/*See "Suvit global" for the reason of this remove*/
	// file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
}

echo $cycle.",".$commentaire.",".$reponse.",".$objectif.",".$rang.",".$mission_id;

?>