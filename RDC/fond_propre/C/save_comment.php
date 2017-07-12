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

if(_defined_comment_and_id()){
	_treat_comment_and_id();
}

$file = "$project_path/fichier/save_mission/mission.sql";
if($using_backup){
	file_put_contents($file, $backup_sql.";", FILE_APPEND | LOCK_EX);
}


function _defined_comment_and_id(){
	return (isset($_POST["cmt_B3"]) && $_POST["ids"]);
}
function _treat_comment_and_id(){
	global $bdd;
	global $backup_sql;
	$cmt_B3=$_POST["cmt_B3"];
	$ids=$_POST["ids"];
	foreach($ids as $k=>$id){
		$comment=str_replace("'","'\\'",$cmt_B3[$k]);
		$sql="
		UPDATE
			tab_gl_gen
		SET
			GL_GEN_COMMENTAIRE='$comment'
		WHERE
			GL_GEN_ID=$id
		";
		$backup_sql.=$sql;
		$r=$bdd->query($sql);
	}
}

