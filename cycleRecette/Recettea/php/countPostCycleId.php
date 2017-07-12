 <?php
 
 include '../../../connexion.php';
 
 $mission_id=$_POST['mission_id'];
 
 $reponse=$bdd->query('SELECT COUNT(POSTE_CYCLE_ID) AS COMPTE FROM tab_poste_cycle WHERE MISSION_ID='.$mission_id.' AND POSTE_CYCLE_NOM="recette"');

$donnees=$reponse->fetch();

$cpt=$donnees['COMPTE'];

echo $cpt; 
  ?>