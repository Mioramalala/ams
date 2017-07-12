<?php 
	session_start();
	include '../connexion.php';
	
			
?>


<table>
	<tr>
		<td></td>
		<td></td>
	</tr>
	
	<?php 
	
	$sql="SELECT UTIL_ID,nom_tache FROM tab_distribution_tache where MISSION_ID=".@$_SESSION['idMission'];
		$rep=$bdd->query($sql);
		while($donnee=$rep->fetch()){
			$idUtil=$donnee['UTIL_ID'];
			$nomTache=$donnee['nom_tache']; 
		
		///////////////////////////user req//////////////////////////////////////////
			$userReq=" SELECT UTIL_NOM,UTIL_STATUT from tab_utilisateur where UTIL_ID=".$idUtil;
			$repUser=$bdd->query($userReq);
			$donneeU=$repUser->fetch();
			$UTIL_NOM=$donneeU['UTIL_NOM'];
			$UTIL_STATUT=$donneeU['UTIL_STATUT'];
		?>
	
	<tr>
		<td><?php echo $UTIL_STATUT;?></td>
		<td><?php echo $UTIL_NOM;?></td>
		<td><?php echo $nomTache;?></td>
	</tr>	
	<?php } ?>
</table>

