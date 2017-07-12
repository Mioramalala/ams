<?php
@session_start();
$mission_id=$_SESSION['idMission'];
?>
<html>
	<head>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<script type="text/javascript">
		$(function(){
				$('#enregistrer_page').click(function(){
				$('#progressbarRACycle').show();
				});
			});
	</script>
	</head>
	<body>
	<!------------------------------------------bal gen-------------------------------------------->
		<label>Contrôle de cohérence des balance générale:</label>
			<table  width="400" border="1">
				<tr>
					<td width="400" style="background-color:blue;"><label style="color:white">Balance Générale</td>
				</tr>
				<tr>
					<td width="100"><label>Somme Débit N</label></td>
					<td width="100"><label>Somme Crédit N</label></td>
					<td width="100"><label>Somme Débit N-1</label></td>
					<td width="100"><label>Somme Crédit N-1</label></td>
				</tr>
				
				<?php
				///////////////////////////////////////////////bal gen////////////////////////////////////////
				include '../connexion.php';
				$req='SELECT E1.IMPORT_ID,SUM(E1.IMPORT_DEBIT)as total_debitN,SUM(E1.IMPORT_CREDIT)as total_creditN,SUM(E2.IMPORT_DEBIT)as total_debitN1,SUM(E2.IMPORT_CREDIT)as total_creditN1 FROM tab_importer E1,tab_importer E2
				WHERE E2.MISSION_ID='.$mission_id;
				$reponse=$bdd->query($req);
				//print $req;
				
				$donnees=$reponse->fetch();
					$import_debitN=$donnees['total_debitN'];
					$import_creditN=$donnees['total_creditN'];
					
					$import_debitN1=$donnees['total_debitN1'];
					$import_creditN1=$donnees['total_creditN1'];
					
					$totalN=$import_debitN-$import_creditN;
					$totalN1=$import_debitN1-$import_creditN1;
				?>
				<tr>
					
					<td class="" width="100" id="import_debitN"><?php echo $import_debitN;?> </td>
					<input type="text" id="import_debitN" value="<?php echo $import_debitN;?>" style="display:none;"/>
					
					<td class="" width="100" id="import_creditN"><?php echo $import_creditN;?> </td>
					<input type="text" id="import_creditN" value="<?php echo $import_creditN;?>" style="display:none;"/>
					
					<td class="" width="100" id="import_debitN1"><?php echo $import_debitN1;?> </td>
					<input type="text" id="import_debitN1" value="<?php echo $import_debitN1;?>" style="display:none;"/>
					
					<td class="" width="100" id="import_creditN1"><?php echo $import_creditN1;?> </td>
					<input type="text" id="import_creditN1" value="<?php echo $import_creditN1;?>" style="display:none;"/>
					
				</tr>
				
				<tr>
					<td class="" width="200" id="totalN"><?php echo $totalN;?> </td>
					<input type="text" id="totalN" value="<?php echo $totalN;?>" style="display:none;"/>
					
					<td class="" width="200" id="totalN1"><?php echo $totalN1;?> </td>
					<input type="text" id="totalN1" value="<?php echo $totalN1;?>" style="display:none;"/>
				</tr>
			</table></br>
			
			
			
			<table  width="400" border="1">
				<tr>
					<td width="400" style="background-color:blue;"><label style="color:white">Balance auxiliaire</td>
				</tr>
				<tr>
					<td width="100"><label>Somme Débit N</label></td>
					<td width="100"><label>Somme Crédit N</label></td>
					<td width="100"><label>Somme Débit N-1</label></td>
					<td width="100"><label>Somme Crédit N-1</label></td>
				</tr>
			
				<?php
					
				///////////////////////////////////////////bal aux////////////////////////////////////////////
				include '../connexion.php';
				$req1='SELECT E1.BAL_AUX_ID,SUM(E1.BAL_AUX_DEBIT)as total_bal_aux_debitN,SUM(E1.BAL_AUX_CREDIT)as total_bal_aux_creditN,SUM(E2.BAL_AUX_DEBIT)as total_bal_aux_debitN1,SUM(E2.BAL_AUX_DEBIT)as total_bal_aux_creditN1 FROM tab_bal_aux E1,tab_bal_aux E2
				WHERE E2.MISSION_ID='.$mission_id;
				$reponse1=$bdd->query($req1);
				//print $req;
				
				$donnees1=$reponse1->fetch();
					$bal_aux_debitN=$donnees1['total_bal_aux_debitN'];
					$bal_aux_creditN=$donnees1['total_bal_aux_creditN'];
					
					$bal_aux_debitN1=$donnees1['total_bal_aux_debitN1'];
					$bal_aux_creditN1=$donnees1['total_bal_aux_creditN1'];
					
					$total_bal_auxN=$bal_aux_debitN-$bal_aux_creditN;
					$total_bal_auxN1=$bal_aux_debitN1-$bal_aux_creditN1;	
				?>
				
				<tr>
					<td class="" width="100" id="bal_aux_debitN"><?php echo $bal_aux_debitN;?> </td>
					<input type="text" id="bal_aux_debitN" value="<?php echo $bal_aux_debitN;?>" style="display:none;"/>
					
					<td class="" width="100" id="bal_aux_creditN"><?php echo $bal_aux_creditN;?> </td>
					<input type="text" id="bal_aux_creditN" value="<?php echo $bal_aux_creditN;?>" style="display:none;"/>
					
					<td class="" width="100" id="bal_aux_debitN1"><?php echo $bal_aux_debitN1;?> </td>
					<input type="text" id="bal_aux_debitN1" value="<?php echo $bal_aux_debitN1;?>" style="display:none;"/>
					
					<td class="" width="100" id="bal_aux_creditN1"><?php echo $bal_aux_creditN1;?> </td>
					<input type="text" id="bal_aux_creditN1" value="<?php echo $bal_aux_creditN1;?>" style="display:none;"/>
					
				</tr>
				
				<tr>	
					<td class="" width="200" id="total_bal_auxN"><?php echo $total_bal_auxN;?> </td>
					<input type="text" id="total_bal_auxN" value="<?php echo $total_bal_auxN;?>" style="display:none;"/>
					
					<td class="" width="200" id="total_bal_auxN1"><?php echo $total_bal_auxN1;?> </td>
					<input type="text" id="total_bal_auxN1" value="<?php echo $total_bal_auxN1;?>" style="display:none;"/>
				</tr>
			</table><br/>
			
			<label>Balance Générale</label>
			<table  width="800" border="1" style="overflow:auto;height:100px;">
				<tr>
					<td width="100"><label>Comptes</label></td>
					<td width="200"><label>Libellés</label></td>
					<td width="200"><label>Solde N</label></td>
					<td width="200"><label>Solde N-1</label></td>
					<td width="100"><label>Variation</label></td>
				</tr>
			<?php
				include '../connexion.php';
				$com1=0;
				$req2="SELECT E1.IMPORT_ID,E1.IMPORT_COMPTES,E1.IMPORT_INTITULES,E1.IMPORT_SOLDE as soldeN,E2.IMPORT_SOLDE as soldeN1 FROM tab_importer E1,tab_importer E2
				WHERE E2.MISSION_ID=".$mission_id;
				$reponse2=$bdd->query($req2);
				
				while($donnees2=$reponse2->fetch()){
					$import_compte=$donnees2['IMPORT_COMPTES'];
					$import_libelle=$donnees2['IMPORT_INTITULES'];
					$import_soldeN=$donnees2['soldeN'];
					$import_SoldeN1=$donnees2['soldeN1'];
					$import_variataion=$import_soldeN-$import_SoldeN1;
				?>
				<tr>
				
					
					<td class="" width="100" id="import_compte"><?php echo $import_compte;?> </td>
					<input type="text" id="import_compte<?php echo $com1;?>" value="<?php echo $import_compte;?>" style="display:none;"/>
					
					<td class="" width="100" id="import_libelle"><?php echo $import_libelle;?> </td>
					<input type="text" id="import_libelle<?php echo $com1;?>" value="<?php echo $import_libelle;?>" style="display:none;"/>
					
					<td class="" width="100" id="import_soldeN"><?php echo $import_soldeN;?> </td>
					<input type="text" id="import_soldeN<?php echo $com1;?>" value="<?php echo $import_soldeN;?>" style="display:none;"/>
					
					<td class="" width="100" id="import_SoldeN1"><?php echo $import_SoldeN1;?> </td>
					<input type="text" id="import_SoldeN1<?php echo $com1;?>" value="<?php echo $import_SoldeN1;?>" style="display:none;"/>
					
					<td class="" width="100" id="import_variataion"><?php echo $import_variataion;?> </td>
					<input type="text" id="import_variataion<?php echo $com1;?>" value="<?php echo $import_variataion;?>" style="display:none;"/>
			
				</tr>
				<?php
					$com1++;
					}
			?>
				
			</table></br>
			<div id="progressbarRACycle" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
		<center><img src="../img/Loader.gif" /></center>
	</div>
	</body>
</html>