<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
?>
<div align="center">
<label>RAPPROCHEMENT BANCAIRE</label>
<table width="100%">
	<tr bgcolor="#ccc">
		<td>Compte</td>
		<td>Libellé</td>
		<td>Solde comptable</td>
		<td>Rapprochement bancaire</td>
		<td>Commentaires</td>
	</tr>
	<?php
					include '../../../connexion.php';

					$reponse=$bdd->query("select * from tab_importer WHERE MISSION_ID=".$mission_id."
					AND (IMPORT_COMPTES LIKE '51%' OR IMPORT_CYCLE LIKE '%soreries') GROUP BY IMPORT_COMPTES");
			
			
					$ligne=0;
					while($donnees=$reponse->fetch()){
					$cpt = $donnees['IMPORT_COMPTES'];

	?>
	<tr bgcolor="white">
		<td id="<?php echo "compte_".$ligne?>"><?php echo $donnees['IMPORT_COMPTES'];?></td>
		<td><?php echo $donnees['IMPORT_INTITULES'];?></td>
		<td><?php echo number_format((double)$donnees['IMPORT_SOLDE'], 2, ',', ' '); ?></td>
		
	<?php
					$rp=$bdd->query("select * from tab_e5 WHERE MISSION_ID=".$mission_id." AND COMPTE=".$cpt);	
					$d1 = $rp->fetch();		
	?>
		<td><textarea id="<?php echo "rapprochement_".$ligne?>"><?php echo $d1['RAPPROCHEMENT']; ?></textarea></td>
		<td><textarea id="<?php echo "commentaire_".$ligne?>"><?php echo $d1['COMMENTAIRE']; ?></textarea></td>
	</tr>
	<?php
				$ligne = $ligne + 1;
				}
	?>

	<input type="hidden" id="nbLignes" value="<?php echo $ligne;?>" />
</table>
</div>