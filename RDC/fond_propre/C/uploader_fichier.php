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

$mission_id=@$_SESSION['mission_id'];

if (is_uploaded_file($_FILES['fichier']['tmp_name']))
{ 
	$name=$_FILES['fichier']['name'];
	
?>	

<?php	
	$loader=$project_path."/RDC/fond_propre/C/fichier_upload/".$name;
	if(is_file($loader)){
		unlink($loader);
	}
	$result= move_uploaded_file($_FILES['fichier']['tmp_name'],$loader);
	chmod($loader,0777);
	var_dump($loader);
	if ($result != 1)
   { 
     die("Error uploading file.  Please try again");
   }
}
?>