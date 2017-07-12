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
<label>VALIDATION DES FOURNISSEURS A SOLDE DEBITEUR</label>
<div style="overflow:auto;height:360px;">
<table width="100%" class="tab">
	<tr bgcolor="#00698D" >
		<td width="110px">Compte</td>
		<td width="200px">Libellé</td>
		<td width="100px" >Solde débiteur</td>
		<td width="100px" >Justification</td>	
	</tr>
			<?php
				include '../../../connexion.php';
				$reponse=$bdd->query("select BAL_AUX_COMPTE, BAL_AUX_LIBELLE,BAL_AUX_SOLDE FROM tab_bal_aux where MISSION_ID='.$mission_id.' 
				AND BAL_AUX_COMPTE LIKE '4%' AND BAL_AUX_CYCLE='F- Charges fournisseurs'");
				
				(int)$ligne=1;

				while($donnees=$reponse->fetch()){
				$compte=$donnees['BAL_AUX_COMPTE'];
				$libelle=$donnees['BAL_AUX_LIBELLE'];
				$solde=$donnees['BAL_AUX_SOLDE'];
				if ($solde>0){
					$soldeDebiteur=$solde;
				}
			?>
					<tr bgcolor="white">
						<td width="110px"><?php echo $compte;?></td>
						<td width="200px"><?php echo $libelle;?></td>
						<td width="100px"><?php echo number_format((double)$soldeDebiteur,2,","," ");?></td>
						<?php
							$rep = $bdd->query("SELECT DCD_JUSTIFICATION FROM tab_just_apur_dcd WHERE DCD_OBJECTIF='B' AND 
							DCD_MISSION_ID=".$mission_id." AND DCD_RANG=".$ligne);
							$data = $rep->fetch();
						?>
						<td width="100px"><input type="text" id="<?php echo "justification_".$ligne ?>" value="<?php echo $data['DCD_JUSTIFICATION']; ?>"/></td>
					</tr>
						<input type="hidden" id="<?php echo "compte_".$ligne ?>" value="<?php echo $donnees['BAL_AUX_COMPTE'];?>" />
			<?php
				(int)$ligne = (int)$ligne + 1;
				}
			?>
				<input type="hidden" id="nbLignes" value="<?php echo stripcslashes((int)($ligne-1))?>"/>
			</table>
</div>
</div>