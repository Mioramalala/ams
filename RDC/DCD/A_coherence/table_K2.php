<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<head>
	<style>
	.tab{
		font-size: 12px;
		border: 2px solid "#00698D";
		text-align: center;
	}
	</style>
</head>
<div align="center">
<label>RAPPROCHEMENT SOLDES GL / BALANCE</label>
<div style="overflow:auto;height:360px;">
<table width="1000px" class="tab">
	<tr bgcolor="#00698D">
		<td width="7%"><b>Compte</b></td>
		<td width="7%"><b>Libellé</b></td>
		<td width="7%"><b>Solde Balance</b></td>
		<td width="7%"><b>Solde GL</b></td>
		<td width="7%"><b>Ecart</b></td>
		<td width="7%"><b>Observations</b></td>
	</tr>
	<?php
				include '../../../connexion.php';
		
				// $reponse=$bdd->query('SELECT GL_GEN_SOMME_SOLDE, GL_GEN_SOMME_COMPTE FROM tab_somme_gl_gen');

				// $reponse2=$bdd->query('SELECT IMPORT_SOLDE, IMPORT_INTITULES FROM tab_importer INNER JOIN tab_somme_gl_gen ON GL_GEN_SOMME_COMPTE = IMPORT_COMPTES WHERE tab_importer.MISSION_ID ='.$mission_id);
				/**$reponse=$bdd->query("SELECT tab_somme_gl_gen.GL_GEN_SOMME_SOLDE AS SOLDE2, tab_somme_gl_gen.GL_GEN_SOMME_COMPTE AS COMPTE, tab_importer.IMPORT_INTITULES AS INTITULE, tab_importer.IMPORT_SOLDE AS SOLDE1
				FROM tab_somme_gl_gen LEFT JOIN tab_importer ON GL_GEN_SOMME_COMPTE = IMPORT_COMPTES 
				 WHERE tab_importer.MISSION_ID =".$mission_id." AND tab_importer.IMPORT_COMPTES LIKE '45%' OR tab_importer.IMPORT_COMPTES LIKE '46%' OR tab_importer.IMPORT_COMPTES LIKE '47%' OR tab_importer.IMPORT_COMPTES LIKE '48%' OR tab_importer.IMPORT_COMPTES LIKE '49%' OR tab_importer.IMPORT_COMPTES LIKE '78%' GROUP BY IMPORT_COMPTES");
				*/
				$reponse2=$bdd->query("SELECT LEFT(tab_importer.IMPORT_COMPTES, 2) as compte,
				 SUM(tab_importer.IMPORT_SOLDE) as solde,
				 tab_balance_general.BALANCE_GENERAL_GROUPES AS intitule
				 
       			FROM tab_importer
       			LEFT JOIN tab_balance_general
       			ON LEFT(tab_importer.IMPORT_COMPTES, 2) = LEFT(tab_balance_general.BALANCE_GENERAL_COMPTE_CONCERNE, 2)
      			WHERE tab_importer.IMPORT_CYCLE = 'K- D&eacute;biteurs et cr&eacute;diteurs divers'
      			AND tab_importer.MISSION_ID =".$mission_id."
      			GROUP BY LEFT(tab_importer.IMPORT_COMPTES, 2)") ;

				$ligne=1;

				while($donnees=$reponse2->fetch()){
				$cpt = $donnees['compte'];
				
			?>
					<tr bgcolor="white">
						<td width="110px"><?php echo $donnees['compte'];?></td>
						<td width="200px"><?php echo $donnees['intitule'];?></td>
						<td width="110px"><?php echo number_format((double)$donnees['solde'],2,","," ");?></td>
						<td width="200px"><?php $solde_gl=$bdd->query("SELECT SUM(tab_gl_genc4.GL_GENC4_SOLDE) as s_gl
				  			FROM tab_gl_genc4 
				  			WHERE LEFT(tab_gl_genc4.GL_GENC4_COMPTES, 2)=".$donnees['compte']."
				  			AND tab_gl_genc4.GL_GENC4_CYCLE='K- D&eacute;biteurs et cr&eacute;diteurs divers' 
				  			AND tab_gl_genc4.MISSION_ID=".$mission_id." GROUP BY LEFT(tab_gl_genc4.GL_GENC4_COMPTES,2)"); 
				  $solde_gl=$solde_gl->fetch();
				  echo $solde_gl['s_gl'] ;?></td>
						<td width="200px"><?php echo number_format((double)($donnees['solde']-$solde_gl['s_gl']),2,","," ");?></td>
						<?php
							$rep=$bdd->query('SELECT OBS_OBSERVATION FROM tab_observation_rdc WHERE OBS_COMPTE='.$cpt);
							$data = $rep->fetch();
						?>
						<td width="100px"><textarea id="<?php echo "observation_".$ligne ?>"><?php echo $data['OBS_OBSERVATION'];?></textarea></td>
					</tr>
						<input type="hidden" id="<?php echo "compte_".$ligne ?>" value="<?php echo $donnees['compte'];?>" />
			<?php
				(int)$ligne = (int)$ligne + 1;
				}
			?>
				<input type="hidden" id="nbLignes" value=<?php echo stripcslashes((int)($ligne-1))?>/>
</table>

</div>
</div>