<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

$lien = $_POST['lien'] ;
$lien = "../../../".$lien ;
//$file_to_del = "../pieces_justificatives/pj_immofi_G1"."_".$mission_id."_".$numero. ;
if(file_exists($lien)) unlink($lien) ;
$sql = "DELETE FROM `tab_pieces_justificatives` WHERE mission_id =$mission_id" ;
$bdd->query($sql) ;
echo 'Fichier supprimé' ;
?>