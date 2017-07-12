<?php

include '../../../connexion.php';
include '../../../test_acces.php';

$reponse=$bdd->query('SELECT CONCLUSION_ID FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=10');

$donnees=$reponse->fetch();

$conclusionId=$donnees['CONCLUSION_ID'];

?>

<!--script type="text/javascript" src="cycleAchat/Plugins/jquery.easyui.min.js"></script-->

<script>
	// $(document).ready(function() {
	// 	$('#message_Synthese_sta').draggable();
	// 	$('#interface_sta_ Conclusion_Superviseur').draggable();
		// $('a[rel*=facebox]').facebox();
	// });
$(function(){

	$('#Int_sta_Retour').click(function(){
		$('#message_Fermeture_sta').show();	
		closedButsta();
	});
	
	$('#Int_sta_Suivant').click(function(){
	mission_id=document.getElementById("txt_mission_id").value;
		$.ajax({
			type:'POST',
			url:'cycleStock/Stocka/php/det_res_sta.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==1){
					$.ajax({
						type:'POST',
						url:'cycleStock/Stocka/php/getEseIdMissId.php',
						data:{mission_id:mission_id},
						success:function(e){
							eseId=e;	
							$.ajax({
								type:'POST',
								url:'cycleStock/Stocka/php/countColFunct.php',
								data:{entrepriseId:eseId},
								success:function(e1){
									if(e1==0){
										$('#fancybox_sta').show();
										$('#mess_vide_sta').show();
									}
									else{
										$.ajax({
											type:'POST',
											url:'cycleStock/Stocka/php/getSynth.php',
											data:{mission_id:mission_id, cycleId:1000},
											success:function(e){
												eo=""+e+"";
												doc=eo.split('*');
												document.getElementById("txt_Synthese_sta").value=doc[0];
												document.getElementById("rd_Synthese_sta_Moyen").checked=false;
												document.getElementById("rd_Synthese_sta_Faible").checked=false;
												document.getElementById("rd_Synthese_sta_Eleve").checked=false;
												if(doc[1]=='faible'){
													document.getElementById("rd_Synthese_sta_Faible").checked=true;
												}
												else if(doc[1]=='moyen'){
													document.getElementById("rd_Synthese_sta_Moyen").checked=true;
												}
												else if(doc[1]=='eleve'){
													document.getElementById("rd_Synthese_sta_Eleve").checked=true;
												}
												$('#message_Synthese_sta').show();
												$('#message_Synthese_Terminer').hide();
												$('#message_Slide').hide();
												$('#fancybox_sta').show();
											}										
										});
									}
								}
							});
						}
					});
				}	
				else{
					$('#fancybox_sta').show();
					$('#mess_vide_sta').show();
				}
			}
		});

		// mission_id=document.getElementById("txt_mission_id").value;
		// $.ajax({
			// type:'POST',
			// url:'cycleStock/Stocka/php/countColA.php',
			// data:{mission_id:mission_id, cycleName:'stock'},
			// success:function(e){
				// if(e==1){
					// getSynthese(mission_id, "1");
					// $('#fancybox_sta').show();
					// $('#message_Synthese_sta').show();
				// }
				// else{
					// $('#mess_vide_sta').show();
					// $('#fancybox_sta').show();
				// }
			// }
		// });
	});
});
function getSynthese(mission_id, cycleId){
	$.ajax({
		type:'POST',
		url:'cycleStock/Stocka/php/getSynth.php',
		data:{mission_id:mission_id, cycleId:cycleId},
		success:function(e){
			eo=""+e+"";
			doc=eo.split('*');
			document.getElementById("txt_Synthese_sta").value=doc[0];
			document.getElementById("rd_Synthese_sta_Faible").checked=false;
			document.getElementById("rd_Synthese_sta_Moyen").checked=false;
			document.getElementById("rd_Synthese_sta_Eleve").checked=false;
			
			if(doc[1]=="faible"){
				document.getElementById("rd_Synthese_sta_Faible").checked=true;
			}
			else if(doc[1]=="moyen"){
				document.getElementById("rd_Synthese_sta_Moyen").checked=true;
			}
			else if(doc[1]=="eleve"){
				document.getElementById("rd_Synthese_sta_Eleve").checked=true;
			}
		}
	});
}
function closedButsta(){
	document.getElementById("Int_sta_Retour").disabled=true;
	document.getElementById("Int_sta_Suivant").disabled=true;
}
function openButsta(){
	document.getElementById("Int_sta_Retour").disabled=false;
	document.getElementById("Int_sta_Suivant").disabled=false;
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<div id="int_sta">
<table>
	<tr>
		<td width="380" class="sous_Titre" align="center">Fonctions</td>
		<td width="900" class="sous_Titre" align="center">Personnels concernés</td>
	</tr>
</table>

<table>
	<tr>
		<td width="380"></td>
		<td width="900" class="titre"><?php //include 'cycleAchat/cycle_achat_load/Load_A_Persll_adt.php'?>
		<table>
	<tr>
<?php
	include '../../../connexion.php';

	$reponse = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE MISSION_ID='.$mission_id.' AND  tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND POSTE_CYCLE_NOM="stock"');
	$nbrTot=0;
	while ($donnees = $reponse->fetch())
	{
	?>	
		<td class="sous_Titre" width="100" align="center" bgcolor="#D0D0D0"><?php echo $donnees['POSTE_CLE_NOM']; ?></td>
<?php
	$nbrTot++;
}
?>
	</tr>
</table>
	<input type="text" id="nbrTot" value="<?php echo $nbrTot; ?>" style="display:none;" />
		</td>
	</tr>
</table>
<div id="table_Interface_sta">
<table  class="label">
	<tr bgcolor="#efefef">
		<td width="380">1 Magasin</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_1.php'; ?></td>
	</tr>
	<tr>
		<td width="380">2 Réception</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_2.php'; ?></td>
	</tr>
	<tr  bgcolor="#efefef">
		<td width="380">3 Expédition</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_3.php'; ?></td>
	</tr>
	<tr>
		<td width="380">4 Tenue de fiches de stocks en quantités</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_4.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">5 Tenue de l'inventaire permanent</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_5.php'; ?></td>
	</tr>
	<tr>
		<td width="380">6 Responsable de l'inventaire physique</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_6.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">7 Rapprochement inventaire physique - inventaire permanent</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_7.php'; ?></td>
	</tr>
	<tr>
		<td width="380">8 Approbation des ajustements après inventaire</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_8.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">9 Rapport sur les stocks obsolètes, inutilisables, etc.</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_9.php'; ?></td>
	</tr>
	<tr>
		<td width="380">10 Autorisation de cession des stocks détériorés ou inutilisés</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_10.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">11 Rapprochement comptabilité générale/ analytique</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_11.php'; ?></td>
	</tr>
	<tr>
		<td width="380">12 Définition des prix de revient</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_12.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">13 Comparaison prix de revient/prix de vente</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_13.php'; ?></td>
	</tr>	
	<tr>
		<td width="380">Niveaux de risque</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_Risque_sta.php'; ?></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="button" class="bouton" value="Retour"id="Int_sta_Retour" />&nbsp;&nbsp;
			<input type="button" class="bouton" value="Suivant" id="Int_sta_Suivant" />
		</td>
	</tr>
</table>

</div>
</div>
<div id="fancybox_sta"></div>
<div id="message_Synthese_sta" data-options="handle:'#dragg'" align="center">
<div id="dragg" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include '../../../cycleStock/Stocka/form/Interface_sta_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface A Synthese A terminer********************************-->
<div id="message_Synthese_Terminer" align="center"><?php include '../../../cycleStock/Stocka/sms/Message synthese termine.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Slide"><?php include '../../../cycleStock/Stocka/sms/Message slide.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Donnees_Perdu"><?php include '../../../cycleStock/Stocka/sms/Message donnees perdu.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de fermeture de la page***************************************-->
<div id="message_Fermeture_sta"><?php include '../../../cycleStock/Stocka/sms/Message retour sta.php'?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de message vide du synthese***********************************-->
<div id="mess_vide_synthese_sta"><?php include '../../../cycleStock/Stocka/sms/Mess_vide_synth_sta.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***************************Formulaire de comptage de resultat de a*************************************-->
<div id="mess_vide_sta"><?php include '../../../cycleStock/Stocka/sms/mess_vide_sta.php'; ?></div>
