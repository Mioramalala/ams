<?php

 include '../../../connexion.php';

$entrepriseId=$_POST['entrepriseId'];

$reponse=$bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE tab_poste_cle.ENTREPRISE_ID='.$entrepriseId.' AND POSTE_CYCLE_NOM="stock"');

$cpt=0;

$result=1;



while($donnees=$reponse->fetch()){

	$query='SELECT COUNT(FONCT_A_ID) AS COMPTE FROM (tab_fonct_a INNER JOIN tab_poste_cycle ON tab_fonct_a.POSTE_CYCLE_ID=tab_poste_cycle.POSTE_CYCLE_ID) INNER JOIN tab_poste_cle ON tab_poste_cycle.POSTE_CLE_ID=tab_poste_cle.POSTE_CLE_ID  WHERE POSTE_CLE_NOM="'.$donnees['POSTE_CLE_NOM'].'" AND tab_poste_cycle.ENTREPRISE_ID='.$entrepriseId.' AND POSTE_CYCLE_NOM="stock"';
	$reponse1=$bdd->query($query);

	$donnees1=$reponse1->fetch();

	$cpt=$donnees1['COMPTE'];

	if($cpt==0){
		$result=0;
		break;
	}
}
// echo 'SELECT COUNT(FONCT_ACHAT_A_ID) AS COMPTE FROM (tab_fonction_achat_a INNER JOIN tab_poste_cycle ON tab_fonction_achat_a.POSTE_CYCLE_ID=tab_poste_cycle.POSTE_CYCLE_ID) INNER JOIN tab_poste_cle ON tab_poste_cycle.POSTE_CLE_ID=tab_poste_cle.POSTE_CLE_ID  WHERE POSTE_CLE_NOM="'.$donnees['POSTE_CLE_NOM'].'" AND tab_poste_cycle.ENTREPRISE_ID='.$entrepriseId;
echo $result;

?>