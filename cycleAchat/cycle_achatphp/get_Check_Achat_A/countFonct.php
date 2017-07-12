 <?php
 
 include '../../../connexion.php';
 
 $mission_id=$_POST['mission_id'];
 
 $reponse=$bdd->query('SELECT COUNT(FONCT_ACHAT_A_ID) AS COMPTE FROM tab_fonction_achat_a WHERE MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$cpt=$donnees['COMPTE'];

echo $cpt; 
  ?>