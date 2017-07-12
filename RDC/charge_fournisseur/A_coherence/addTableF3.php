<?php

include '../../../connexion.php';

$tx_ac_import_N=$_POST['tx_ac_import_N'];
$tx_ac_import_N1=$_POST['tx_ac_import_N1'];
$tx_ac_locaux_N=$_POST['tx_ac_locaux_N'];
$tx_ac_locaux_N1=$_POST['tx_ac_locaux_N1'];
$tx_ac_ttc_N=$_POST['tx_ac_ttc_N'];
$tx_ac_ttc_N1=$_POST['tx_ac_ttc_N1'];
$tx_frns_N=$_POST['tx_frns_N'];
$tx_frns_N1=$_POST['tx_frns_N1'];
$tx_nbr_jr_N=$_POST['tx_nbr_jr_N'];
$tx_nbr_jr_N1=$_POST['tx_nbr_jr_N1'];
$charge_frns=$_POST['charge_frns'];
$mission_id=$_POST['mission_id'];

$reponse=$bdd->exec('insert into ');

?>