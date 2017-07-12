<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
?>

<div align="center">
<label>RAPPROCHEMENT SOLDES GRAND-LIVRE / BALANCE GENERALE DES COMPTES DE VIREMENTS INTERNES</label>
<table width="100%">
	<tr bgcolor="#ccc">
		<td>Compte</td>
		<td>Libellé</td>
		<td>Solde<br />grand livre(1)</td>
		<td>Solde balance<br />général(2)</td>
		<td>Ecart<br />(1)-(2)</td>
		<td>Obsérvations</td>
	</tr>
	<tr bgcolor="white">
	<?php
				include '../../../connexion.php';

				$reponse=$bdd->query("SELECT tab_somme_gl_gen.GL_GEN_SOMME_SOLDE AS SOLDE2, tab_somme_gl_gen.GL_GEN_SOMME_COMPTE AS COMPTE, tab_importer.IMPORT_INTITULES AS INTITULE, tab_importer.IMPORT_SOLDE AS SOLDE1
				FROM tab_somme_gl_gen LEFT JOIN tab_importer ON GL_GEN_SOMME_COMPTE = IMPORT_COMPTES 
				WHERE tab_importer.MISSION_ID =".$mission_id." AND tab_importer.IMPORT_COMPTES LIKE '58%' OR tab_importer.IMPORT_CYCLE LIKE '%soreries'
				GROUP BY IMPORT_COMPTES");

				$ligne=0;

				while($donnees=$reponse->fetch()){
				$cpt = $donnees['COMPTE'];
				
			?>
					<tr bgcolor="white">
						<td id="<?php echo "compte_".$ligne ?>" ><?php echo $donnees['COMPTE'];?></td>
						<td><?php echo $donnees['INTITULE'];?></td>
						<td><?php echo number_format((double)$donnees['SOLDE1'], 2, ',', ' '); ?></td>
						<td><?php echo number_format((double)$donnees['SOLDE2'], 2, ',', ' '); ?></td>
						<td><?php echo (number_format((double)$donnees['SOLDE1'], 2, ',', ' ')-number_format((double)$donnees['SOLDE2'], 2, ',', ' '));?></td>
						<?php
							$rep=$bdd->query('SELECT OBSERVATION FROM tab_e7 WHERE COMPTE='.$cpt);
							$data = $rep->fetch();
						?>
						<td width="100px"><textarea id="<?php echo "observation_".$ligne ?>"><?php echo $data['OBSERVATION'];?></textarea></td>
					</tr>

			<?php
				(int)$ligne = (int)$ligne + 1;
				}
			?>
				<input type="hidden" id="nbLignes" value="<?php echo $ligne; ?>"/>
	</tr>
</table>
</div>