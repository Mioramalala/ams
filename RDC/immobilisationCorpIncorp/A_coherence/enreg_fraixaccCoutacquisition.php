<?php
/**
 * Created by PhpStorm.
 * User: herenoch
 * Date: 30/08/2016
 * Time: 16:24
 */
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
$mission_id=@$_SESSION['idMission'];
include "$project_path/connexion.php";

$checkfrais_acc=array();
$checkfrais_acc=$_POST["checkfrais_acc"];

$cout=$_POST["cout"];

foreach ($checkfrais_acc as $idfraix)
{
    $sql1="select count(*) as 'nbr_'  from tbl_detaillefraix_acc where id_frais_acc='$idfraix' and type_fraixacc='$cout'";
    $req=$bdd->query($sql1);

    $res_=$req->fetch();
var_dump($res_);
    if($res_["nbr_"]==0)
    {

        $sqlinsert="insert into tbl_detaillefraix_acc(id_frais_acc,id_mission,type_fraixacc) values('$idfraix','$mission_id','$cout')";
		
var_dump($sqlinsert);
        $reqinsert=$bdd->query($sqlinsert);
    }



}