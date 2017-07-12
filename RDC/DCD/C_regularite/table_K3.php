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
<label>JUSTIFICATION ET APUREMENT DES DCD</label>
<div style="overflow:auto;height:360px;">
<table width="100%" class="tab">
	<tr bgcolor="#00698D" >
		<td width="110px">COMPTE</td>
		<td width="200px">LIBELLE</td>
		<td width="100px" >SOLDE</td>
		<td width="100px" >JUSTIFICATION</td>
		<td width="100px">CIRCULARISATION</td>
		<td width="100px">APUREMENT EN N+1</td>
		<td width="100px">OBSERVATIONS</td>		
	</tr>
			<?php
				include '../../../connexion.php';
		
				$reponse=$bdd->query("select IMPORT_COMPTES, IMPORT_INTITULES, IMPORT_SOLDE FROM tab_importer where MISSION_ID=".$mission_id." 
				AND (IMPORT_COMPTES LIKE '460110%' OR IMPORT_COMPTES LIKE '466130%' OR IMPORT_COMPTES LIKE '467000%' 
				OR IMPORT_COMPTES LIKE '467000%' OR IMPORT_COMPTES LIKE '467222%' OR IMPORT_COMPTES LIKE '467226%'
				OR IMPORT_COMPTES LIKE '467227%' OR IMPORT_COMPTES LIKE '467228%' OR IMPORT_COMPTES LIKE '467231%'
				OR IMPORT_COMPTES LIKE '467310%' OR IMPORT_COMPTES LIKE '467906%' OR IMPORT_COMPTES LIKE '468630%')");

				(int)$ligne=1;

				while($donnees=$reponse->fetch()){
			?>
					<tr bgcolor="white">
						<td width="110px"><?php echo $donnees['IMPORT_COMPTES'];?></td>
						<td width="200px"><?php echo $donnees['IMPORT_INTITULES'];?></td>
						<td width="100px"><?php echo number_format((double)$donnees['IMPORT_SOLDE'],2,","," ");?></td>
						
						<?php
							$rep = $bdd->query("SELECT DCD_JUSTIFICATION,DCD_CIRCULARISATION,DCD_APUREMENT_N1,DCD_OBSERVATION FROM tab_just_apur_dcd WHERE DCD_OBJECTIF='C' AND 
							DCD_MISSION_ID=".$mission_id." AND DCD_RANG=".$ligne);
							$data = $rep->fetch();
						?>
						
						<td width="100px"><input type="text" id="<?php echo "justification_".$ligne ?>" value="<?php echo $data['DCD_JUSTIFICATION']; ?>"/></td>
						<td width="100px"><input type="text" id="<?php echo "circularisation_".$ligne ?>"  value="<?php echo $data['DCD_CIRCULARISATION']; ?>"/></td>
						<td width="100px"><input type="text" id="<?php echo "apurement_".$ligne ?>" value="<?php echo $data['DCD_APUREMENT_N1']; ?>"/></td>
						<td width="100px"><input type="text" id="<?php echo "observation_".$ligne ?>" value="<?php echo $data['DCD_OBSERVATION']; ?>"/></td>
					</tr>
						<input type="hidden" id="<?php echo "compte_".$ligne ?>" value="<?php echo $donnees['IMPORT_COMPTES'];?>" />
			<?php
				(int)$ligne = (int)$ligne + 1;
				}
			?>
				<input type="hidden" id="nbLignes" value="<?php echo stripcslashes((int)($ligne-1))?>"/>
			</table>
</div>
</div>