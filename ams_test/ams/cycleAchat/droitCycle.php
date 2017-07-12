<?php
/**
 * Created by PhpStorm.
 * User: tmsc
 * Date: 05/04/2016
 * Time: 09:41
 */

include 'connexion.php';
$MISSION_ID = $_SESSION['MISSION_ID'];
$UTIL_ID = $_SESSION['UTIL_ID'];
$task = @$_POST['task_id'];

// Droit utilisateur pour chaque distribution de tâches
$sql = "SELECT tache_id
        FROM tab_distribution_tache
        WHERE tache_id = '$task' AND UTIL_ID='$UTIL_ID' AND MISSION_ID='$MISSION_ID'";
$droit_user = $bdd->query($sql)->rowCount() > 0;

$sql = "SELECT UTIL_ID
        FROM tab_superviseur
        WHERE MISSION_ID='$MISSION_ID' AND UTIL_ID='$UTIL_ID'";
$droit_superviseur = $bdd->query($sql)->rowCount() > 0;

// Droit super-administrateur
$sql = "SELECT UTIL_ID
        FROM  tab_utilisateur
        WHERE UTIL_STATUT='2' AND UTIL_ID='$UTIL_ID'";
$droit_admin = $bdd->query($sql)->rowCount() > 0;

$result = ($droit_user || $droit_admin || $droit_superviseur) ? 0 : 0;
print $result;

?>