<?php 

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT MAX(QUESTION_ID) AS COMPTE FROM tab_objectif WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=7');

$donnees=$reponse->fetch();

$ligne=$donnees['COMPTE'];

//tinay editer: 
// if($ligne=="") echo $ligne=0;
// else
//     echo $ligne;

if($ligne==""){
	echo $ligne=0;
}else{
    echo $ligne;
}

?>