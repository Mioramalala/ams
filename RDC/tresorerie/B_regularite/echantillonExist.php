<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$queryId='select id_echantillon_GL from tab_ehantillon_gl where GL_GEN_CYCLE="E- Tresoreries" and id_mission='.$mission_id;
$reponseId=$bdd->query($queryId);
$donneesId=$reponseId->fetch();

echo $donneesId['id_echantillon_GL'];

?>