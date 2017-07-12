<?php 
$poste_id=$_POST['poste_id'];
$ligne=$_POST['ligne'];

include '../../../connexion.php';

// $reponse = $bdd->exec('UPDATE tab_fonction_achat_a SET FONCT_ACHAT_A_RESULT='.$result.' WHERE FONCT_ACHAT_A_ID='.$fonct_achat_A_id)
$reponse=$bdd->exec('DELETE FROM tab_fonction_achat_a WHERE POSTE_CYCLE_ID='.$poste_id.' AND FONCT_ACHAT_A_LIGNE='.$ligne);

?>