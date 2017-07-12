<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<div align="center">
<label>REVUE ANALYTIQUE ET VERIFICATION DE LA VARIATION DES IMMOBILISATIONS FINANCIERES</label>
<table width="100%">
	<tr bgcolor="#ccc">
		<td width="7%" height="20px" align="center">Compte</td>
		<td width="7%" align="center">Libellé</td>
		<td width="7%" align="center">Débit</td>
		<td width="7%" align="center">Crédit</td>
		<td width="7%" align="center">Solde N</td>
		<td width="7%" align="center">Solde N-1</td>
		<td width="7%" align="center">Variation</td>
		<td width="7%" align="center">Pourcentage</td>
		<td width="7%" align="center">Commentaire</td>
</table>
<div style="overflow:auto;height:360px;">
<table width="100%">
	<?php
		include '../../../connexion.php';
		
		$reponse=$bdd->query("select RA_COMPTE, RA_LIBELLE, RA_D, RA_C, RA_SOLDE_N,RA_SOLDE_N1, RA_VARIATION,RA_POURCENTAGE, RA_COMMENTAIRE from tab_ra where RA_COMPTE like '26%' OR RA_COMPTE like '27%'
		OR RA_COMPTE like '296%' OR RA_COMPTE like '297%' OR RA_COMPTE like '78%' AND RA_CYCLE='immofi'
		AND MISSION_ID=".$mission_id);
		while($donnees=$reponse->fetch()){
		$compte=$donnees['RA_COMPTE'];
					$intitule=$donnees['RA_LIBELLE'];
					$debit=$donnees['RA_D'];
					$credit=$donnees['RA_C'];
					$soldeN=$donnees['RA_SOLDE_N'];
					$soldeN1=$donnees['RA_SOLDE_N1'];
					$variation=$donnees['RA_VARIATION'];
					$pourcentage=$donnees['RA_POURCENTAGE'];
					$commentaire=$donnees['RA_COMMENTAIRE'];
			?>
					<tr bgcolor="white">
						<td width="3%"><?php echo $compte;?></td>
						<td width="7%"><?php echo $intitule;?></td>
						<td width="7%"><?php if(empty($debit)){}else{echo number_format($debit, 2, '.', ' ');}?></td>
						<td width="7%"><?php if(empty($credit)){}else{echo number_format($credit, 2, '.', ' ');}?></td>
						<td width="7%"><?php if(empty($soldeN)){}else{echo number_format($soldeN, 2, '.', ' ');}?></td>
						<td width="7%"><?php if(empty($soldeN1)){}else{echo number_format($soldeN1, 2, '.', ' ');}?></td>
						<td width="7%"><?php if(empty($variation)){}else{echo number_format($variation, 2, '.', ' ');}?></td>
						<td width="7%"><?php echo $pourcentage;?>%</td>
						<td width="7%"><?php echo $commentaire?></td>
					</tr>
			<?php
				}
			?>
   </table>
</div>
</div>