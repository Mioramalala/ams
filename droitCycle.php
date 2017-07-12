 <?php
/**
 * Created by PhpStorm.
 * User: tmsc
 * Date: 05/04/2016
 * Time: 09:41
 */

include 'connexion.php';
// $MISSION_ID = $_SESSION['MISSION_ID'];
/**
session MISSION_ID innexistant dans Projet > mission > RDC > fonds_propores > Immobilisations corporelles et incorporelles, changé en idMission
**/
$MISSION_ID = $_SESSION['idMission'];
/**
l'index UTIL_ID n'est jamais retrouvé dans Projet > mission > RDC > fonds_propores > Immobilisations corporelles et incorporelles
**/
$UTIL_ID = $_SESSION['id'];
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
print $droit_user;
print $droit_admin;
print $droit_superviseur;
?>