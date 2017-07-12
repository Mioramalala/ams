<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?><head>
<style>
	.tab{
		font-size: 13px;
		border: 2px solid "#00698D";
		text-align: center;
	}
	.nombre {
		text-align: right;
	}
</style>

</head>

<div align="center">
<label>REVUE ANALYTIQUE ET VERIFICATION DE LA VARIATION DES DEBITEURS ET CREDITEURS DIVERS</label>
<div style="overflow:auto;height:260px;">
<table width="1000px" class="tab">
	<tr bgcolor="#00698D">
		<td width="7%" >Compte</td>
		<td width="7%" >Libellé</td>
		<td width="7%" >Débit</td>
		<td width="7%" >Crédit</td>
		<td width="7%" >Solde N</td>
		<td width="7%" >Solde N-1</td>
		<td width="7%" >Variation</td>
		<td width="7%" >Pourcentages</td>
		<td width="7%" >Commentaires</td>
	</tr>

<!-- <div style="overflow:auto;height:360px;"> -->

			<?php
				include '../../../connexion.php';
		
				$reponse=$bdd->query("select RA_COMPTE, RA_LIBELLE, RA_D, RA_C, RA_SOLDE_N,RA_SOLDE_N1, RA_VARIATION,RA_POURCENTAGE, RA_COMMENTAIRE from tab_ra where RA_CYCLE='dcdivers' AND MISSION_ID=".$mission_id."
				AND (RA_COMPTE LIKE '4%' OR RA_COMPTE LIKE '7%') ORDER BY RA_COMPTE");
		
				while($donnees=$reponse->fetch()){
			?>
					<tr bgcolor="white">
						<td width="3%"><?php echo $donnees['RA_COMPTE'];?></td>
						<td width="7%"><?php echo $donnees['RA_LIBELLE'];?></td>
						<td width="7%" class="nombre"><?php echo number_format((double)$donnees['RA_D'],2,","," ");?></td>
						<td width="7%" class="nombre"><?php echo number_format((double)$donnees['RA_C'],2,","," ");?></td>
						<td width="7%" class="nombre"><?php echo number_format((double)$donnees['RA_SOLDE_N'],2,","," ");?></td>
						<td width="7%" class="nombre"><?php echo number_format((double)$donnees['RA_SOLDE_N1'],2,","," ");?></td>
						
						<td width="7%" class="nombre"><?php echo number_format((double)$donnees['RA_VARIATION'],2,","," ");?></td>
						
						<td width="7%" class="nombre"><?php echo number_format((double)$donnees['RA_POURCENTAGE'],2,","," ");?>%</td>
						<td width="7%"><?php echo $donnees['RA_COMMENTAIRE'];?></td>
					</tr>
			<?php
				}
			?>
			</table>
</div>
			<table class="tab">
			<?php
				$rep=$bdd->query('select * from tab_synthese_ra where SYNTHESE_OBJECTIF="dcdivers" AND MISSION_ID='.$mission_id);
				$data=$rep->fetch();

				$rep2=$bdd->query('select * from tab_conclusion_ra where CONCLUSION_OBJECTIF="dcdivers" AND MISSION_ID='.$mission_id);
				$data2=$rep2->fetch();
			?>
				<tr class="sous-titre">
					<td align="center" bgcolor="#ccc">SYNTHESE</td>
					<td align="center" bgcolor="#ccc">CONCLUSION</td>
				</tr>
				<tr class="sous-titre">
					<td><textarea cols="40" rows="10" id="synthese_dcd" readonly><?php echo $data['SYNTHESE']; ?></textarea></td>
					<td><textarea cols="40" rows="10" id="conclusion_dcd" readonly><?php echo $data2['CONCLUSION']; ?></textarea></td>
				</tr>
				
			</table>

</div>