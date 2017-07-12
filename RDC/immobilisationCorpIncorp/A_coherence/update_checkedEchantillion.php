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
$mission_id=@$_SESSION['idMission'];
$id_echantillon_GL=$_POST["id_echantillon_GL"];
$cocher_chantillion=$_POST["cocher_chantillion"];
$alphabe_echant=$_POST["alphabe_echant"];


$sqlUpdate="";
switch ($alphabe_echant)
{
    case "A":
        $sqlUpdate="update tab_ehantillon_gl set   A='$cocher_chantillion' where id_echantillon_GL='$id_echantillon_GL' AND id_mission='$mission_id'";
        break;
    case "B":
        $sqlUpdate="update tab_ehantillon_gl set   B='$cocher_chantillion' where id_echantillon_GL='$id_echantillon_GL' AND id_mission='$mission_id'";
        break;
    case "C":
        $sqlUpdate="update tab_ehantillon_gl set   C='$cocher_chantillion' where id_echantillon_GL='$id_echantillon_GL' AND id_mission='$mission_id'";
        break;
    case "D":
        $sqlUpdate="update tab_ehantillon_gl set   D='$cocher_chantillion' where id_echantillon_GL='$id_echantillon_GL' AND id_mission='$mission_id'";
        break;
    case "E":
        $sqlUpdate="update tab_ehantillon_gl set   E='$cocher_chantillion' where id_echantillon_GL='$id_echantillon_GL' AND id_mission='$mission_id'";
        break;


}


    $reponse=$bdd->query($sqlUpdate);

		$file = $project_path.'/fichier/save_mission/mission.sql';
/*See "Suvit global" for the reason of this remove*/
		// file_put_contents($file, $sql.";", FILE_APPEND | LOCK_EX);



?>