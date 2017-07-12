<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

$queryTableD='select SYNTHESE, CONCLUSION from  tab_rdc_st_ra where MISSION_ID='.$mission_id.' and OBJECTIF="A" and CYCLE="stock" and REFERENCE="D1"';
$reponseTableD=$bdd->query($queryTableD);
$donneesTableD=$reponseTableD->fetch();

?>
<link rel="stylesheet" href="../RDC/stock/css_stock.css">
<div width="500px" style="background-color:white;border:1px solid #6495ED;">
	<label style="font-size:16px;">REVUE ANALYTIQUE ET VERIFICATION DE LA VARIATION DES STOCKS(D1)</label>
</div>
	<div style="overflow:auto;width:920px;background-color:#6495ED;height:250px;">
	<div style="background-color:#6495ED;width:900px;">		
		<table border="1" width="1000px">
			<tr style="height:30px;">
					<td width="7%" height="20px" align="center">Compte</td>
					<td width="7%" align="center">Libellé</td>
					<td width="7%" align="center">Débit</td>
					<td width="7%" align="center">Crédit</td>
					<td width="7%" align="center">Solde N</td>
					<td width="7%" align="center">Solde N-1</td>
					<td width="7%" align="center">Variation</td>
					<td width="7%" align="center">Pourcentage</td>
					<td width="7%" align="center">Commentaire</td>
				</tr>
		</table>
		<table width="1000px">
			<?php
				
				$reponse=$bdd->query('select RA_COMPTE, RA_LIBELLE, RA_D, RA_C, RA_SOLDE_N,RA_SOLDE_N1, RA_VARIATION,RA_POURCENTAGE, RA_COMMENTAIRE from tab_ra where (RA_COMPTE like "3%" OR RA_COMPTE like "603%" OR RA_COMPTE like "71%") AND MISSION_ID='.$mission_id.' AND RA_CYCLE ="stock"'." ORDER BY RA_COMPTE");
				
				while($donnees=$reponse->fetch()){
				?>
				<tr bgcolor="white" style="font-size:12px;font-family:Calibri;font-weight:bold;">
					<td width="7%"><?php echo $donnees['RA_COMPTE']; ?></td>
					<td width="7%"><?php echo $donnees['RA_LIBELLE']; ?></td>
					<td width="7%"><?php echo number_format((double)$donnees['RA_D'], 2, ',', ' '); ?></td>
					<td width="7%"><?php echo number_format((double)$donnees['RA_C'], 2, ',', ' '); ?></td>
					<td width="7%"><?php echo number_format((double)$donnees['RA_SOLDE_N'], 2, ',', ' '); ?></td>
					<td width="7%"><?php echo number_format((double)$donnees['RA_SOLDE_N1'], 2, ',', ' '); ?></td>
					<td width="7%"><?php echo number_format((double)$donnees['RA_VARIATION'], 2, ',', ' '); ?></td>
					<td width="7%"><?php echo number_format((double)$donnees['RA_POURCENTAGE'], 2, ',', ' '); ?>%</td>
					<td width="7%"><?php echo $donnees['RA_COMMENTAIRE']; ?></td>
				</tr>
				<?php
				}
				?>
		</table>
	</div>
</div>
<div>
	<table bgcolor="#6495ED" width="920px">
		<tr align="center">
			<td>
				<label><font color="white"><u>Synthèse</u></font></label><br />
				<textarea rows="5px" cols="50px" id="syntheseD1" readonly><?php echo $donneesTableD['SYNTHESE']; ?></textarea>
			</td>
			<td>
				<label><font color="white"><u>Conclusion</u></font></label><br />
				<textarea rows="5px" cols="50px" id="conclusionD1" readonly><?php echo $donneesTableD['CONCLUSION']; ?></textarea>
			</td>
		</tr>
	</table>
</div>
	