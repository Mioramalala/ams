<?php

include '../../../connexion.php';

// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=1000 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1) {
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=1000 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque=utf8_encode($donnees2['CONCLUSION_RISQUE']);

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=1000 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$commentaire=utf8_encode($donnees['SYNTHESE_COMMENTAIRE']);
	$risque=utf8_encode($donnees['SYNTHESE_RISQUE']);

}

?>


<script>
$(function()
{
	//DEBUT CODE DE TEST LES QUESTIONNAIRE SONT DEJA REMPLIS OU NON + SYNTESE
	var SYNTHESE_COMMENTAIRE="";
	var SYNTHESE_RISQUE="";
	var Questionnaire=0;

	//test questionnaire
	$.get("cycleImmo/Immoa/php/countColFunct.php",function(res)
	{
		Questionnaire=res;
	});

	$.post("cycleImmo/Immoa/php/getSynth.php",{cycleId:1000},function (res)
	{
		res_=res.split('*');
		SYNTHESE_COMMENTAIRE=res_[0];
		SYNTHESE_RISQUE=res_[1];
	});
	
	//test SYTHESE
	//FIN CODE DE TEST LES QUESTIONNAIRE SONT DEJA REMPLIS OU NON + SYNTESE
	// $(document).ready(function() {
		// $('#interface_A_Conclusion_Superviseur').draggable();
	// });
	
	$('#Int_ima_Retour_Superviseur').click(function(){
		$('#message_fermeture_ima_sup').show();
		closedButSupima();
	});


	$('#conclusion_ima_Superviseur').click(function() {

		if(Questionnaire==0) {
			alert ("Vous devez cocher les cases vides..");
			return false;
		}else if(SYNTHESE_COMMENTAIRE=="" || SYNTHESE_RISQUE=="" ) {
			alert ("veuillez remplir la synthese..");
			return false;
		}

		var commentaire= $('#Synthese_ima_Superviseur').val();	
		var risque= $('input[type=radio][name=rd_Synthese_A_Superviseur]:checked').val();

		$.ajax({
			type:'POST',
			
			//url:'cycleImmo/Immoa/php/enregistrer_synthese_ima.php',				
			url:'cycleImmo/enregistre_conclusion.php',
			
			// tinay editer
			//data:{rsque:risque,commentaire:commentaire,cycleAchatId:1000}, //par defaut ou l'ancien code
			data:{risque:risque,commentaire:commentaire,cycleAchatId:1000}, // 10 ou 1000??
			
			success:function(e) {

				// tinay editer
				alert("cycle immo a bien enregistré");
				$("#contRsciImmo").load("cycleImmo/Immo.php",function (res) {
					$('#contRsciImmo').show();
					$('#contSupIma').hide();
					$('#message_fermeture_ima_sup').hide();
				});
			}
		});

		closedButSupima();
	});	
});
function openButSupima(){
	document.getElementById("Int_ima_Retour_Superviseur").disabled=false;
	document.getElementById("conclusion_ima_Superviseur").disabled=false;
}
function closedButSupima(){
	document.getElementById("Int_ima_Retour_Superviseur").disabled=true;
	document.getElementById("conclusion_ima_Superviseur").disabled=true;
}
</script>
<div id="int_A_Superviseur">
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

						$reponse = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE MISSION_ID='.$mission_id.' AND  tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND POSTE_CYCLE_NOM="immo"');
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
		<div id="Int_ima_Sup_Overflow">
			<table class="label">
				<tr bgcolor="#ccc">
					<td width="250">1 Approbation des budgets</td>
					<td width="400">
						<?php include '../../../cycleImmo/Immoa/load/load_check_fonct_sup_ima1.php';?>
					</td>
				</tr>
				<tr>
					<td width="250">2 Approbation des dépassements par rapport aux budgets</td>
					<td width="400">
						<?php include '../../../cycleImmo/Immoa/load/load_check_fonct_sup_ima2.php';?>
					</td>
				</tr>
				<tr  bgcolor="#ccc">
					<td width="250">3 Émission de commandes d'achats</td>
					<td width="400">
						<?php include '../../../cycleImmo/Immoa/load/load_check_fonct_sup_ima3.php';?></td>
				</tr>
				<tr>
					<td width="250">4 Approbation finale des factures</td>
					<td width="400">
						<?php include '../../../cycleImmo/Immoa/load/load_check_fonct_sup_ima4.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">5 Tenue des fiches individuelles d'immobilisations</td>
					<td width="400">
						<?php include '../../../cycleImmo/Immoa/load/load_check_fonct_sup_ima5.php';?></td>
				</tr>
				<tr>
					<td width="250">6 Rapprochement des fiches avec la comptabilité</td>
					<td width="400">
						<?php include '../../../cycleImmo/Immoa/load/load_check_fonct_sup_ima6.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">7 Inventaire physique</td>
					<td width="400">
						<?php include '../../../cycleImmo/Immoa/load/load_check_fonct_sup_ima7.php';?>
					</td>
				</tr>
				<tr>
					<td width="250">8 Responsabilité du matériel</td>
					<td width="400">
						<?php include '../../../cycleImmo/Immoa/load/load_check_fonct_sup_ima8.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">9 Rapprochement des fiches avec l'inventaire physique</td>
					<td width="400">
						<?php include '../../../cycleImmo/Immoa/load/load_check_fonct_sup_ima9.php';?></td>
				</tr>
				<tr>
					<td width="250">10 Approbation des ajustements de comptes après inventaire</td>
					<td width="400">
						<?php include '../../../cycleImmo/Immoa/load/load_check_fonct_sup_ima10.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">11 Mise à jour du fichier informatique</td>
					<td width="400">
						<?php include '../../../cycleImmo/Immoa/load/load_check_fonct_sup_ima11.php';?></td>
				</tr>
				<tr>
					<td width="250">Niveau de risque</td>
					<td width="400"><div id="load_risque"><?php include '../../../cycleImmo/Immoa/load/load_risque_sup_ima.php';?></td>
				</tr>
		</table>
	</div>
<!--div id="fancybox_sup_ima"></div-->
</td>
<td>
<!--****************************************Interface A Superviseur droite*********************************-->
<!--div id="frm_droite"-->
<div id="interface_ima_Superviseur_Droite">
	<table>
		<tr>
			<td class="sous_Titre" height="30" bgcolor="#ccc" width="410">SYNTHESE ET CONCLUSION</td>
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td width="100">
							<textarea id="Synthese_ima_Superviseur" cols="34" rows="15" <?php if($nombre_resultat==1){echo "disabled";}?>><?php echo $commentaire;?></textarea>
						</td>
						<td>
							<table height="180">
								<tr>
									<td  class="sous_Titre" height="170">Niveau de risque:<br /><br />
										<span>
											<?php if($nombre_resultat==1){ ?>
												<input type="radio"	 value="faible" id="Synthese_ima_Superviseur_Faible" name="rd_Synthese_A_Superviseur" <?php if($risque=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
												<input type="radio"  value="moyen" id="Synthese_ima_Superviseur_Moyen" name="rd_Synthese_A_Superviseur" <?php if($risque=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
												<input type="radio"  value="eleve" id="Synthese_ima_Superviseur_Eleve" name="rd_Synthese_A_Superviseur" <?php if($risque=="eleve") {echo 'checked=checked';} ?>disabled/>Elevé
											<?php } else{?>
												<input type="radio" value="faible" id="Synthese_ima_Superviseur_Faible" name="rd_Synthese_A_Superviseur" <?php if($risque=="faible") {echo 'checked=checked';}?>/>Faible<br />
												<input type="radio" value="moyen" id="Synthese_ima_Superviseur_Moyen" name="rd_Synthese_A_Superviseur" <?php if($risque=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
												<input type="radio" value="eleve" id="Synthese_ima_Superviseur_Eleve" name="rd_Synthese_A_Superviseur" <?php if($risque=="eleve") {echo 'checked=checked';}?>/>Elevé
											<?php } ?>
										</span>
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
<div id="interface_ima_Superviseur_Droite_Bas">
	<table>
		<tr>
			<td height="30" bgcolor="#ccc" width="410" align="center">
				<input type="button" class="bouton" value="Retour"id="Int_ima_Retour_Superviseur" />&nbsp;&nbsp;		
				<input type="button" class="bouton" value="Validation" id="conclusion_ima_Superviseur" <?php if($nombre_resultat==1){echo "disabled";}?> />
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
<!--div id="fancybox_sup_btn_ima"></div-->
<!--********************************************************************************************************-->
<!--***********************************Message de fermeture de la page*************************************-->
<div id="message_fermeture_ima_sup"><?php include '../../../cycleImmo/Immoa/sms/Message retour ima superviseur.php';?></div>
<!--*******************************************************************************************************-->
<!--div id="fancybox_superviseur"></div-->
<!--******************************************************************************************************-->
<!--***********************************Interface A Message conclusion superviseur*************************-->
<!--div id="message_Synthese" data-options="handle:'#dragg'" align="center">
<div id="dragg" class="td_Titre_Question"><br />SYNTHESE</div-->
<div id="interface_ima_Conclusion_Superviseur" data-options="handle:'#dragg_conlus'" align="center">
<div id="dragg_conlus" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include '../../../cycleImmo/Immoa/form/Interface_ima_Conclusion.php';?></div>
<!--******************************************************************************************************-->
<!--**********************************Interface de message de terminaison du conclusion*******************-->
<div id="Message_Conclusion_ima_Terminer"><?php include '../../../cycleImmo/Immoa/sms/Message terminer conclusion ima.php';?></div>
<!--******************************************************************************************************-->
<!--*********************************Interface de terminaison du cunclusion/sms*******************************-->
<div id="message_Slide_Conclusion_ima"><?php include '../../../cycleImmo/Immoa/sms/Message slide ima conclusion.php';?></div>
<!--******************************************************************************************************-->
<!--********************************Emplacement du bouton de fermeture************************************-->
<div id="message_Sup_Donnees_perdues"><?php include '../../../cycleImmo/Immoa/sms/Message superviseur donnee perdues.php'; ?></div>
<!--******************************************************************************************************-->
<!--*******************************Interface de message vide de la conclusion******************************-->
<div id="mess_vide_conclusion_ima"><?php include '../../../cycleImmo/Immoa/sms/Mess_vide_conclus_ima.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************Pas de synthèse******************************************-->
<div id="mess_pas_synth"><?php include '../../../cycleImmo/Immoa/sms/mess_vide_conclus_ima.php';?></div>
<!--************************************************************************************-->