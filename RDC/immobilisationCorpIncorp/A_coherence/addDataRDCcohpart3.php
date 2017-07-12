<?php
@session_start();
$UTIL_ID=$_SESSION['id'];
$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

$id_echantillon_GL=array();
$compteF3=array();
$labelleF3=array();
$montantF3=array();
$budgetF3=array();
$ecartF3=array();
$commentF3=array();
$cycle=$_POST['cycle'];


$compteF3=$_POST['compteF3'];
$labelleF3=$_POST['labelleF3'];
$montantF3=$_POST['montantF3'];
$budgetF3=$_POST['budgetF3'];
//$ecartF2=$_POST['ecartF2'];
$commentF3=$_POST['commentF3'];

$id_echantillon_GL=$_POST['id_echantillon_GL'];

$i=0;
//var_dump($compteF3);
foreach ($compteF3 as  $Comptevalue) 
{
	$ecartF3[$i]=$montantF3[$i]-$budgetF3[$i];
	$SQL_="";

	$queryId="select id from tab_rdc_immo_partie3 where compte='".$compteF3[$i]."' and id_echantillon_GL='".$id_echantillon_GL[$i]."' and mission_id='$mission_id' and cycle='$cycle'";
	$reponseId=$bdd->query($queryId);
	$donneesId=$reponseId->fetch();
	if($donneesId['id']!=0)
	{
		$SQL_="update tab_rdc_immo_partie3 
			    set  UTIL_ID = '$UTIL_ID',

			    id_echantillon_GL='".$id_echantillon_GL[$i]."',
			    compte='".$compteF3[$i]."',
			    libelle='".$labelleF3[$i]."',
			    montant='".$montantF3[$i]."',
			    budget='".$budgetF3[$i]."',
			    ecart='".$ecartF3[$i]."',
			    commentaires='".$commentF3[$i]."'
			    
			    where mission_id='$mission_id' AND id='".$donneesId['id']."'";


	}
	else{
		$SQL_="insert into tab_rdc_immo_partie3 (id_echantillon_GL,compte, libelle, montant, budget, ecart, commentaires, mission_id, cycle,UTIL_ID) 

			value ('".$id_echantillon_GL[$i]."','".$compteF3[$i]."','".$labelleF3[$i]."','".$montantF3[$i]."','".$budgetF3[$i]."','".$ecartF3[$i]."','".$commentF3[$i]."','".$mission_id."','".$cycle."','".$UTIL_ID."')";
	}

		$reponse=$bdd->query($SQL_);
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file,$SQL_.";", FILE_APPEND | LOCK_EX);

	$i++;
	//# code...
}//FIN foreach








?>