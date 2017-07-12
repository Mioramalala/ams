<?php 

include '../connexion.php';
@session_start();
$mission_id=$_SESSION['idMission'];
?>

<html>
	<head>
	<link rel="stylesheet" type="text/css" href="RA/css_RA.css">
	<script type="text/javascript">
	
		function save_commentaire(mission_id, pour, commentaire) {
			$.ajax({
				type    : 'POST',
				url     : 'RA/controle_coherence/save_commentaire.php',
				data    : {
					mission_id  : <?php echo $mission_id;?>,
					pour        : pour,
					commentaire : commentaire
				},
				success : function(e){
				}
			});	
		}
		
		function get_commentaire(mission_id, pour, callback) {
			$.ajax({
				type    : 'POST',
				url     : 'RA/controle_coherence/get_commentaire.php',
				dataType  : 'json',
				data    : {
					mission_id  : <?php echo $mission_id;?>,
					pour        : pour
				},
				success : function(e){
					callback(typeof e.commentaire !== 'undefined' ? e.commentaire : '');
				},
				error : function(e){
					//alert('Error : ' + e);
				}
			});	
		}
		
		function getTousCommentaires() {
			get_commentaire(<?php echo $mission_id;?>, 'fournisseur', function(commentaire) {
				document.getElementById('commentaire_fournisseur').value = commentaire;
			});
			get_commentaire(<?php echo $mission_id;?>, 'client', function(commentaire) {
				document.getElementById('commentaire_client').value = commentaire;
			});
			get_commentaire(<?php echo $mission_id;?>, 'autres', function(commentaire) {
				document.getElementById('commentaire_autres').value = commentaire;
			});
		}
		
		$(function(){
			$('#enregistrer_page').click(function(){
				$('#progressbarRACycle').show();
			});
			$('#id_visiuliser_bal').click(function(){
				alert("mijery");
				//$('#progressbarRACycle').show();
				$('#tab_visualiser').show();
			});
			
			$('#enregistrer_page').click(function(){
				$('#progressbarRACycle').show();
			});
			
			$('#btn_retour').click(function(){
				//$('#contenue').load('RA/_fenetre_uploadifram.php?mission_id='+<?php echo $mission_id; ?>);
				$('#contenue').load('RA/etats_financiers.php');	
				
				save_commentaire(<?php echo $mission_id;?>, 'fournisseur', document.getElementById('commentaire_fournisseur').value);
				save_commentaire(<?php echo $mission_id;?>, 'client', document.getElementById('commentaire_client').value);
				save_commentaire(<?php echo $mission_id;?>, 'autres', document.getElementById('commentaire_autres').value);
			});
			getTousCommentaires();
		});
		
		/*
		function getSum(fichier, comptes, rang_debit, rang_credit, callback) {
			
			$.ajax({
				type     : 'POST',
				url      : 'RA/get_data_BG_BA.php',
				dataType : 'json',
				data     : {
					fichier     : fichier,
					comptes     : comptes, 
					rang_debit  : rang_debit,
					rang_credit : rang_credit
				},
				success  : function(e){
					callback(e.sum);
				},
				error    : function(msg) {
					//alert("Error : " + msg);
				}
			});	
		}
		
		getSum("archive/exemple.xls", "401", 2, 3, function(sum) {
			alert(sum);
		});
		*/
	</script>
	<style type="text/css">
		.tab_coherence.tab_upload td, #dd td {
		    text-align: right;
		}
		thead {
			color : white;
			background-color:#2ca3f3;
		}
		textarea {
			width : 100%;
			border : 0px solid #000;
		}
	</style>
	</head>
	<body>
	<br/>
		<input id="btn_retour" type="button" class="bouton-blanc" value="Retour" style = "float:right;"/>
		<div id="afficher_grand_livre" style="border:2px solid silver;width:1000;height:450;overflow:auto">
		<!------------------------------------------bal gen-------------------------------------------->
		<label><b>Contrôle de coh&eacute;rence des balances g&eacute;n&eacute;rales:</b></label>
			<table  width="800" border="1" id="dd">
				<tr>
					<td width="800" style="background-color:#2ca3f3;"><label style="color:white; font-weight:bold; text-align=center">Balance Générale</td>
				</tr>
			</table>
			<table class="tab_coherence tab_upload" width="800" border="1" id="dd">
				<tr>
					<td width="200"><label>Somme Débit N</label></td>
					<td width="200"><label>Somme Crédit N</label></td>
					<td width="200"><label>Somme Débit N-1</label></td>
					<td width="200"><label>Somme Crédit N-1</label></td>
				</tr>
				
				<?php
				///////////////////////////////////////////////bal gen N//////////////////////////////////////////////////
				$req='SELECT IMPORT_ID,SUM(IMPORT_DEBIT)as total_debitN,SUM(IMPORT_CREDIT)as total_creditN FROM tab_importer 
				WHERE IMPORT_CHOIX_ANNEE="N" AND MISSION_ID='.$mission_id;
				$reponse=$bdd->query($req);
				//print $req;
				
				$donnees=$reponse->fetch();
					$import_debitN=$donnees['total_debitN'];
					$import_creditN=$donnees['total_creditN'];
					
					$totalN=$import_debitN-$import_creditN;
					
				///////////////////////////////////////////////bal gen N-1//////////////////////////////////////////////////
				$reqN1='SELECT IMPORTN1_ID,SUM(IMPORTN1_DEBIT)as total_debitN1,SUM(IMPORTN1_CREDIT)as total_creditN1 FROM tab_importern1 
				WHERE MISSION_ID='.$mission_id;
				$reponse0=$bdd->query($reqN1);
				$donnees0=$reponse0->fetch();
					$import_debitN1=$donnees0['total_debitN1'];
					$import_creditN1=$donnees0['total_creditN1'];
					$totalN1=$import_debitN1-$import_creditN1;
				?>
				<tr>
					<td class="" width="200" id="import_debitN"><?php echo number_format((double)$import_debitN, 2, ',', ' '); ?></td>
					<input type="text" id="import_debitN" value="<?php echo $import_debitN;?>" style="display:none;text-align:right"/>
					
					<td class="" width="200" id="import_creditN"><?php echo number_format((double)$import_creditN, 2, ',', ' '); ?> </td>
					<input type="text" id="import_creditN" value="<?php echo $import_creditN;?>" style="display:none;text-align:right"/>
					
					<td class="" width="200" id="import_debitN1"><?php echo number_format((double)$import_debitN1, 2, ',', ' '); ?></td>
					<input type="text" id="import_debitN1" value="<?php echo $import_debitN1;?>" style="display:none;text-align:right"/>
					
					<td class="" width="200" id="import_creditN1"><?php echo number_format((double)$import_creditN1, 2, ',', ' '); ?></td>
					<input type="text" id="import_creditN1" value="<?php echo $import_creditN1;?>" style="display:none;text-align:right"/>
					
				</tr>
				</table>
			<table class="tab_coherence tab_upload"  width="800" border="1" id="dd">
				<tr>
					<td class="" width="400" id="totalN"><?php echo number_format((double)$totalN, 2, ',', ' '); ?></td>
					<input type="text" id="totalN" value="<?php echo $totalN;?>" style="display:none;text-align:right"/>
					
					<td class="" width="400" id="totalN1"><?php echo number_format((double)$totalN1, 2, ',', ' '); ?></td>
					<input type="text" id="totalN1" value="<?php echo $totalN1;?>" style="display:none;text-align:right"/>
				</tr>
			</table></br>
		
			<?php
			///////////////////////////////////////////////bal gen N => 401/409//////////////////////////////////////////////////
			$req="SELECT IMPORT_ID,SUM(IMPORT_DEBIT)as total_debitN,SUM(IMPORT_CREDIT)as total_creditN FROM tab_importer 
			WHERE IMPORT_CHOIX_ANNEE='N' AND MISSION_ID=".$mission_id." AND (IMPORT_COMPTES LIKE '401%' OR IMPORT_COMPTES LIKE '409%')";
			$reponse=$bdd->query($req);
			//print $req;
			
			$donnees=$reponse->fetch();
				$import_debit_bg_fourn  = $donnees['total_debitN'];
				$import_credit_bg_fourn = $donnees['total_creditN'];
				
				$total_bg_fourn = $import_debit_bg_fourn - $import_credit_bg_fourn;
				
			///////////////////////////////////////////////bal gen N => 410/411//////////////////////////////////////////////////
			$req="SELECT IMPORT_ID,SUM(IMPORT_DEBIT)as total_debitN,SUM(IMPORT_CREDIT)as total_creditN FROM tab_importer 
			WHERE IMPORT_CHOIX_ANNEE='N' AND MISSION_ID=".$mission_id." AND (IMPORT_COMPTES LIKE '410%' OR IMPORT_COMPTES LIKE '411%')";
			$reponse=$bdd->query($req);
			//print $req;
			
			$donnees=$reponse->fetch();
				$import_debit_bg_client  = $donnees['total_debitN'];
				$import_credit_bg_client = $donnees['total_creditN'];
				
				$total_bg_client = $import_debit_bg_client - $import_credit_bg_client;
				
			///////////////////////////////////////////////bal gen N => 45/46//////////////////////////////////////////////////
			$req="SELECT IMPORT_ID,SUM(IMPORT_DEBIT)as total_debitN,SUM(IMPORT_CREDIT)as total_creditN FROM tab_importer 
			WHERE IMPORT_CHOIX_ANNEE='N' AND MISSION_ID=".$mission_id." AND (IMPORT_COMPTES LIKE '45%' OR IMPORT_COMPTES LIKE '46%')";
			$reponse=$bdd->query($req);
			//print $req;
			
			$donnees=$reponse->fetch();
				$import_debit_bg_autres  = $donnees['total_debitN'];
				$import_credit_bg_autres = $donnees['total_creditN'];
				
				$total_bg_autres = $import_debit_bg_autres - $import_credit_bg_autres;
				
			///////////////////////////////////////////////bal gen N => 401/409//////////////////////////////////////////////////
			$req="SELECT SUM(BAL_AUX_DEBIT)as total_debitN,SUM(BAL_AUX_CREDIT)as total_creditN FROM tab_bal_aux 
			WHERE BAL_AUX_CHOIX_ANNEE='N' AND MISSION_ID=".$mission_id." AND (BAL_AUX_COMPTE LIKE '401%' OR BAL_AUX_COMPTE LIKE '409%')";
			$reponse=$bdd->query($req);
			//print $req;
			
			$donnees=$reponse->fetch();
				$import_debit_ba_fourn  = $donnees['total_debitN'];
				$import_credit_ba_fourn = $donnees['total_creditN'];
				
				$total_ba_fourn = $import_debit_ba_fourn - $import_credit_ba_fourn;
				
			///////////////////////////////////////////////bal gen N => 401/409//////////////////////////////////////////////////
			$req="SELECT SUM(BAL_AUX_DEBIT)as total_debitN,SUM(BAL_AUX_CREDIT)as total_creditN FROM tab_bal_aux 
			WHERE BAL_AUX_CHOIX_ANNEE='N' AND MISSION_ID=".$mission_id." AND (BAL_AUX_COMPTE LIKE '410%' OR BAL_AUX_COMPTE LIKE '411%')";
			$reponse=$bdd->query($req);
			//print $req;
			
			$donnees=$reponse->fetch();
				$import_debit_ba_client  = $donnees['total_debitN'];
				$import_credit_ba_client = $donnees['total_creditN'];
				
				$total_ba_client = $import_debit_ba_client - $import_credit_ba_client;
				
			///////////////////////////////////////////////bal gen N => 401/409//////////////////////////////////////////////////
			$req="SELECT SUM(BAL_AUX_DEBIT)as total_debitN,SUM(BAL_AUX_CREDIT)as total_creditN FROM tab_bal_aux 
			WHERE BAL_AUX_CHOIX_ANNEE='N' AND MISSION_ID=".$mission_id." AND (BAL_AUX_COMPTE LIKE '45%' OR BAL_AUX_COMPTE LIKE '46%')";
			$reponse=$bdd->query($req);
			//print $req;
			
			$donnees=$reponse->fetch();
				$import_debit_ba_autres  = $donnees['total_debitN'];
				$import_credit_ba_autres = $donnees['total_creditN'];
				
				$total_ba_autres = $import_debit_ba_autres - $import_credit_ba_autres;
				
			?>
			<label><b>Coh&eacute;rence des balances g&eacute;n&eacute;rales et auxiliaires:</b></label>
			<table class="tab_coherence tab_upload"  width="800" border="1" id="dd">
				<thead>
					<tr>
						<th></th>
						<th>Balance G&eacute;n&eacute;rale (1)</th>
						<th>Balance Auxilliaire (2)</th>
						<th>Ecart (1)-(2)</th>
						<th>Commentaire</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Fournisseurs</td>
						<td id="fournisseur_bg"><?php echo number_format($total_bg_fourn, 2, '.', ' '); ?></td>
						<td id="fournisseur_ba"><?php echo number_format($total_ba_fourn, 2, '.', ' '); ?></td>
						<td id="fournisseur_ec"><?php echo number_format($total_bg_fourn - $total_ba_fourn, 2, '.', ' '); ?></td>
						<td><textarea id="commentaire_fournisseur"></textarea></td>
					</tr>
					<tr>
						<td>Clients</td>
						<td id="client_bg"><?php echo number_format($total_bg_client, 2, '.', ' '); ?></td>
						<td id="client_ba"><?php echo number_format($total_ba_client, 2, '.', ' '); ?></td>
						<td id="client_ec"><?php echo number_format($total_bg_client - $total_ba_client, 2, '.', ' '); ?></td>
						<td><textarea id="commentaire_client"></textarea></td>
					</tr>
					<tr>
						<td>Autres</td>
						<td id="autre_bg"><?php echo number_format($total_bg_autres, 2, '.', ' '); ?></td>
						<td id="autre_ba"><?php echo number_format($total_ba_autres, 2, '.', ' '); ?></td>
						<td id="autre_ec"><?php echo number_format($total_bg_autres - $total_ba_autres, 2, '.', ' '); ?></td>
						<td><textarea id="commentaire_autres"></textarea></td>
					</tr>
				</tbody>
			</table></br>
			<!--<input type="button" value="enregistrer les commentaires" id="enreg_comment" />-->
			<!----------------------------------------------bal aux------------------------------------------------------->
			<!--
			<label><b>Contrôle de cohérence des balances auxiliaires:</b></label>
			<table  width="800" border="1">
				<tr>
					<td width="800" style="background-color:#2ca3f3;"><label style="color:white; font-weight:bold; text-align=center">Balance auxiliaire</td>
				</tr>
			</table>
			<table  width="800" border="1" id="dd">
				<tr>
					<td width="200"><label>Somme Débit N</label></td>
					<td width="200"><label>Somme Crédit N</label></td>
					<td width="200"><label>Somme Débit N-1</label></td>
					<td width="200"><label>Somme Crédit N-1</label></td>
				</tr>
			
				<?php
					
				///////////////////////////////////////////////bal aux N////////////////////////////////////////
				include '../connexion.php';
				$req1='SELECT BAL_AUX_ID,SUM(BAL_AUX_DEBIT)as total_bal_aux_debitN,SUM(BAL_AUX_CREDIT)as total_bal_aux_creditN FROM tab_bal_aux 
				WHERE BAL_AUX_CHOIX_ANNEE="N" AND MISSION_ID='.$mission_id;
				$reponse1=$bdd->query($req1);
				ini_set('memory_limit', '256M');
				//print $req;
				
				$donnees1=$reponse1->fetch();
					$bal_aux_debitN=$donnees1['total_bal_aux_debitN'];
					$bal_aux_creditN=$donnees1['total_bal_aux_creditN'];
					$total_bal_auxN=$bal_aux_debitN-$bal_aux_creditN;
					
				///////////////////////////////////////////////bal aux N-1////////////////////////////////////////
				 $req11='SELECT BAL_AUXN1_ID,SUM(BAL_AUXN1_DEBIT)as total_bal_aux_debitN1,SUM(BAL_AUXN1_CREDIT)
				 as total_bal_aux_creditN1 FROM tab_bal_auxn1 WHERE MISSION_ID='.$mission_id;
				//$req11='SELECT BAL_AUXN1_ID,SUM(BAL_AUXN1_DEBIT)as total_bal_aux_debitN1,SUM(BAL_AUXN1_CREDIT)as total_bal_aux_creditN1 FROM tab_bal_auxn1 
				//AND MISSION_ID='.$mission_id;
				$reponse11=$bdd->query($req11);
				ini_set('memory_limit', '256M');
				//print $req;
				
				$donnees11=$reponse11->fetch();	
					
					$bal_aux_debitN1=$donnees11['total_bal_aux_debitN1'];
					$bal_aux_creditN1=$donnees11['total_bal_aux_creditN1'];
					$total_bal_auxN1=$bal_aux_debitN1-$bal_aux_creditN1;	
					
				///////////////////////////////////////////////importer document////////////////////////////////////////	
				$import_document="";
					$reponse_doc=$bdd->query("SELECT IMPORT_DOCUMENT FROM tab_importer WHERE MISSION_ID=".$mission_id);
					
					$res_doc=$reponse_doc->fetch();
					$import_document=$res_doc['IMPORT_DOCUMENT'];
						
				?>
				
				<tr>
					<td class="" width="200" id="bal_aux_debitN"><?php echo number_format((double)$bal_aux_debitN, 2, ',', ' '); ?></td>
					<input type="text" id="bal_aux_debitN" value="<?php echo $bal_aux_debitN;?>" style="display:none;text-align:right"/>
					
					<td class="" width="200" id="bal_aux_creditN"><?php echo number_format((double)$bal_aux_creditN, 2, ',', ' '); ?> </td>
					<input type="text" id="bal_aux_creditN" value="<?php echo $bal_aux_creditN;?>" style="display:none;text-align:right"/>
					
					<td class="" width="200" id="bal_aux_debitN1"><?php echo number_format((double)$bal_aux_debitN1, 2, ',', ' '); ?></td>
					<input type="text" id="bal_aux_debitN1" value="<?php echo $bal_aux_debitN1;?>" style="display:none;text-align:right"/>
					
					<td class="" width="200" id="bal_aux_creditN1"><?php echo number_format((double)$bal_aux_creditN1, 2, ',', ' '); ?></td>
					<input type="text" id="bal_aux_creditN1" value="<?php echo $bal_aux_creditN1;?>" style="display:none;text-align:right"/>
					
				</tr>
				</table>
				<table  width="800" border="1" id="dd">
				<tr>	
					<td class="" width="200" id="total_bal_auxN"><?php echo number_format((double)$total_bal_auxN, 2, ',', ' '); ?></td>
					<input type="text" id="total_bal_auxN" value="<?php echo $total_bal_auxN;?>" style="display:none;text-align:right"/>
					
					<td class="" width="200" id="total_bal_auxN1"><?php echo number_format((double)$total_bal_auxN1, 2, ',', ' '); ?></td>
					<input type="text" id="total_bal_auxN1" value="<?php echo $total_bal_auxN1;?>" style="display:none;text-align:right"/>
				</tr>
			</table>
			-->
			<br/>
			
			<center><label><b>Balance Générale </b></label></center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo '<a href="RA/archive/'.$import_document.'" target="_blank">'.$import_document.'</a>'; ?>
			
			<!--/div>
			<div id="tab_visualiser" style="width:500px;height:20px;overflow:auto;color:red"-->
				<table class="tab_coherence tab_upload"  width="800" border="1" style="overflow:auto;height:100px">
					<tr>
						<td width="100" style="background-color:#2ca3f3;"><label style="color:white; font-weight:bold; text-align=center">Comptes</label></td>
						<td width="200" style="background-color:#2ca3f3;"><label style="color:white; font-weight:bold; text-align=center">Libellés</label></td>
						<td width="200" style="background-color:#2ca3f3;"><label style="color:white; font-weight:bold; text-align=center">Solde N</label></td>
						<td width="200" style="background-color:#2ca3f3;"><label style="color:white; font-weight:bold; text-align=center">Solde N-1</label></td>
						<td width="200" style="background-color:#2ca3f3;"><label style="color:white; font-weight:bold; text-align=center">Variation</label></td>
					</tr>
				<?php
					include '../connexion.php';	
					$Variation="";
										$com1=0;
					$import_compte=0;
//					$req2="SELECT DISTINCT(E2.IMPORT_COMPTES),E2.IMPORT_ID,E2.IMPORT_INTITULES,E1.IMPORT_SOLDE as soldeN1,E2.IMPORT_SOLDE as soldeN,E1.IMPORT_CHOIX_ANNEE,E2.IMPORT_CHOIX_ANNEE,(E2.IMPORT_SOLDE-E1.IMPORT_SOLDE)as Valeur FROM tab_importer E1, tab_importer E2
//					WHERE E1.IMPORT_COMPTES = E2.IMPORT_COMPTES AND E2.MISSION_ID=".$mission_id." AND E1.IMPORT_CHOIX_ANNEE='N-1' AND E2.IMPORT_CHOIX_ANNEE='N'";
					
					$req2 = "
					SELECT * FROM
					(SELECT (IMPORT_SOLDE-IMPORTN1_SOLDE) AS VARIATION, IMPORTN1_COMPTES AS COMPTE, IMPORTN1_SOLDE, IMPORT_SOLDE, IMPORT_INTITULES AS INTITULE
					FROM tab_importern1
					INNER JOIN tab_importer ON tab_importern1.IMPORTN1_COMPTES = tab_importer.IMPORT_COMPTES
					AND tab_importern1.MISSION_ID = tab_importer.MISSION_ID
					AND tab_importer.MISSION_ID=".$mission_id."

					UNION

					SELECT COALESCE(IMPORT_SOLDE,0) AS VARIATION, IMPORT_COMPTES AS COMPTE, COALESCE(IMPORTN1_SOLDE,0), COALESCE(IMPORT_SOLDE,0), IMPORT_INTITULES AS INTITULE
					FROM tab_importern1
					RIGHT JOIN tab_importer ON tab_importern1.IMPORTN1_COMPTES = tab_importer.IMPORT_COMPTES
					AND tab_importern1.MISSION_ID = tab_importer.MISSION_ID
					WHERE tab_importern1.IMPORTN1_COMPTES IS NULL  
					AND tab_importer.MISSION_ID=".$mission_id."

					UNION

					SELECT COALESCE(-IMPORTN1_SOLDE,0) AS VARIATION, IMPORTN1_COMPTES AS COMPTE, COALESCE(IMPORTN1_SOLDE,0) , COALESCE(IMPORT_SOLDE,0) , IMPORTN1_INTITULES AS INTITULE
					FROM tab_importern1
					LEFT JOIN tab_importer ON tab_importern1.IMPORTN1_COMPTES = tab_importer.IMPORT_COMPTES
					AND tab_importern1.MISSION_ID = tab_importer.MISSION_ID
					WHERE tab_importer.IMPORT_COMPTES IS NULL 
					AND tab_importern1.MISSION_ID=".$mission_id.") AS T1

					GROUP BY COMPTE
					";

					$reponse2=$bdd->query($req2);
					$sum_soldeN=0;
					$sum_soldeN1=0;
					while($donnees2=$reponse2->fetch()){
						$import_compte=$donnees2['COMPTE'];
						$import_libelle=$donnees2['INTITULE'];
						$import_soldeN=$donnees2['IMPORT_SOLDE'];
						$import_SoldeN1=$donnees2['IMPORTN1_SOLDE'];
						$import_variataion=$donnees2['VARIATION'];
						
					?>
					<tr>
						<td class="" width="100" id="import_compte"><?php echo $import_compte;?></td>
						<input type="text" id="import_compte<?php echo $com1;?>" value="<?php echo $import_compte;?>" style="display:none;"/>
						
						<td class="" width="200" id="import_libelle"><?php echo $import_libelle;?></td>
						<input type="text" id="import_libelle<?php echo $com1;?>" value="<?php echo $import_libelle;?>" style="display:none;"/>
						
						<td class="" width="200" id="import_soldeN"><?php echo number_format((double)$import_soldeN, 2, ',', ' '); ?></td>
						<input type="text" id="import_soldeN<?php echo $com1;?>" value="<?php echo $import_soldeN;?>" style="display:none;"/>
						
						<td class="" width="200" id="import_SoldeN1"><?php echo number_format((double)$import_SoldeN1, 2, ',', ' '); ?></td>
						<input type="tecxt" id="import_SoldeN1<?php echo $com1;?>" value="<?php echo $import_SoldeN1;?>" style="display:none;"/>
						
						<td class="" width="200" id="import_variataion"><?php echo number_format((double)$import_variataion, 2, ',', ' '); ?></td>
						<input type="text" id="import_variataion<?php echo $com1;?>" value="<?php echo $import_variataion;?>" style="display:none;"/>
					</tr>
					<?php

						$com1++;
						$sum_soldeN=$sum_soldeN+$import_soldeN;
						$sum_soldeN1=$sum_soldeN1+$import_SoldeN1;
						$Variation=$Variation+$import_variataion;

						}
					?>
					<tr>
						<td width="100">Total</td>
						<td width="200"></td>
						<td width="200"><?php echo number_format((double)$sum_soldeN, 2, ',', ' ');//echo $sum_soldeN; ?></td>
						<td width="200"><?php echo number_format((double)$sum_soldeN1, 2, ',', ' '); //$sum_soldeN1; ?></td>
						<td width="200"><?php echo number_format((double)$Variation, 2, ',', ' '); //$Variation; ?></td>
					</tr>
				</table>
				</div>
		<div id="progressbarRACycle" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
		<center><img src="../img/Loader.gif" /></center>
	</div>
	</body>

