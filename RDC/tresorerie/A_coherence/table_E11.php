<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

$queryTableD='select SYNTHESE from  tab_rdc_st_ra where MISSION_ID='.$mission_id.' and OBJECTIF="A" and CYCLE="tresorerie" and REFERENCE="E11"';
$reponseTableD=$bdd->query($queryTableD);
$donneesTableD=$reponseTableD->fetch();

?>
<link rel="stylesheet" href="../RDC/tresorerie/css_tresorerie.css">
<div width="100%" style="background-color:white;border:1px solid #6495ED;">
	<label style="font-size:18px;">Revue analytique et vérification de la variation de trésorerie</label>
</div>
<div style="background-color:#6495ED;">
<table width="100%">
	<tr>
		<td width="7%">Compte</td>
		<td width="7%">Libellé</td>
		<td width="7%">Débit</td>
		<td width="7%">Crédit</td>
		<td width="7%">Solde N</td>
		<td width="7%">Solde N-1</td>
		<td width="7%">Variation</td>
		<td width="7%">Pourcentage</td>
		<td width="7%">Commentaire</td>
	</tr>
</table>
</div>
<div style="overflow:auto;height:385px;background-color:#6495ED;">
<table width="100%">
	<?php
		
		$reponse=$bdd->query('select RA_COMPTE, RA_LIBELLE, RA_D, RA_C, RA_SOLDE_N,RA_SOLDE_N1, RA_VARIATION,RA_POURCENTAGE, RA_COMMENTAIRE from tab_ra where MISSION_ID='.$mission_id);
		while($donnees=$reponse->fetch()){
		?>
			<tr bgcolor="white" style="font-size:10px;font-family:Calibri;font-weight:bold;">
				<td width="7%"><?php echo $donnees['RA_COMPTE']; ?></td>
				<td width="7%"><?php echo $donnees['RA_LIBELLE']; ?></td>
				<td width="7%"><?php echo number_format((double)$donnees['RA_D'], 2, ',', ' '); ?></td>
				<td width="7%"><?php echo number_format((double)$donnees['RA_C'], 2, ',', ' '); ?></td>
				<td width="7%"><?php echo number_format((double)$donnees['RA_SOLDE_N'], 2, ',', ' '); ?></td>
				<td width="7%"><?php echo number_format((double)$donnees['RA_SOLDE_N1'], 2, ',', ' '); ?></td>
				<td width="7%"><?php echo number_format((double)$donnees['RA_VARIATION'], 2, ',', ' '); ?></td>
				<td width="7%"><?php echo number_format((double)$donnees['RA_POURCENTAGE'], 2, ',', ' '); ?></td>
				<td width="7%"><?php echo $donnees['RA_COMMENTAIRE']; ?></td>
			</tr>
		<?php
			}
		?>
</table>
		<div width="100%" align="center">
			<label><font color="white"><strong><u>Synthèse</u></strong></font></label><br />
			<textarea rows="20px" cols="100px" id="syntheseE11"><?php echo $donneesTableD['SYNTHESE']; ?></textarea>
		</div>
</div>
