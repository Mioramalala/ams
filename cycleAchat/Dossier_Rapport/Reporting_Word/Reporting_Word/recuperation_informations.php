<?php

//RECUPERATION NOM, ADRESSE ET DATE DE DEBUT/CLOTURE MISSION DE L'ENTREPRISE BY NIAINA
include '../../connexion.php';

session_start();
$sql = 'SELECT * FROM tab_mission WHERE MISSION_ID = '.$_SESSION['idMission'];
$req = $bdd->query($sql);
$tab = $req->fetch();
$entrepriseId = $tab['ENTREPRISE_ID'];
$dateDebutMission = $tab['MISSION_DATE_DEBUT'];
$dateClotureMission = $tab['MISSION_DATE_CLOTURE'];

$sql2 = 'SELECT * FROM tab_entreprise WHERE ENTREPRISE_ID = '.$entrepriseId; 
$req2 = $bdd->query($sql2);
$tab2 = $req2->fetch();
$nomEntreprise = $tab2['ENTREPRISE_DENOMINATION_SOCIAL'];
$adresseEntreprise = $tab2['ENTREPRISE_ADRESSE'];
//FIN RECUPERATION BY NIAINA

?>
