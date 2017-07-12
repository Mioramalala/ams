<?php

include '../../../connexion.php';
// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=100 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1) {
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=100 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque=utf8_encode($donnees2['CONCLUSION_RISQUE']);

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=100 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$commentaire=utf8_encode($donnees['SYNTHESE_COMMENTAIRE']);
	$risque=utf8_encode($donnees['SYNTHESE_RISQUE']);

}
?>

<script>
$(function(){
	
	///DEBUT CODE DE TEST LES QUESTIONNAIRE SONT DEJA REMPLIS OU NON + SYNTESE
	var SYNTHESE_COMMENTAIRE="";
	var SYNTHESE_RISQUE="";
	var Questionnaire=0;

	//test questionnaire
	$.get("cycleRecette/Recettea/php/countColFunct.php",function(res)
	{
		Questionnaire=res;
	});

	$.post("cycleRecette/Recettea/php/getSynth.php",{cycleId:100},function (res)
	{
		res_=res.split('*');
		SYNTHESE_COMMENTAIRE=res_[0];
		SYNTHESE_RISQUE=res_[1];
	});
	//test SYTHESE
	//FIN CODE DE TEST LES QUESTIONNAIRE SONT DEJA REMPLIS OU NON + SYNTESE

	
	$('#Int_ra_Retour_Superviseur').click(function(){
		$('#message_fermeture_ra_sup').show();
		closedButSupra();
	});
	$('#conclusion_ra_Superviseur').click(function()
	{

		if(Questionnaire==0)
		{
			alert ("Vous devez cocher les cases vides..");
			return false;
		}else if(SYNTHESE_COMMENTAIRE=="" || SYNTHESE_RISQUE=="" )
		{
			alert ("veuillez remplir la synthese..");
			return false;
		}

		var commentaire=$('#Synthese_ra_Superviseur').val();	
		var risque=$('input[type=radio][name=risque]:checked').val();

				$.ajax({
					type:'POST',
					url:'cycleRecette/enregistre_conclusion.php',
					data:{risque:risque,commentaire:commentaire,cycleAchatId:100},
					success:function(e)
					{
						//alert(e);

						alert("cycle tresorerie recette a bien enregistré");
						$("#contRsciRecette").load("cycleRecette/Recette.php",function (res)
						{


							$('#contRsciRecette').show();
							$('#contSupRa').hide();
							$('#message_fermeture_ra_sup').hide();
							//$('#message_fermeture_imb_sup').hide();
						})
					}
				});
		closedButSupra();
	});
});
function openButSupra(){
	document.getElementById("Int_ra_Retour_Superviseur").disabled=false;
	document.getElementById("conclusion_ra_Superviseur").disabled=false;
}
function closedButSupra(){
	document.getElementById("Int_ra_Retour_Superviseur").disabled=true;
	document.getElementById("conclusion_ra_Superviseur").disabled=true;
}
</script>
<div id="int_ra_Superviseur">
<table>
	<tr>
		<td width="8" class="sous_Titre" align="center">Fonction</td>
		<td width="700" class="sous_Titre" align="center">Personnel concerné</td>
	</tr>
</table>
<table style="left:-180px;position:relative;">
<!--table style="left:-200px;position:relative;"-->
	<tr>
		<td width="250"></td>
		<td width="450">
			<table>
				<tr>
					<?php
						$reponse0=$bdd->query('SELECT ENTREPRISE_ID FROM tab_mission WHERE MISSION_ID='.$mission_id);
						
						$donnees0=$reponse0->fetch();
						
						$entrepiseId=$donnees0['ENTREPRISE_ID'];

						$reponse = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE MISSION_ID='.$mission_id.' AND  tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND POSTE_CYCLE_NOM="recette"');
						while ($donnees = $reponse->fetch())
						{
						?>	
							<td class="sous_Titre" width="100" align="center" bgcolor="#D0D0D0"><?php echo $donnees['POSTE_CLE_NOM']; ?></td>
					<?php
					}
					?>
				</tr>
			</table>
		</td>
	</tr>
</table>

<table>
<tr>
	<td>
		<div id="Int_ra_Sup_Overflow">
			<table class="label">
				<tr bgcolor="#ccc">
					<td width="250">1 Tenue de la caisse</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra1.php';?>
					</td>
				</tr>
				<tr>
					<td width="250">2 Détention de titres</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra2.php';?>
					</td>
				</tr>
				<tr  bgcolor="#ccc">
					<td width="250">3 Détention des chèques reçus des clients</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra3.php';?></td>
				</tr>
				<tr>
					<td width="250">4 Autorisation d'avance aux employés</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra4.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">5 Détention des carnets de chèques</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra5.php';?></td>
				</tr>
				<tr>
					<td width="250">6 Préparation des chèques</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra6.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">7 Approbation des pièces justificatives</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra7.php';?>
					</td>
				</tr>
				<tr>
					<td width="250">8 Signature des chèques</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra8.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">9 Annulation des pièces justificatives</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra9.php';?></td>
				</tr>
				<tr>
					<td width="250">10 Envoi des chèques</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra10.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">11 Tenue du journal de trésorerie</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra11.php';?></td>
				</tr>
				<tr>
					<td width="250">12 Liste des chèques reçus au courrier</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra12.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">13 Dépôts en banque des chèques ou espèces</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra13.php';?></td>
				</tr>
				<tr>
					<td width="250">14 Tenue des comptes clients</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra14.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">15 Tenue des comptes fournisseurs</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra15.php';?></td>
				</tr>
				<tr>
					<td width="250">16 Émission d'avoirs</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra16.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">17 Approbation des avoirs</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra17.php';?></td>
				</tr>
				<tr>
					<td width="250">18 Réception des relevés bancaires</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra18.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">19 Préparation des rapprochements de banque</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra19.php';?></td>
				</tr>
				<tr>
					<td width="250">20 Comparaison de la liste des chèques reçus au courrier avec les bordereaux de remise en banque et avec le journal de trésorerie</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra20.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">21 Accès à la comptabilité générale</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra21.php';?></td>
				</tr>
				<tr>
					<td width="250">22 Tenue du journal des ventes</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra22.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">23 Préparation des factures clients</td>
					<td width="400">
						<?php include '../../../cycleRecette/Recettea/load/load_check_fonct_sup_ra23.php';?></td>
				</tr>
				<tr>
					<td width="250">Niveau de risque</td>
					<td width="400"><?php include '../../../cycleRecette/Recettea/load/load_risque_ra_sup.php';?></td>
				</tr>
		</table>
	</div>
</td>
<td>
<!--****************************************Interface A Superviseur droite*********************************-->
<div id="interface_ra_Superviseur_Droite">
	<table>
		<tr>
			<td class="sous_Titre" height="30" bgcolor="#ccc" width="410">SYNTHESE ET CONCLUSION</td>
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td width="100">
							<textarea id="Synthese_ra_Superviseur" cols="34" rows="15" <?php if($nombre_resultat==1){echo "disabled";}?> ><?php echo $commentaire;?></textarea>
						</td>
						<td>
							<table height="180">
								<tr>
									<td  class="sous_Titre" height="170">Niveau de risque:<br /><br />
										<sran>
											<?php if($nombre_resultat==1){ ?>
												<input type="radio"	 value="faible" id="Synthese_ra_Superviseur_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
												<input type="radio"  value="moyen" id="Synthese_ra_Superviseur_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
												<input type="radio"  value="eleve" id="Synthese_ra_Superviseur_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';} ?>disabled/>Elevé
											<?php } else{?>
												<input type="radio" value="faible" id="Synthese_ra_Superviseur_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?>/>Faible<br />
												<input type="radio" value="moyen" id="Synthese_ra_Superviseur_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
												<input type="radio" value="eleve" id="Synthese_ra_Superviseur_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';}?>/>Elevé
											<?php } ?>
										</sran>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div><br />
<!--******************************Interface A Conclusion Superviseur**************************************-->
<div id="interface_ra_Superviseur_Droite_Bas">
	<table>
		<tr>
			<td height="30" bgcolor="#ccc" width="410" align="center">
				<input type="button" class="bouton" value="Retour"id="Int_ra_Retour_Superviseur" />&nbsp;&nbsp;		
				<input type="button" class="bouton" value="Validation" id="conclusion_ra_Superviseur"  <?php if($nombre_resultat==1){echo "disabled";}?>/>
			</td>
		</tr>
		<tr>
			<td class="sous_Titre" height="30" align="center"></td>
		</tr>
	</table>
<!--/div-->
</div>
</td>
</tr>
</table>
</div>
<!--*************************************Fancybox des boutons retour et conclusion**************************-->
<!--div id="fancybox_sup_btn_ra"></div-->
<!--********************************************************************************************************-->
<!--***********************************Message de fermeture de la page*************************************-->
<div id="message_fermeture_ra_sup"><?php include '../../../cycleRecette/Recettea/sms/Message retour ra superviseur.php';?></div>
<!--*******************************************************************************************************-->
<!--div id="fancybox_superviseur"></div-->
<!--******************************************************************************************************-->
<!--***********************************Interface A Message conclusion superviseur*************************-->
<!--div id="message_Synthese" data-options="handle:'#dragg'" align="center">
<div id="dragg" class="td_Titre_Question"><br />SYNTHESE</div-->
<div id="interface_ra_Conclusion_Superviseur" data-options="handle:'#dragg_conlus_ra'" align="center">
<div id="dragg_conlus_ra" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include '../../../cycleRecette/Recettea/form/Interface_ra_Conclusion.php';?></div>
<!--******************************************************************************************************-->
<!--**********************************Interface de message de terminaison du conclusion*******************-->
<div id="Message_Conclusion_ra_Terminer"><?php include '../../../cycleRecette/Recettea/sms/Message terminer conclusion ra.php';?></div>
<!--******************************************************************************************************-->
<!--*********************************Interface de terminaison du cunclusion/sms*******************************-->
<div id="message_Slide_Conclusion_ra"><?php include '../../../cycleRecette/Recettea/sms/Message slide ra conclusion.php';?></div>
<!--******************************************************************************************************-->
<!--********************************Emplacement du bouton de fermeture************************************-->
<div id="message_Sup_Donnees_perdues"><?php include '../../../cycleRecette/Recettea/sms/Message superviseur donnee perdues.php'; ?></div>
<!--******************************************************************************************************-->
<!--*******************************Interface de message vide de la conclusion******************************-->
<div id="mess_vide_conclusion_ra"><?php include '../../../cycleRecette/Recettea/sms/Mess_vide_conclus_ra.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************Ras de synthèse******************************************-->
<div id="mess_pas_synth"><?php include '../../../cycleRecette/Recettea/sms/mess_vide_conclus_ra.php';?></div>
<!--************************************************************************************-->