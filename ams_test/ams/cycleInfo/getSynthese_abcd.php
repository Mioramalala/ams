<?php
/**
 * Created by PhpStorm.
 * User: herenoch
 * Date: 09/09/2016
 * Time: 16:46
 */

include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';
@session_start();
$missionId = $_SESSION['idMission'];
$reponse=$bdd->query("SELECT count(*) as nb FROM tab_synthese WHERE (CYCLE_ACHAT_ID=100000000 OR CYCLE_ACHAT_ID = 32 OR CYCLE_ACHAT_ID=33 OR CYCLE_ACHAT_ID=33 OR CYCLE_ACHAT_ID=34) AND MISSION_ID='$missionId'");
$donnees=$reponse->fetch();

print ($donnees["nb"]);
?>

