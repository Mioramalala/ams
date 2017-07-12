<?php
include'../connexion.php';
session_start();
/*******************donnees GET distribution des tache************************/
$donne=array();
$pers=$_GET["pers"];
$donne=$_GET["cl1"];
 
 /*************************données POST mission*********************************/
	$typeM=$_POST["a"];
	$AnnM=$_POST["z"];
	$SupM=$_POST["e"];
	$DebM=$_POST["r"];
	$ClozM=$_POST["t"];
	$entreId=$_POST["y"];
	$Deadline=$_POST["u"];
	
$reqInsertMiss=$bdd->prepare("INSERT INTO  tab_mission ( MISSION_DATE_DEBUT, 
MISSION_DATE_CLOTURE, MISSION_ANNEE , MISSION_TYPE,ENTREPRISE_ID,MISSION_DEADLINE,DATE_NOW) VALUE (:a,:z,:e,:r,:y,:u,now())");
$reqInsertMiss->execute(array(
'a'=>$DebM,
'z'=>$ClozM,
'e'=>$AnnM,
'r'=>$typeM,
'y'=>$entreId,
'u'=>$Deadline,
));
//on cherche la session a inclure//
$sqlIdMission="SELECT MISSION_ID FROM   tab_mission WHERE MISSION_ANNEE='".$AnnM."'AND MISSION_TYPE='".$typeM."'";
$repIdMiss=$bdd->query($sqlIdMission);
// echo $sqlIdMission;
while($donneeMissId=$repIdMiss->fetch()){
$IdMission=$donneeMissId['MISSION_ID'];
}


/////////////////////////**Save distribution des taches**//////////////////////////////////


// $reqInsertsUP=$bdd->prepare("INSERT INTO  tab_superviseur ( SUPERVISEUR_NOM , MISSION_ID ) VALUE (:t,:u)");
// $reqInsertsUP->execute(array(
// 't'=>$SupM,
// 'u'=>$IdMission
// ));


$sqlDenom="SELECT ENTREPRISE_DENOMINATION_SOCIAL FROM   tab_entreprise WHERE ENTREPRISE_ID='".$entreId."'";
$rep=$bdd->query($sqlDenom);
// echo $sqlIdMission;
while($donne=$rep->fetch()){
$denom=$donne['ENTREPRISE_DENOMINATION_SOCIAL'];
}

//création dassier pour la mission//
$ch_docMission='../repertoire_document/doc_'.$denom.'/Mission_'.$IdMission;
mkdir($ch_docMission,0777);



?>