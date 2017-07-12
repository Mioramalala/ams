<?php 
@session_start();
 
		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../../"; #using $project_path
	
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

$mission_id=@$_SESSION['mission_id'];

if (is_uploaded_file($_FILES['fichier']['tmp_name']))
{ 
	$name=utf8_decode($_FILES['fichier']['name']);
	$uid=uniqid();
	$new_path=$project_path."/RDC/prod_client/archive/$uid".$name;
	$tmp_name=$_FILES['fichier']['tmp_name'];
	_save_uploaded_file($tmp_name,$new_path);
	
}