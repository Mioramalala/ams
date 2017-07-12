<?php
@session_start();
 $mission_id=@$_SESSION['idMission'];
 include '../../../connexion.php';
 
if(isset($mission_id)){
	$date   = array();
	$facture    = array();
	$client     = array();
	$montant    = array();
	$tva       = array();
	$observation =array() ;
	
	$date      = $_GET['date'];
	$facture    = $_GET['facture'];
	$client     = $_GET['client'];
	$montant    = $_GET['montant'];
	$tva       = $_GET['tva'];
	$observation = $_GET['observation'];

	$n = 0 ;
	foreach($date as $id){
	
	$bdd->query('insert into tab_g7(G7_DATE,G7_FACTURE,G7_CLIENT,G7_MONTANT,G7_TVA,G7_OBSERVATION,MISSION_ID)
	 VALUES
	("'.$id.'", "'.$facture[$n].'", "'.$client[$n].'", "'.$montant[$n].'", "'.$tva[$n].'", "'.$observation[$n].'", "'.$mission_id.'")' );

	 $n++ ;
	
	}


}


?>