<?php

include '../../../connexion.php';

$poste_id=$_POST['poste_id'];

$reponse=$bdd->exec('DELETE FROM tab_poste_cycle WHERE POSTE_CLE_ID='.$poste_id.' AND POSTE_CYCLE_NOM="vente"');

?>