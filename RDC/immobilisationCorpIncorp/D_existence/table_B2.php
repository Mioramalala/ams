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
<div align="center">
<label>Rapprochement fichier d'immobilisations avec la comptabilité</label>
<div style="overflow:auto;height:360px;width:1000px;">
<table width="100%">
	<tr bgcolor="#ccc">
		<tr bgcolor="#ccc">
			<td colspan="4">ETATS FINANCIERS</td>
			<td></td>
			<td  colspan="5">BALANCE GENERALE</td>
			<td></td>
			<td colspan="4">TABLEAU D'AMORTISSEMENT</td>
			<td ></td>
		</tr>
	</tr>
	<tr bgcolor="#ccc">
		<td style="max-width:5%;">Libellé</td>
		<td style="max-width:5%;">V. Brute</td>
		<td style="max-width:5%;">Amortissement</td>
		<td style="max-width:5%;">V.Net</td>
		
		<td></td>
<!-------------------------------- Balance ------------------------------------------>
		<td width="7%">Compte</td>
		<td width="7%">Libellé</td>
		<td width="7%">Débit</td>
		<td width="7%">Crédit</td>
		<td width="7%">Solde</td>
<!--------------------------------  ------------------------------------------>
		
		<td width="1%"></td>

		<td width="7%">Valeur Brute</td>
		<td width="7%">Amortissements cumulés</td>
		<td width="7%">Dotation de l'exercice</td>
		<td width="7%">ECART BG /Tab amort.</td>
	</tr>
	<!-------------------------------- essay boucle for ------------------------------------------>
	<?php 
		
				$reponse=$bdd->query('select IMPORT_COMPTES, IMPORT_INTITULES, IMPORT_DEBIT, IMPORT_CREDIT, IMPORT_SOLDE from tab_importer where IMPORT_CYCLE="B- Immobilisations incorporelles et corporelles"');
		
				while($donnees=$reponse->fetch()) { ?>
		<tr>
			<td><textarea></textarea></td>
			<td><textarea></textarea></td>
			<td><textarea></textarea></td>
			<td><textarea></textarea></td>
			<td></td>
			<!-------------------------------- donnees Balance ------------------------------------------>

			<td style="background: #eee;"><?php echo $donnees['IMPORT_COMPTES'];?></td>
			<td style="background: #eee;"><?php echo $donnees['IMPORT_INTITULES'];?></td>
			<td style="background: #eee;"><?php echo number_format((double)$donnees['IMPORT_DEBIT'],2,","," ");?></td>
			<td style="background: #eee;"><?php  echo number_format((double)$donnees['IMPORT_CREDIT'],2,","," ");?></td>
			<td style="background: #eee;"><?php  echo number_format((double)$donnees['IMPORT_SOLDE'],2,","," ");?></td>
			<!-------------------------------- ------------------------------------------>

			<td></td>
			<td><textarea></textarea></td>
			<td><textarea></textarea></td>
			<td><textarea></textarea></td>
			<td><textarea></textarea></td>
			
		</tr>
	<?php	
	}
	?>
	</table>

</div>
</div>