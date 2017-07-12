<?php

/**
 * Enregistrer un id mission et un id entreprise (pour la partie reporting)
 *
 * @author Niaina
 */

session_start();
if (isset($_SESSION['idMission'])) {
    // session_unset($_SESSION['idMission']);
    session_destroy($_SESSION['idMission']);
} else {
    $_SESSION['idMission'] = $_POST['idMis'];
}
?>
