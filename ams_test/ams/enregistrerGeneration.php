<?php

/*
 * Enregistrer les informations de la génération rapport
 * Author: Niaina
 */

include 'connexion.php';
$idEntreprise = $_POST['idEnt'];
$typeGeneration = $_POST['typeGen'];
//$bdd->exec('DELETE FROM tab_generation_rapport WHERE ID_ENTREPRISE='.$idEntreprise.' AND TYPE_GENERATION LIKE '.$typeGeneration);
$d1 = $bdd->prepare('DELETE FROM tab_generation_rapport WHERE ID_ENTREPRISE=:id AND TYPE_GENERATION LIKE :type');
$d1->execute(array(
    'id' => $idEntreprise,
    'type' => $typeGeneration
));
//if ($typeGeneration == 'affirmation')
//$bdd->exec('INSERT INTO tab_generation_rapport(ID_ENTREPRISE, DATE_GENERATION, TYPE_GENERATION) VALUES('.$idEntreprise.','.$DATE_GENERATION.',"affirmation")');

$d = $bdd->prepare('INSERT INTO tab_generation_rapport(ID_ENTREPRISE, DATE_GENERATION, TYPE_GENERATION) VALUES(:id,DATE_FORMAT(now(), \'%d-%m-%Y\'),:type)');
$d->execute(array(
    'id' => $idEntreprise,
    'type' => $typeGeneration
));

?>
