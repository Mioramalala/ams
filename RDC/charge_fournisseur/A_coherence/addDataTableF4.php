<?php
@session_start();
include '../../../connexion.php';
$UTIL_ID=$_SESSION['id'];

$tab_vente=array();
$tab_ventemarch=array();
$tab_coutmarch=array();
$tab_stockinit=array();
$tab_achatmarch=array();
$tab_stockfin=array();
$tab_margebrute=array();
$tab_margevente=array();
$tab_margeachat=array();
$tab_fraisacces=array();

$tab_vente=$_POST['tab_vente'];
$tab_ventemarch=$_POST['tab_ventemarch'];
$tab_coutmarch=$_POST['tab_coutmarch'];
$tab_stockinit=$_POST['tab_stockinit'];
$tab_stockfin=$_POST['tab_stockfin'];
$tab_margebrute=$_POST['tab_margebrute'];
$tab_margevente=$_POST['tab_margevente'];
$tab_margeachat=$_POST['tab_margeachat'];


$mission_id=$_POST['mission_id'];

$tab_libelle=array("vente","vente_marchandise","cout_marchandise","stock_initiaux","stock_final","marge_brute","marge_vente","marge_achat");
$mission_id_tab=array(0,0,0,0,0,0,0,0,0);
/////////////Selection de mission id dans la table tab_rdc_cf_f4_1 pour l'insertion ou la modification////////
for($i=0;$i<8;$i++){
	$queryMissionId='select mission_id from tab_rdc_cf_f4_1 where mission_id='.$mission_id.' and libelle="'.$tab_libelle[$i].'"';
	$reponseMissionId=$bdd->query($queryMissionId);	
	while($donneesMissionId=$reponseMissionId->fetch()){
		$mission_id_tab[$i]=$donneesMissionId['mission_id'];
	}
}

///////////L'insertion des données si ils n'existent pas si oui on fait la mise à jour///////////////////
if($mission_id_tab[0]==0){

	////////////////////////Insertion des données de la tab_rdc_cf_f4_1 avec le libellé vente/////////////
	$queryVente='insert into tab_rdc_cf_f4_1 (libelle, N0, N1, N2, N3, N4, mission_id,UTIL_ID) value ("vente",'.$tab_vente[0].','.$tab_vente[1].','.$tab_vente[2].','.$tab_vente[3].','.$tab_vente[4].','.$mission_id.','.$UTIL_ID.')';
	$reponseVente=$bdd->exec($queryVente);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryVente.";", FILE_APPEND | LOCK_EX);
}
else{
	/////////////////////Mise à jour de la tab_rdc_cf_f4_1 avec le libellé vente////////////////
	$queryUpdateVente='update tab_rdc_cf_f4_1 set UTIL_ID = '.$UTIL_ID.',N0='.$tab_vente[0].',N1='.$tab_vente[1].',N2='.$tab_vente[2].',N3='.$tab_vente[3].',N4='.$tab_vente[4].' where mission_id='.$mission_id.' and libelle ="vente"';
	$reponse=$bdd->exec($queryUpdateVente);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryUpdateVente.";", FILE_APPEND | LOCK_EX);
	
}
if($mission_id_tab[1]==0){
	////////////////////////Insertion des données de la tab_rdc_cf_f4_1 avec le libellé vente marchandise/////////////
	$queryVenteMarch='insert into tab_rdc_cf_f4_1 (libelle, N0, N1, N2, N3, N4, mission_id,UTIL_ID) value ("vente_marchandise",'.$tab_ventemarch[0].','.$tab_ventemarch[1].','.$tab_ventemarch[2].','.$tab_ventemarch[3].','.$tab_ventemarch[4].','.$mission_id.','.$UTIL_ID.')';
	$reponseVente=$bdd->exec($queryVenteMarch);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryVenteMarch.";", FILE_APPEND | LOCK_EX);
}
else{

	/////////////////////Mise à jour de la tab_rdc_cf_f4_1 avec le libellé vente marchandise////////////////
	$queryUpdateVenteMarch='update tab_rdc_cf_f4_1 set UTIL_ID = '.$UTIL_ID.',N0='.$tab_ventemarch[0].',N1='.$tab_ventemarch[0].',N2='.$tab_ventemarch[0].',N3='.$tab_ventemarch[0].',N4='.$tab_ventemarch[0].' where mission_id='.$mission_id.' and libelle ="vente_marchandise"';
	$reponse=$bdd->exec($queryUpdateVenteMarch);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryUpdateVenteMarch.";", FILE_APPEND | LOCK_EX);
}
if($mission_id_tab[2]==0){
	////////////////////////Insertion des données de la tab_rdc_cf_f4_1 avec le libellé cout marchandise/////////////
	$queryCoutMarch='insert into tab_rdc_cf_f4_1 (libelle, N0, N1, N2, N3, N4, mission_id,UTIL_ID) value ("cout_marchandise",'.$tab_coutmarch[0].','.$tab_coutmarch[1].','.$tab_coutmarch[2].','.$tab_coutmarch[3].','.$tab_coutmarch[4].','.$mission_id.','.$UTIL_ID.')';
	$reponseVente=$bdd->exec($queryCoutMarch);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryCoutMarch.";", FILE_APPEND | LOCK_EX);
}
else{
	/////////////////////Mise à jour de la tab_rdc_cf_f4_1 avec le libellé cout marchandise////////////////
	$queryUpdateCoutMarch='update tab_rdc_cf_f4_1 set UTIL_ID = '.$UTIL_ID.',N0='.$tab_coutmarch[0].',N1='.$tab_coutmarch[1].',N2='.$tab_coutmarch[2].',N3='.$tab_coutmarch[3].',N4='.$tab_coutmarch[4].' where mission_id='.$mission_id.' and libelle ="cout_marchandise"';
	$reponse=$bdd->exec($queryUpdateCoutMarch);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryUpdateCoutMarch.";", FILE_APPEND | LOCK_EX);
}
if($mission_id_tab[3]==0){
	////////////////////////Insertion des données de la tab_rdc_cf_f4_1 avec le libellé stock initiaux/////////////
	$queryStockInit='insert into tab_rdc_cf_f4_1 (libelle, N0, N1, N2, N3, N4, mission_id,UTIL_ID) value ("stock_initiaux",'.$tab_stockinit[0].','.$tab_stockinit[1].','.$tab_stockinit[2].','.$tab_stockinit[3].','.$tab_stockinit[4].','.$mission_id.','.$UTIL_ID.')';
	$reponseVente=$bdd->exec($queryStockInit);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryStockInit.";", FILE_APPEND | LOCK_EX);
}
else{
	/////////////////////Mise à jour de la tab_rdc_cf_f4_1 avec le libellé stock initiaux////////////////
	$queryUpdateStockInit='update tab_rdc_cf_f4_1 set UTIL_ID = '.$UTIL_ID.',N0='.$tab_stockinit[0].',N1='.$tab_stockinit[1].',N2='.$tab_stockinit[2].',N3='.$tab_stockinit[3].',N4='.$tab_stockinit[4].' where mission_id='.$mission_id.' and libelle ="stock_initiaux"';
	$reponse=$bdd->exec($queryUpdateStockInit);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryUpdateStockInit.";", FILE_APPEND | LOCK_EX);
}

if($mission_id_tab[4]==0){
	////////////////////////Insertion des données de la tab_rdc_cf_f4_1 avec le libellé stock final/////////////
	$queryStockFinal='insert into tab_rdc_cf_f4_1 (libelle, N0, N1, N2, N3, N4, mission_id,UTIL_ID) value ("stock_final",'.$tab_stockfin[0].','.$tab_stockfin[1].','.$tab_stockfin[2].','.$tab_stockfin[3].','.$tab_stockfin[4].','.$mission_id.','.$UTIL_ID.')';
	$reponseVente=$bdd->exec($queryStockFinal);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryStockFinal.";", FILE_APPEND | LOCK_EX);
}
else{
	/////////////////////Mise à jour de la tab_rdc_cf_f4_1 avec le libellé stock final////////////////
	$queryUpdateStockFin='update tab_rdc_cf_f4_1 set UTIL_ID = '.$UTIL_ID.',N0='.$tab_stockfin[0].',N1='.$tab_stockfin[1].',N2='.$tab_stockfin[2].',N3='.$tab_stockfin[3].',N4='.$tab_stockfin[4].' where mission_id='.$mission_id.' and libelle ="stock_final"';
	$reponse=$bdd->exec($queryUpdateStockFin);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryUpdateStockFin.";", FILE_APPEND | LOCK_EX);
}
if($mission_id_tab[5]==0){
	////////////////////////Insertion des données de la tab_rdc_cf_f4_1 avec le libellé marge brute/////////////
	$queryMargeBrute='insert into tab_rdc_cf_f4_1 (libelle, N0, N1, N2, N3, N4, mission_id,UTIL_ID) value ("marge_brute",'.$tab_margebrute[0].','.$tab_margebrute[1].','.$tab_margebrute[2].','.$tab_margebrute[3].','.$tab_margebrute[4].','.$mission_id.','.$UTIL_ID.')';
	$reponseVente=$bdd->exec($queryMargeBrute);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryMargeBrute.";", FILE_APPEND | LOCK_EX);
}
else{
	/////////////////////Mise à jour de la tab_rdc_cf_f4_1 avec le libellé marge brute////////////////
	$queryUpdateMargeBrut='update tab_rdc_cf_f4_1 set UTIL_ID = '.$UTIL_ID.',N0='.$tab_margebrute[0].',N1='.$tab_margebrute[1].',N2='.$tab_margebrute[2].',N3='.$tab_margebrute[3].',N4='.$tab_margebrute[4].' where mission_id='.$mission_id.' and libelle ="marge_brute"';
	$reponse=$bdd->exec($queryUpdateMargeBrut);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryUpdateMargeBrut.";", FILE_APPEND | LOCK_EX);
}
if($mission_id_tab[6]==0){
	////////////////////////Insertion des données de la tab_rdc_cf_f4_1 avec le libellé marge sur vente/////////////
	$queryMargeVente='insert into tab_rdc_cf_f4_1 (libelle, N0, N1, N2, N3, N4, mission_id,UTIL_ID) value ("marge_vente",'.$tab_margevente[0].','.$tab_margevente[1].','.$tab_margevente[2].','.$tab_margevente[3].','.$tab_margevente[4].','.$mission_id.','.$UTIL_ID.')';
	$reponseVente=$bdd->exec($queryMargeVente);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryMargeVente.";", FILE_APPEND | LOCK_EX);
}
else{
	/////////////////////Mise à jour de la tab_rdc_cf_f4_1 avec le libellé marge sur vente////////////////
	$queryUpdateMargeVente='update tab_rdc_cf_f4_1 set UTIL_ID = '.$UTIL_ID.',N0='.$tab_margevente[0].',N1='.$tab_margevente[1].',N2='.$tab_margevente[2].',N3='.$tab_margevente[3].',N4='.$tab_margevente[4].' where mission_id='.$mission_id.' and libelle ="marge_vente"';
	$reponse=$bdd->exec($queryUpdateMargeVente);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryUpdateMargeVente.";", FILE_APPEND | LOCK_EX);
}
if($mission_id_tab[7]==0){
	////////////////////////Insertion des données de la tab_rdc_cf_f4_1 avec le libellé marge sur achat/////////////
	$queryMargeAchat='insert into tab_rdc_cf_f4_1 (libelle, N0, N1, N2, N3, N4, mission_id,UTIL_ID) value ("marge_achat",'.$tab_margeachat[0].','.$tab_margeachat[1].','.$tab_margeachat[2].','.$tab_margeachat[3].','.$tab_margeachat[4].','.$mission_id.','.$UTIL_ID.')';
	$reponseVente=$bdd->exec($queryMargeAchat);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryMargeAchat.";", FILE_APPEND | LOCK_EX);
}
else{
	/////////////////////Mise à jour de la tab_rdc_cf_f4_1 avec le libellé marge sur achat////////////////
	$queryUpdateMargeAchat='update tab_rdc_cf_f4_1 set UTIL_ID = '.$UTIL_ID.',N0='.$tab_margeachat[0].',N1='.$tab_margeachat[1].',N2='.$tab_margeachat[2].',N3='.$tab_margeachat[3].',N4='.$tab_margeachat[4].' where mission_id='.$mission_id.' and libelle ="marge_achat"';
	$reponse=$bdd->exec($queryUpdateMargeAchat);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $queryUpdateMargeAchat.";", FILE_APPEND | LOCK_EX);
}

echo 'Hello';
?>