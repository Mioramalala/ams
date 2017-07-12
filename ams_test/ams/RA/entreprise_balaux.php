
<?php
	include'../connexion.php';
	$ese=$_POST['mission_id'];
	$query='SELECT ENTREPRISE_ID from  tab_mission WHERE MISSION_ID='.$ese;
	$reponse = $bdd->query($query);
	$donnees=$reponse->fetch();
	$eseid=$donnees['ENTREPRISE_ID'];
	echo $eseid;

?>