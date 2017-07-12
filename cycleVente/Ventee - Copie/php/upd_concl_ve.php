<?php

include '../../../connexion.php';

$commentaire=$_POST['commentaire'];
$risque=$_POST['risque'];
$obj_concl_id_f=$_POST['obj_concl_id_f'];

$reponse=$bdd->exec('UPDATE tab_conclusion SET CONCLUSION_COMMENTAIRE="'.$commentaire.'", CONCLUSION_RISQUE="'.$risque.'" WHERE CONCLUSION_ID='.$obj_concl_id_f);

?>