<div>

</div><?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

$queryTableD='select SYNTHESE, CONCLUSION from  tab_rdc_st_ra where MISSION_ID='.$mission_id.' and OBJECTIF="A" and CYCLE="tresorerie" and REFERENCE="E1"';
$reponseTableD=$bdd->query($queryTableD);
$donneesTableD=$reponseTableD->fetch();

?>
<link rel="stylesheet" href="../RDC/stock/css_stock.css">
<style>
.chiffre {
	text-align : right;
	padding-right : 5px;
}
td {
	border : 1px solid #999;
}
</style>
<div width="500px" style="background-color:white;border:1px solid #6495ED;">
	<label style="font-size:16px;">REVUE ANALYTIQUE ET VERIFICATION DE LA VARIATION DE TRESORERIE (E1)</label>
</div>
	<div style="overflow:auto;width:90%;background-color:#6495ED;height:250px;">
	<div style="background-color:#6495ED;width:100%;">
		<table width="100%" style="">
			<thead>
				<tr style="height:30px;">
						<th height="20px" align="center">Compte</th>
						<th align="center">Libellé</th>
						<th align="center">Débit</th>
						<th align="center">Crédit</th>
						<th align="center">Solde N</th>
						<th align="center">Solde N-1</th>
						<th align="center">Variation</th>
						<th align="center">Pourcentage</th>
						<th align="center">Commentaire</th>
				</tr>
			</thead>
			<tbody>
			<?php
				
				$reponse=$bdd->query('select RA_COMPTE, RA_LIBELLE, RA_D, RA_C, RA_SOLDE_N,RA_SOLDE_N1, RA_VARIATION,RA_POURCENTAGE, RA_COMMENTAIRE from tab_ra where RA_COMPTE like "5%" AND MISSION_ID='.$mission_id.' and RA_CYCLE ="tresorerie"'." ORDER BY RA_COMPTE");
				
				while($donnees=$reponse->fetch()){
				?>
				<tr bgcolor="white" style="font-size:12px;font-family:Calibri;font-weight:bold;">
					<td><?php echo $donnees['RA_COMPTE']; ?></td>
					<td><?php echo $donnees['RA_LIBELLE']; ?></td>
					<td class="chiffre"><?php echo number_format((double)$donnees['RA_D'], 2, ',', ' '); ?></td>
					<td class="chiffre"><?php echo number_format((double)$donnees['RA_C'], 2, ',', ' '); ?></td>
					<td class="chiffre"><?php echo number_format((double)$donnees['RA_SOLDE_N'], 2, ',', ' '); ?></td>
					<td class="chiffre"><?php echo number_format((double)$donnees['RA_SOLDE_N1'], 2, ',', ' '); ?></td>
					<td class="chiffre"><?php echo number_format((double)$donnees['RA_VARIATION'], 2, ',', ' '); ?></td>
					<td class="chiffre"><?php echo number_format((double)$donnees['RA_POURCENTAGE'], 2, ',', ' '); ?>%</td>
					<td><?php echo $donnees['RA_COMMENTAIRE']; ?></td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<div>
	<table bgcolor="#6495ED" width="920px">
		<tr align="center">
			<td>
				<label><font color="white"><u>Synthèse</u></font></label><br />
				<textarea rows="5px" cols="50px" id="syntheseE1" readonly><?php echo $donneesTableD['SYNTHESE']; ?></textarea>
			</td>
			<td>
				<label><font color="white"><u>Conclusion</u></font></label><br />
				<textarea rows="5px" cols="50px" id="conclusionE1" readonly><?php echo $donneesTableD['CONCLUSION']; ?></textarea>
			</td>
		</tr>
	</table>
</div>
	