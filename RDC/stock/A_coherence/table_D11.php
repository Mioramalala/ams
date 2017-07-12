<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

$queryTableD='select SYNTHESE, CONCLUSION from  tab_rdc_st_ra where MISSION_ID='.$mission_id.' and OBJECTIF="A" and CYCLE="stock" and REFERENCE="D11"';
$reponseTableD=$bdd->query($queryTableD);
$donneesTableD=$reponseTableD->fetch();

?>
<link rel="stylesheet" href="../RDC/stock/css_stock.css">
<div width="500px" style="background-color:white;border:1px solid #6495ED;">
	<label style="font-size:16px;">Revue analytique et vérification de la variation des stocks</label>
</div>
	<div style="overflow:auto;width:920px;background-color:#6495ED;height:300px;">
	<div style="background-color:#6495ED;width:900px;">		
		<table border="1" width="1750px">
			<tr style="height:10px;">
				<td colspan="2"></td>
				<td colspan="4" style="color:white;text-align:center;">N</td>
				<td colspan="2" style="color:white;text-align:center;">N-1</td>
				<td colspan="4" style="color:white;text-align:center;">Variation</td>
				<td></td>
			</tr>
			<tr style="height:10px;">
				<td style="color:white;text-align:center;">Comptes</td>
				<td style="color:white;text-align:center;">Libellés</td>
				<td style="color:white;text-align:center;">Débit</td>
				<td style="color:white;text-align:center;">Crédit</td>
				<td colspan="2" style="color:white;text-align:center;">Soldes</td>
				<td style="color:white;text-align:center;">Soldes D</td>
				<td style="color:white;text-align:center;">Soldes C</td>
				<td colspan="2" style="color:white;text-align:center;">Variation</td>
				<td colspan="2" style="color:white;text-align:center;">Pourcentage</td>
				<td style="color:white;text-align:center;">Commentaires</td>
			</tr>
			<tr style="height:10px;">
				<td width="230px"></td>
				<td width="230px"></td>
				<td width="125px"></td>
				<td width="125px"></td>
				<td width="125px" style="color:white;text-align:center;">D</td>
				<td width="125px" style="color:white;text-align:center;">C</td>
				<td width="125px" style="color:white;text-align:center;"></td>
				<td width="125px" style="color:white;text-align:center;"></td>
				<td width="125px" style="color:white;text-align:center;">D</td>
				<td width="125px" style="color:white;text-align:center;">C</td>
				<td width="125px" style="color:white;text-align:center;">D</td>
				<td width="125px" style="color:white;text-align:center;">C</td>
				<td width="240px"></td>
			</tr>
		</table>
		<table width="1750px">
			<?php
				
				$reponse=$bdd->query('select RA_COMPTE, RA_LIBELLE, RA_D, RA_C, RA_SD_N, RA_SC_N, RA_SD_N1, RA_SC_N1, RA_SD_VARIATION, RA_SC_VARIATION, RA_POURCENTAGE_D, RA_POURCENTAGE_C, RA_COMMENTAIRE from  tab_ra where MISSION_ID='.$mission_id.' and RA_CYCLE ="stock"');
				
				while($donnees=$reponse->fetch()){
				?>
				<tr bgcolor="white" style="font-size:12px;font-family:Calibri;font-weight:bold;">
					<td width="195px"><?php echo $donnees['RA_COMPTE']; ?></td>
					<td width="195px"><?php echo $donnees['RA_LIBELLE']; ?></td>
					<td width="107px"><?php echo $donnees['RA_D']; ?></td>
					<td width="107px"><?php echo $donnees['RA_C']; ?></td>
					<td width="107px"><?php echo $donnees['RA_SD_N']; ?></td>
					<td width="107px"><?php echo $donnees['RA_SC_N']; ?></td>
					<td width="107px"><?php echo $donnees['RA_SD_N1']; ?></td>
					<td width="107px"><?php echo $donnees['RA_SC_N1']; ?></td>
					<td width="107px"><?php echo $donnees['RA_SD_VARIATION']; ?></td>
					<td width="107px"><?php echo $donnees['RA_SC_VARIATION']; ?></td>
					<td width="107px"><?php echo $donnees['RA_POURCENTAGE_D']; ?></td>
					<td width="107px"><?php echo $donnees['RA_POURCENTAGE_C']; ?></td>
					<td width="210px"><?php echo $donnees['RA_COMMENTAIRE']; ?></td>
				</tr>
				<?php
				}
				?>
		</table>
	</div>
	</div>
<div align="center">
	<table bgcolor="#6495ED" width="920px">
		<tr align="center">
			<td>
				<label><font color="white"><u>Synthèse</u></font></label><br />
				<textarea rows="5px" cols="50px" id="syntheseD11"><?php echo $donneesTableD['SYNTHESE']; ?></textarea>
			</td>
			<td>
				<label><font color="white"><u>Conclusion</u></font></label><br />
				<textarea rows="5px" cols="50px" id="conclusionD11"><?php echo $donneesTableD['CONCLUSION']; ?></textarea>
			</td>
		</tr>
	</table>
</div>
	