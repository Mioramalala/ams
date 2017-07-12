
<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
include '../../../connexion.php';
//J'active le requette qui recupere les données de la table import du balance générale de compte classe 5
	$queryBalance='select id_echantillon_bl,compt_ech_bl,libelle_ech_bl,debit_ech_bl,crd_ech_bl,sold_ech_bl from tab_echantillon_bl where id_mission='.$mission_id.' AND (compt_ech_bl LIKE "5%" AND BL_GEN_CYCLE="E- Tresoreries") GROUP BY compt_ech_bl';
	$reponseBalance=$bdd->query($queryBalance);	
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
	<?php
		$ligne=0;
		while ($donneesBalance=$reponseBalance->fetch()){
	?>
	<tr bgcolor="white">
		<td><input type="Text" id="compteE3<?php echo $ligne; ?>" value="<?php echo $donneesBalance['compt_ech_bl']; ?>" size="20px" disabled="disabled"/></td>
		<?php
			$reponse=$bdd->query("SELECT tab_somme_gl_gen.GL_GEN_SOMME_SOLDE AS SOLDE2, tab_somme_gl_gen.GL_GEN_SOMME_COMPTE AS COMPTE, tab_importer.IMPORT_INTITULES AS INTITULE, tab_importer.IMPORT_SOLDE AS SOLDE1
			FROM tab_somme_gl_gen LEFT JOIN tab_importer ON GL_GEN_SOMME_COMPTE = IMPORT_COMPTES 
			WHERE tab_importer.MISSION_ID =".$mission_id." AND  tab_importer.IMPORT_CYCLE LIKE '%soreries'
			GROUP BY IMPORT_COMPTES");
			
			while($donnees=$reponse->fetch()){
			$cpt = $donnees['COMPTE'];	
		?>
				
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
		}
	?>
		<input type="hidden" id="nbLignes" value="<?php echo $ligne; ?>"/>
</table>
</div>