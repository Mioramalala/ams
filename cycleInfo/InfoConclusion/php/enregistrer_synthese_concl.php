<?php
@session_start();
$mission_id=$_SESSION['idMission'];
	$UTIL_ID=$_SESSION['id'];

include '../../../connexion.php';

$commentaire1=utf8_decode($_POST['commentaire1']);
$commentaire2=utf8_decode($_POST['commentaire2']);
$commentaire3=utf8_decode($_POST['commentaire3']);
$commentaire4=utf8_decode($_POST['commentaire4']);

$risque1=$_POST['risque1'];
$risque2=$_POST['risque2'];
$risque3=$_POST['risque3'];
$risque4=$_POST['risque4'];
//$cycleId=$_POST['cycleAchatId'];

//-------------- On teste si un conclusion est deja effectuer -------------------//
$verif=$bdd->query('SELECT count(CONCLUSION_ID) as nb FROM tab_conclusion WHERE (CYCLE_ACHAT_ID="100000000" OR CYCLE_ACHAT_ID="33" OR CYCLE_ACHAT_ID="34" OR CYCLE_ACHAT_ID="") AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];

if ($nombre_resultat > 0)
{
//---------It update the data in the table tab_conclusion if the synthese id exist-------//
$req1="UPDATE tab_conclusion SET CONCLUSION_COMMENTAIRE='$commentaire1',CONCLUSION_RISQUE='$risque1',UTIL_ID='$UTIL_ID' WHERE CYCLE_ACHAT_ID='100000000' AND  MISSION_ID='$mission_id'";
$reponse1 = $bdd->exec($req1);
$req2="UPDATE tab_conclusion SET CONCLUSION_COMMENTAIRE='$commentaire2', CONCLUSION_RISQUE='$risque2',UTIL_ID='$UTIL_ID' WHERE CYCLE_ACHAT_ID='32' AND  MISSION_ID='$mission_id'";
$reponse2 = $bdd->exec($req2);
$req3="UPDATE tab_conclusion SET CONCLUSION_COMMENTAIRE='$commentaire3', CONCLUSION_RISQUE='$risque3',UTIL_ID='$UTIL_ID' WHERE CYCLE_ACHAT_ID='33' AND  MISSION_ID='$mission_id'";
$reponse3 = $bdd->exec($req3);
$req4="UPDATE tab_conclusion SET CONCLUSION_COMMENTAIRE='$commentaire4', CONCLUSION_RISQUE='$risque4',UTIL_ID='$UTIL_ID' WHERE CYCLE_ACHAT_ID='34' AND  MISSION_ID='$mission_id'";
$reponse4 = $bdd->exec($req4);
}
else{
//------------It add the data in the table tab_synthese if the synthese id is not exist--//
$reponse1 = $bdd->exec('INSERT INTO tab_conclusion (CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE, MISSION_ID, CYCLE_ACHAT_ID,UTIL_ID) VALUES ("'.$commentaire1.'","'.$risque1.'",'.$mission_id.',100000000,'.$UTIL_ID.')');
$reponse2 = $bdd->exec('INSERT INTO tab_conclusion (CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE, MISSION_ID, CYCLE_ACHAT_ID,UTIL_ID) VALUES ("'.$commentaire2.'","'.$risque2.'",'.$mission_id.',32,'.$UTIL_ID.')');
$reponse3 = $bdd->exec('INSERT INTO tab_conclusion (CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE, MISSION_ID, CYCLE_ACHAT_ID,UTIL_ID) VALUES ("'.$commentaire3.'","'.$risque3.'",'.$mission_id.',33,'.$UTIL_ID.')');
$reponse4 = $bdd->exec('INSERT INTO tab_conclusion (CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE, MISSION_ID, CYCLE_ACHAT_ID,UTIL_ID) VALUES ("'.$commentaire4.'","'.$risque4.'",'.$mission_id.',34,'.$UTIL_ID.')');

}
?>
