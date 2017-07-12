<?php
session_start();
include '../../../connexion.php';

$bdd->exec('DELETE FROM tab_g7');

?>