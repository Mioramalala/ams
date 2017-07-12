<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<div align="center">
<label>RAPPROCHEMENT SOLDES GL / BALANCE / AUXILIAIRE						
</label>
<div style="overflow:auto;height:360px;">
<table width="100%">
	<tr bgcolor="#ccc">
		<td width="7%">Compte</td>
		<td width="7%">Libellé</td>
		<td width="7%">Solde Balance</td>
		<td width="7%">Solde GL</td>
		<td width="7%">Solde Balance auxiliaire</td>
		<td width="7%">Ecart(1)-(2)</td>
		<td width="7%">Observations</td>
		<td width="7%">Ecart(1)-(3)</td>
		<td width="7%">Observations</td>
	</tr>
	<?php
				include '../../../connexion.php';
				
				$reponse=$bdd->query('SELECT tab_importer.IMPORT_SOLDE	AS SOLDE1, tab_importer.IMPORT_COMPTES AS COMPTE, tab_importer.IMPORT_INTITULES AS INTITULE, tab_somme_gl_gen.GL_GEN_SOMME_SOLDE AS SOLDE2, tab_bal_aux.BAL_AUX_SOLDE AS SOLDE3
				FROM tab_somme_gl_gen LEFT OUTER JOIN tab_importer ON tab_somme_gl_gen.GL_GEN_SOMME_COMPTE = tab_importer.IMPORT_COMPTES LEFT OUTER JOIN tab_bal_aux ON tab_bal_aux.BAL_AUX_SOLDE = tab_importer.IMPORT_COMPTES
				WHERE tab_importer.IMPORT_CYCLE="G- Produits Clients" AND tab_importer.MISSION_ID ='.$mission_id );
				
				$ligne=1;

				while($donnees=$reponse->fetch()){
			?>
					<tr bgcolor="white">
						<td width="110px"><?php echo $donnees['COMPTE'];?></td>
						<td width="200px"><?php echo $donnees['INTITULE'];?></td>
						<td width="110px"><?php echo number_format((double)$donnees['SOLDE1'], 2, '.', ' ');?></td>
						<td width="200px"><?php echo number_format((double)$donnees['SOLDE2'], 2, '.', ' ');?></td>
						<td width="200px"><?php echo number_format((double)$donnees['SOLDE3'], 2, '.', ' ');?></td>
						<td width="200px"><?php echo (number_format((double)$donnees['SOLDE1'], 2, '.', ' ')-number_format((double)$donnees['SOLDE2'], 2, '.', ' '));?></td>
						<td width="100px"><input type="text" id=<?php echo "observation1_".$ligne ?>/></td>
						<td width="200px"><?php echo (number_format((double)$donnees['SOLDE1'], 2, '.', ' ')-number_format((double)$donnees['SOLDE3'], 2, '.', ' '));?></td>
						<td width="100px"><input type="text" id=<?php echo "observation2_".$ligne ?>/></td>
					</tr>
						<input type="hidden" id=<?php echo "compte_".$ligne ?> value=<?php echo $donnees['COMPTE'];?> />
			<?php
				(int)$ligne = (int)$ligne + 1;
				}
			?>
				<input type="hidden" id="nbLignes" value=<?php echo stripcslashes((int)($ligne-1))?>/>
</table>

</div>
</div>