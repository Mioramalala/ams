<?php

include '../../../connexion.php';

// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=10000 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1) {
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=10000 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque=utf8_encode($donnees2['CONCLUSION_RISQUE']);

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=10000 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$commentaire=utf8_encode($donnees['SYNTHESE_COMMENTAIRE']);
	$risque=utf8_encode($donnees['SYNTHESE_RISQUE']);

}

?>

<script>
$(function(){

	//DEBUT CODE DE TEST LES QUESTIONNAIRE SONT DEJA REMPLIS OU NON + SYNTESE
	var SYNTHESE_COMMENTAIRE="";
	var SYNTHESE_RISQUE="";
	var Questionnaire=0;

	//test questionnaire
	$.get("cyclePaie/Paiea/php/countColFunct.php",function(res)
	{
		Questionnaire=res;
	});

	$.post("cyclePaie/Paiea/php/getSynth.php",{cycleId:10000},function (res)
	{
		res_=res.split('*');
		SYNTHESE_COMMENTAIRE=res_[0];
		SYNTHESE_RISQUE=res_[1];
	});
	//test SYTHESE
	//FIN CODE DE TEST LES QUESTIONNAIRE SONT DEJA REMPLIS OU NON + SYNTESE



	$('#Int_pa_Retour_Superviseur').click(function(){
		$('#message_fermeture_pa_sup').show();
		closedButSuppa();
	});
	$('#conclusion_pa_Superviseur').click(function()
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

		var commentaire=$('#Synthese_pa_Superviseur').val();
				var risque=$('input[type=radio][name=rd_Synthese_A_Superviseur]:checked').val();
				$.ajax({
					type:'POST',
					url:'cyclePaie/enregistre_conclusion.php',
					data:{risque:risque,commentaire:commentaire,cycleAchatId:10000},
					success:function(e)
					{

						alert("cycle paie a bien enregistré");
						$("#contRsciPaie").load("cyclePaie/Paie.php",function (e)
						{
							$('#contRsciPaie').show();
							$('#contSupPa').hide();
							$('#message_fermeture_pa_sup').hide();
						});

						
					}
				});
				closedButSuppa();
	
	});
		
});
function openButSuppa(){
	document.getElementById("Int_pa_Retour_Superviseur").disabled=false;
	document.getElementById("conclusion_pa_Superviseur").disabled=false;
}
function closedButSuppa(){
	document.getElementById("Int_pa_Retour_Superviseur").disabled=true;
	document.getElementById("conclusion_pa_Superviseur").disabled=true;
}
</script>
<div id="int_pa_Superviseur">
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

						$reponse = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE MISSION_ID='.$mission_id.' AND  tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND POSTE_CYCLE_NOM="paie"');
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
		<div id="Int_pa_Sup_Overflow">
			<table class="label">
				<tr bgcolor="#ccc">
					<td width="250">1 Approbation des entrées ou sorties de personnel</td>
					<td width="400">
						<?php include '../../../cyclePaie/Paiea/load/load_check_fonct_sup_pa1.php';?>
					</td>
				</tr>
				<tr>
					<td width="250">2 Détermination des niveaux de rémunérations</td>
					<td width="400">
						<?php include '../../../cyclePaie/Paiea/load/load_check_fonct_sup_pa2.php';?>
					</td>
				</tr>
				<tr  bgcolor="#ccc">
					<td width="250">3 Autorisation des primes</td>
					<td width="400">
						<?php include '../../../cyclePaie/Paiea/load/load_check_fonct_sup_pa3.php';?></td>
				</tr>
				<tr>
					<td width="250">4 Mise à jour du fichier permanent</td>
					<td width="400">
						<?php include '../../../cyclePaie/Paiea/load/load_check_fonct_sup_pa4.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">5 Approbation des heures travaillées</td>
					<td width="400">
						<?php include '../../../cyclePaie/Paiea/load/load_check_fonct_sup_pa5.php';?></td>
				</tr>
				<tr>
					<td width="250">6 Préparation de la paie</td>
					<td width="400">
						<?php include '../../../cyclePaie/Paiea/load/load_check_fonct_sup_pa6.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">7 Vérification des calculs</td>
					<td width="400">
						<?php include '../../../cyclePaie/Paiea/load/load_check_fonct_sup_pa7.php';?>
					</td>
				</tr>
				<tr>
					<td width="250">8 Approbation finale de la paie après sa préparation</td>
					<td width="400">
						<?php include '../../../cyclePaie/Paiea/load/load_check_fonct_sup_pa8.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">9 Préparation des enveloppes de paie</td>
					<td width="400">
						<?php include '../../../cyclePaie/Paiea/load/load_check_fonct_sup_pa9.php';?></td>
				</tr>
				<tr>
					<td width="250">10 Distribution des enveloppes</td>
					<td width="400">
						<?php include '../../../cyclePaie/Paiea/load/load_check_fonct_sup_pa10.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">11 Signature des chèques ou virements de salaires</td>
					<td width="400">
						<?php include '../../../cyclePaie/Paiea/load/load_check_fonct_sup_pa11.php';?></td>
				</tr>
				<tr>
					<td width="250">12 Rapprochement de banque du compte bancaire réservé aux salaires</td>
					<td width="400">
						<?php include '../../../cyclePaie/Paiea/load/load_check_fonct_sup_pa12.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">13 Centralisation de la paie</td>
					<td width="400">
					<?php include '../../../cyclePaie/Paiea/load/load_check_fonct_sup_pa13.php';?></td>
				</tr>
				<tr>
					<td width="250">14 Détention des dossiers individuels du personnel</td>
					<td width="400">
						<?php include '../../../cyclePaie/Paiea/load/load_check_fonct_sup_pa14.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">15 Comparaison périodique du journal de paie avec les dossiers individuels</td>
					<td width="400">
						<?php include '../../../cyclePaie/Paiea/load/load_check_fonct_sup_pa15.php';?></td>
				</tr>
				<tr>
					<td width="250">16 Autorisation d'acomptes ou avances</td>
					<td width="400">
						<?php include '../../../cyclePaie/Paiea/load/load_check_fonct_sup_pa16.php';?></td>
				</tr>
				<tr>
					<td width="250">Niveau de risque</td>
					<td width="400"><?php include '../../../cyclePaie/Paiea/load/load_risque_pa_sup.php';?></td>
				</tr>
		</table>
	</div>
</td>
<td>
<!--****************************************Interface A Superviseur droite*********************************-->
<div id="interface_pa_Superviseur_Droite">
	<table>
		<tr>
			<td class="sous_Titre" height="30" bgcolor="#ccc" width="410">SYNTHESE ET CONCLUSION</td>
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td width="100">
							<textarea id="Synthese_pa_Superviseur" cols="34" rows="15" <?php if($nombre_resultat==1){echo "disabled";}?>><?php echo $commentaire;?></textarea>
						</td>
						<td>
							<table height="180">
								<tr>
									<td  class="sous_Titre" height="170">Niveau de risque:<br /><br />
										<span>
										<?php if($nombre_resultat==1){ ?>
										<input type="radio"	 value="faible" id="Synthese_pa_Superviseur_Faible" name="rd_Synthese_A_Superviseur" <?php if($risque=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
										<input type="radio"  value="moyen" id="Synthese_pa_Superviseur_Moyen" name="rd_Synthese_A_Superviseur" <?php if($risque=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
										<input type="radio"  value="eleve" id="Synthese_pa_Superviseur_Eleve" name="rd_Synthese_A_Superviseur" <?php if($risque=="eleve") {echo 'checked=checked';} ?>disabled/>Elevé
										<?php } else{?>
										<input type="radio" value="faible" id="Synthese_pa_Superviseur_Faible" name="rd_Synthese_A_Superviseur" <?php if($risque=="faible") {echo 'checked=checked';}?>/>Faible<br />
										<input type="radio" value="moyen" id="Synthese_pa_Superviseur_Moyen" name="rd_Synthese_A_Superviseur" <?php if($risque=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
										<input type="radio" value="eleve" id="Synthese_pa_Superviseur_Eleve" name="rd_Synthese_A_Superviseur" <?php if($risque=="eleve") {echo 'checked=checked';}?>/>Elevé
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
<div id="interface_pa_Superviseur_Droite_Bas">
	<table>
		<tr>
			<td height="30" bgcolor="#ccc" width="410" align="center">
				<input type="button" class="bouton" value="Retour"id="Int_pa_Retour_Superviseur" />&nbsp;&nbsp;		
				<input type="button" class="bouton" value="Validation" id="conclusion_pa_Superviseur" <?php if($nombre_resultat==1){echo "disabled";}?>/>
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
<!--div id="fancybox_sup_btn_pa"></div-->
<!--********************************************************************************************************-->
<!--***********************************Message de fermeture de la page*************************************-->
<div id="message_fermeture_pa_sup"><?php include '../../../cyclePaie/Paiea/sms/Message retour pa superviseur.php';?></div>
<!--*******************************************************************************************************-->
<!--div id="fancybox_superviseur"></div-->
<!--******************************************************************************************************-->
<!--***********************************Interface A Message conclusion superviseur*************************-->
<!--div id="message_Synthese" data-options="handle:'#dragg'" align="center">
<div id="dragg" class="td_Titre_Question"><br />SYNTHESE</div-->
<div id="interface_pa_Conclusion_Superviseur" data-options="handle:'#dragg_conlus_pa'" align="center">
<div id="dragg_conlus_pa" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include '../../../cyclePaie/Paiea/form/Interface_pa_Conclusion.php';?></div>
<!--******************************************************************************************************-->
<!--**********************************Interface de message de terminaison du conclusion*******************-->
<div id="Message_Conclusion_pa_Terminer"><?php include '../../../cyclePaie/Paiea/sms/Message terminer conclusion pa.php';?></div>
<!--******************************************************************************************************-->
<!--*********************************Interface de terminaison du cunclusion/sms*******************************-->
<div id="message_Slide_Conclusion_pa"><?php include '../../../cyclePaie/Paiea/sms/Message slide pa conclusion.php';?></div>
<!--******************************************************************************************************-->
<!--********************************Emplacement du bouton de fermeture************************************-->
<div id="message_Sup_Donnees_perdues"><?php include '../../../cyclePaie/Paiea/sms/Message superviseur donnee perdues.php'; ?></div>
<!--******************************************************************************************************-->
<!--*******************************Interface de message vide de la conclusion******************************-->
<div id="mess_vide_conclusion_pa"><?php include '../../../cyclePaie/Paiea/sms/Mess_vide_conclus_pa.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************Pas de synthèse******************************************-->
<div id="mess_pas_synth"><?php include '../../../cyclePaie/Paiea/sms/mess_vide_conclus_pa.php';?></div>
<!--************************************************************************************-->