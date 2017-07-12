<?php 
$mission_id=$_POST['mission_id'];
$poste_id=$_POST['poste_id'];
$ligne=$_POST['ligne'];

include '../../../connexion.php';

$reponse = $bdd->query('SELECT FONCT_ACHAT_A_ID FROM tab_fonction_achat_a WHERE MISSION_ID='.$mission_id.' AND POSTE_CYCLE_ID='.$poste_id.' AND FONCT_ACHAT_A_LIGNE='.$ligne);

$donnees=$reponse->fetch();

if($donnees['FONCT_ACHAT_A_ID']==0)
echo '0';
else 
echo $donnees['FONCT_ACHAT_A_ID'];

?>