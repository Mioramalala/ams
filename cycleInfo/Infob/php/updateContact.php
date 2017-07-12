<?php

@session_start();
include '../../../connexion.php';
$mission_id= $_SESSION['idMission'];

$question_id=$_POST['question_id'];
$val1=$_POST['val1'];
$val2=$_POST['val2'];
$val3=$_POST['val3'];
$UTIL_ID=$_SESSION['id'];

// tinay editer
/*
<!-- Prendre les ids par ordre d'insertion:
		1e: effectif
		2è: drègres
		3è: effectif
	-->
*/

	$rep= $bdd->query(' SELECT `id` FROM `tab_sys_info1` WHERE `MISSION_ID`= "' .$mission_id .'" ORDER BY id ASC');
	$count= 1;
	while($data= $rep->fetch()){
		if($count == 1){
			$reponse = $bdd->exec('UPDATE tab_sys_info1 SET VAL = "'.$val1.'", UTIL_ID="'.$UTIL_ID.'" WHERE id="' .$data['id'] .'"' );
		}else if($count == 2){
			$reponse = $bdd->exec('UPDATE tab_sys_info1 SET VAL = "'.$val2.'", UTIL_ID="'.$UTIL_ID.'" WHERE id="' .$data['id'] .'"' );
		}else if($count == 3){
			$reponse = $bdd->exec('UPDATE tab_sys_info1 SET VAL = "'.$val3.'", UTIL_ID="'.$UTIL_ID.'" WHERE id="' .$data['id'] .'"' );
		}

		$count++;
	}
	if($reponse) echo 'enregistrer';
?>