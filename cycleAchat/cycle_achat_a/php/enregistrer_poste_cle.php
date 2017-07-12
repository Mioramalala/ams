<?php

include '../../../connexion.php';

$entrepriseId=$_POST['eseId'];
$nom_poste=$_POST['nom_poste'];
$titulaire=$_POST['titulaire'];
$UTIL_ID = $_SESSION['id'];

$repVerif=$bdd->query('SELECT POSTE_CLE_ID FROM tab_poste_cle WHERE ENTREPRISE_ID='.$entrepriseId.' AND POSTE_CLE_NOM="'.$nom_poste.'"');
$donnees=$repVerif->fetch();
$id=$donnees['POSTE_CLE_ID'];

if($id==0){
	$reponse=$bdd->exec('INSERT INTO tab_poste_cle (POSTE_CLE_NOM, POSTE_CLE_TITULAIRE, ENTREPRISE_ID, UTIL_ID) VALUES ("'.$nom_poste.'","'.$titulaire.'",'.$entrepriseId.', '.$UTIL_ID.')');
	echo 0;
}
else{
	echo 1;
}

?>