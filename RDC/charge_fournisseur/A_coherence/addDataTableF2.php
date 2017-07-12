<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

$compteF2=array();
$labelleF2=array();
$montantF2=array();
$budgetF2=array();
$ecartF2=array();
$commentF2=array();
$cycle=$_POST['cycle'];


$compteF2=$_POST['compteF2'];
$labelleF2=$_POST['labelleF2'];
$montantF2=$_POST['montantF2'];
$budgetF2=$_POST['budgetF2'];
//$ecartF2=$_POST['ecartF2'];
$commentF2=$_POST['commentF2'];

$i=0;
var_dump($compteF2);
foreach ($compteF2 as  $Comptevalue) 
{
	$ecartF2[$i]=$montantF2[$i]-$budgetF2[$i];
	$SQL_="";

	$queryId="select id from tab_rdc_cf_f2 where compte='".$compteF2[$i]."' and libelle='".$labelleF2[$i]."' and mission_id='$mission_id' and cycle='$cycle'";
	$reponseId=$bdd->query($queryId);
	$donneesId=$reponseId->fetch();
	if($donneesId['id']!=0)
	{
		$SQL_="update tab_rdc_cf_f2 
			    set  UTIL_ID = '$UTIL_ID',
			    compte='".$compteF2[$i]."',
			    libelle='".$labelleF2[$i]."',
			    montant='".$montantF2[$i]."',
			    budget='".$budgetF2[$i]."',
			    ecart='".$ecartF2[$i]."',
			    commentaires='".$commentF2[$i]."'
			    
			    where mission_id='$mission_id' AND id='".$donneesId['id']."'";
	}
	else{
		$SQL_="insert into tab_rdc_cf_f2 (compte, libelle, montant, budget, ecart, commentaires, mission_id, cycle,UTIL_ID) 

			value ('".$compteF2[$i]."','".$labelleF2[$i]."','".$montantF2[$i]."','".$budgetF2[$i]."','".$ecartF2[$i]."','".$commentF2[$i]."','".$mission_id."','".$cycle."','".$UTIL_ID."')";
	}

		$reponse=$bdd->query($SQL_);
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file,$SQL_.";", FILE_APPEND | LOCK_EX);

	$i++;
	//# code...
}//FIN foreach








?>