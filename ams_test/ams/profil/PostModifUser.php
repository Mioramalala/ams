<?php
include'../connexion.php';
$idUser=$_POST["id"];

//echo $idUser;

	$sql="SELECT UTIL_NOM,UTIL_LOGIN,UTIL_ACTIF,UTIL_STATUT,UTIL_MDP FROM   tab_utilisateur WHERE UTIL_ID=".$idUser;
		$rep=$bdd->query($sql);
		
		$donnee=$rep->fetch();
		
		
		$nomM=$donnee['UTIL_NOM'];
		$logM=$donnee['UTIL_LOGIN'];
		$actifM=$donnee['UTIL_ACTIF'];
		$statuM=$donnee['UTIL_STATUT'];
		$mdpM=$donnee['UTIL_MDP'];
		
		//echo $nomM.$actifM.$mdpM;

?>
<input type="text" id="nomM" value="<?php echo $nomM ;?>"/>
<input type="text" id="logM" value="<?php echo $logM ;?>"/>
<input type="text" id="actifM" value="<?php echo $actifM ;?>"/>
<input type="text" id="statuM" value="<?php echo $statuM ;?>"/>
<input type="text" id="mdpM" value="<?php echo $mdpM ;?>"/>
<input type="text" id="mdpM" value="<?php echo $mdpM ;?>"/>
<input type="text" id="iduser" value="<?php echo $idUser ;?>"/>