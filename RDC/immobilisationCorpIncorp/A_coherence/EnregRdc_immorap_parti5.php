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
	include "$project_path/connexion.php";
$mission_id=$_SESSION['idMission'];

$valeur_assure=$_POST['valeur_assure'];
$difference=$_POST['difference'];



//
$req=$bdd->query("select *  from tab_rdc_immorap_parti5 where MISSION_ID='$mission_id'");
$donnees = $req->fetch();
	$sql="";
if($donnees == null)
{
		$sql="insert into tab_rdc_immorap_parti5(MISSION_ID,Valeur_assuree,difference) values('$mission_id','$valeur_assure','$difference')";

}else
{
		$sql="update tab_rdc_immorap_parti5
		set 
		Valeur_assuree='$valeur_assure',
		difference='$difference'
		where MISSION_ID='$mission_id'";
}

	$req=$bdd->query($sql);
	$file = $project_path.'/fichier/save_mission/mission.sql';
/*See "Suvit global" for the reason of this remove*/
	// file_put_contents($file, $sql.";", FILE_APPEND | LOCK_EX);
	
?>