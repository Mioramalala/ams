<?php
@session_start();

		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../../../"; #using $project_path
	
	/*
	end #Jimmy
	*/
 /*
 if some day need the sql back-up to active, just use the following variable
 */
 $backup_sql="";
 
 /*
 Agent de alertant l'utilisateur qu'il à été deconnécté
 */
 
include "$project_path/agent_connex_detection.php";
include "$project_path/connexion.php";

$mission_id=@$_SESSION['idMission'];
?>
<style>
#tet{
  margin-left:-17px;
  margin-top:20px;
  border-collapse:collapse;
  }
#tettd{
   border:1px solid #ccc;
   background-color:#0074bf;
   color:#fff;
  }
</style>
<div align="center">
<label>RAPPROCHEMENT SOLDES GL / BALANCE / AUXILIAIRE								
</label>
<div style="overflow:auto;height:360px;">
<table width="100%" id="tet">
	<tr id="tettd">
		<td width="50" size="50">Compte</td>
		<td width="150" size="50">Libellé</td>
		<td width="100" size="50">Solde Balance(1)</td>
		<td width="100" size="50">Solde GL(2)</td>
		<td width="100" size="50">Solde Balance auxiliaire(3)</td>
		<td width="100" size="50">Ecart(1)-(2)</td>
		<td width="100" size="50">Observations</td>
		<td width="100" size="50">Ecart(1)-(3)</td>
		<td width="100" size="50">Observations</td>
	</tr>

	<?php
		
		$reponse=$bdd->query('SELECT tab_importer.IMPORT_SOLDE	AS SOLDE1, tab_importer.IMPORT_COMPTES AS COMPTE, tab_importer.IMPORT_INTITULES AS INTITULE, tab_somme_gl_gen.GL_GEN_SOMME_SOLDE AS SOLDE2, tab_bal_aux.BAL_AUX_SOLDE AS SOLDE3
		FROM tab_somme_gl_gen LEFT OUTER JOIN tab_importer ON tab_somme_gl_gen.GL_GEN_SOMME_COMPTE = tab_importer.IMPORT_COMPTES LEFT OUTER JOIN tab_bal_aux ON tab_bal_aux.BAL_AUX_SOLDE = tab_importer.IMPORT_COMPTES
		WHERE tab_importer.IMPORT_CYCLE="G- Produits Clients" AND tab_importer.MISSION_ID ='.$mission_id );
		
		$compte=0;

		while($donnees=$reponse->fetch()){
	?>
		<tr bgcolor="white">
			<td width="50" size="50"><input type="text" id="id_compte_<?php echo $compte?>" value="<?php echo
			$donnees['COMPTE'];?>"/></td>
			<td width="150" size="50"><input type="text" id="id_intitule_<?php echo $compte?>" value="<?php echo $donnees['INTITULE'];?>"/></td>
			<td width="100" size="50"><input type="text" id="id_solde1_<?php echo $compte?>" value="<?php echo
			number_format((double)$donnees['SOLDE1'], 2, '.', ' ');?>"/></td>
			<td width="100" size="50"><input type="text" id="id_solde2_<?php echo $compte?>" value="<?php echo number_format((double)$donnees['SOLDE2'], 2, '.', ' ');?>"/></td>
			<td width="100" size="50"><input type="text" id="id_solde3_<?php echo $compte?>" value="<?php echo number_format((double)$donnees['SOLDE3'], 2, '.', ' ');?>"/></td>
			<td width="100" size="50"><input type="text" id="id_res1_<?php echo $compte?>" value="<?php echo (number_format((double)$donnees['SOLDE1'], 2, '.', ' ')-number_format((double)$donnees['SOLDE2'], 2, '.', ' '));?>"/></td>
			<td width="100" size="50"><input type="text" id="id_observation1_<?php echo $compte?>"/></td>
			<td width="100" size="50"><input type="text" id="id_res2_<?php echo $compte?>" value="<?php echo (number_format((double)$donnees['SOLDE1'], 2, '.', ' ')-number_format((double)$donnees['SOLDE3'], 2, '.', ' '));?>"/></td>
			<td width="100" size="50"><input type="text" id="id_observation2_<?php echo $compte?>"/></td>
		</tr>
			<?php
				$compte++;
				}
			?>
			 <input type ="text" id="makacompte" value="<?php echo $compte?>" style="display:none;"/>
</table>

</div>
</div>