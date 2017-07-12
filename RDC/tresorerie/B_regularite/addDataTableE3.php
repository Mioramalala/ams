<?php
session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$compteE3=array();
$soldeE3=array();
$deviseE3=array();
$tauxE3=array();
$solde_reevalE3=array();
$solsolde_comptaE3deE3=array();
$differenceE3=array();
$observationE3=array();

$compteE3=$_POST['compteE3'];
$soldeE3=$_POST['soldeE3'];
$deviseE3=$_POST['deviseE3'];
$tauxE3=$_POST['tauxE3'];
$solde_reevalE3=$_POST['solde_reevalE3'];
$solde_comptaE3=$_POST['solde_comptaE3'];
$differenceE3=$_POST['differenceE3'];
$observationE3=$_POST['observationE3'];
$mission_id=@$_SESSION['idMission'];
$cycle=$_POST['cycle'];
$rang=0;


foreach ($compteE3 as $key => $comptevalue) 
{
								$queryId='select id from tab_rdc_tr_e3 where rang='.$rang.' and cycle="'.$cycle.'" and mission_id='.$mission_id;
								$reponseId=$bdd->query($queryId);
								$donneesId=$reponseId->fetch();
								echo $donneesId['id'];
								$sqlUpdate="";
								if($donneesId['id']!=0)
								{
									$sqlUpdate="update tab_rdc_tr_e3 
									set UTIL_ID = '$UTIL_ID',compte='$comptevalue', solde='".$soldeE3[$rang]."', devise='".$deviseE3[$rang]."', taux='".$tauxE3[$rang]."', solde_reeval='".$solde_reevalE3[$rang]."', solde_compta='".$solde_comptaE3[$rang]."', difference='".$differenceE3[$rang]."', observation='".$observationE3[$rang]."', cycle='".$cycle."', mission_id='$mission_id', rang='$rang' where id='".$donneesId['id']."'";
								}
								else{
									$sqlUpdate="insert into tab_rdc_tr_e3 (compte, solde, devise, taux, solde_reeval, solde_compta, difference,observation, cycle, mission_id, rang,UTIL_ID) value ('$comptevalue','".$soldeE3[$rang]."','".$deviseE3[$rang]."','".$tauxE3[$rang]."','".$solde_reevalE3[$rang]."','".$solde_comptaE3[$rang]."','".$differenceE3[$rang]."','".$observationE3[$rang]."','$cycle','$mission_id','$rang','$UTIL_ID')";
									
									

								}


								  //print($sqlUpdate."<br>");
									$reponseUpdate=$bdd->query($sqlUpdate);
									$file = '../../../fichier/save_mission/mission.sql';
									file_put_contents($file, $sqlUpdate.";", FILE_APPEND | LOCK_EX);

								$rang++;
}//FIN Foreach



?>