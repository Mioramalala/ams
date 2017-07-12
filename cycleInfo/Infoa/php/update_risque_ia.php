<?php
@session_start();
include '../../../connexion.php';

$cycle_nom=$_POST['cycle_nom'];
$complexite=$_POST['complexite'];

$reponse = $bdd->exec('UPDATE tab_sys_info SET COMPLEXITE = "'.$complexite.'" WHERE NOM_CYCLE="'.$cycle_nom.'" AND MISSION_ID='.$_SESSION['idMission']);

if($reponse) echo 'update';

?>