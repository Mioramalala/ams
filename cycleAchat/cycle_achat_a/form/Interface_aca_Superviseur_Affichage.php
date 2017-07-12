<!-- // tinay: template valider separation de fonction -->

<?php
include '../../../connexion.php';
	@session_start();
	$mission_id=$_SESSION['idMission'];
	//echo "id_mission".$mission_id;
// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=1 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1) {
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=1 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque=utf8_encode($donnees2['CONCLUSION_RISQUE']);

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=1 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$commentaire=utf8_encode($donnees['SYNTHESE_COMMENTAIRE']);
	$risque=utf8_encode($donnees['SYNTHESE_RISQUE']);

}
?>


<script>
	$(document).ready(function()
	{
		$('#interface_aca_Conclusion_Superviseur').draggable();
	});
$(function() {
	//DEBUT CODE DE TEST LES QUESTIONNAIRE SONT DEJA REMPLIS OU NON + SYNTESE
        var SYNTHESE_COMMENTAIRE="";
	    var SYNTHESE_RISQUE="";
		var Questionnaire=0;

		//test questionnaire
		$.get("cycleAchat/cycle_achat_a/php/countColFunct.php",function(res)
		{
			Questionnaire=res;
		});

	   $.post("cycleAchat/cycle_achat_a/php/getSynth.php",{cycleId:1},function (res)
	   {
		   res_=res.split('*');
		   SYNTHESE_COMMENTAIRE=res_[0];
		   SYNTHESE_RISQUE=res_[1];
	    });
		//test SYTHESE
	//FIN CODE DE TEST LES QUESTIONNAIRE SONT DEJA REMPLIS OU NON + SYNTESE





		$('#Int_aca_Retour_Superviseur').click(function(){
			$('#message_fermeture_aca_sup').show();
			//closedButSupaca();
		});



	$('#conclusion_aca_Superviseur').click(function() {

		if(Questionnaire==0){
			alert ("Vous devez cocher les cases vides..");
		    return false;
		}else if(SYNTHESE_COMMENTAIRE=="" || SYNTHESE_RISQUE=="" ){
			alert ("veuillez remplir la synthese..");
		  	return false;
		}

		var commentaire=$('#Synthese_aca_Superviseur').val();
		var risque=$('input[type=radio][name=rd_Synthese_A_Superviseur]:checked').val();
			$.ajax({
				type:'POST',
				//url:'cycleAchat/cycle_achat_a/php/enregistrer_synthese_aca.php',
				url:'cycleAchat/cycle_achat_a/php/enregistrer_conclusion_aca.php',
				data:{commentaire:commentaire,cycleAchatId:1,risque:risque},
				success:function(e){

					alert("cycle achat a bien enregistré");
					$("#contenue_rsci").load('cycleAchat/index.php',function (res)
					{
						$('#contenue_rsci').show();
						$('#contSupaca').hide();
						$('#message_fermeture_aca_sup').hide();
					});

				}
			});
		//closedButSupaca();
	});
});
function openButSupaca(){
	document.getElementById("Int_aca_Retour_Superviseur").disabled=false;
	document.getElementById("conclusion_aca_Superviseur").disabled=false;
}
function closedButSupaca(){
	document.getElementById("Int_aca_Retour_Superviseur").disabled=true;
	document.getElementById("conclusion_aca_Superviseur").disabled=true;
}
</script>
<div id="int_aca_Superviseur">
<table>
	<tr>
		<td width="8" class="sous_Titre" align="center">Fonction</td>
		<td width="700" class="sous_Titre" align="center">Personnel concerné</td>
	</tr>
</table>
<table style="left:-180px;position:relative;">
	<tr>
		<td width="250"></td>
		<td width="450">
			<table>
				<tr>
					<?php
						$reponse0=$bdd->query('SELECT ENTREPRISE_ID FROM tab_mission WHERE MISSION_ID='.$mission_id);
						
						$donnees0=$reponse0->fetch();
						
						$entrepiseId=$donnees0['ENTREPRISE_ID'];

						$reponse = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE MISSION_ID='.$mission_id.' AND  tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND POSTE_CYCLE_NOM="achat"');
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
		<div id="Int_aca_Sup_Overflow">
			<table class="label">
				<tr bgcolor="#ccc">
					<td width="250">1 Demandeurs d'achats</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca1.php'; ?>
					</td>
				</tr>
				<tr>
					<td width="250">2 Établissement des commandes</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca2.php';?>
					</td>
				</tr>
				<tr  bgcolor="#ccc">
					<td width="250">3 Autorisation des commandes</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca3.php';?></td>
				</tr>
				<tr>
					<td width="250">4 Réception</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca4.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">5 Comparaison commande-facture</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca5.php';?></td>
				</tr>
				<tr>
					<td width="250">6 Comparaison bon de réception-facture</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca6.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">7 Imputation comptable</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca7.php';?>
					</td>
				</tr>
				<tr>
					<td width="250">8 Vérification de l'imputation comptable</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca8.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">9 Bon à payer</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca9.php';?></td>
				</tr>
				<tr>
					<td width="250">10 Tenue du journal des achats</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca10.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">11 Tenue des comptes fournisseurs</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca11.php';?></td>
				</tr>
				</tr>
				<tr>
					<td width="250">11 Mise à jour du fichier informatique</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca11.php';?></td>
				</tr>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">12 Rapprochement des relevés fournisseurs avec les comptes</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca12.php';?></td>
				</tr>
				</tr>
				<tr>
					<td width="250">13 Rapprochement de la balance fournisseurs avec le compte collectif</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca13.php';?></td>
				</tr>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">14 Centralisation des achats</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca14.php';?></td>
				</tr>
				<tr>
					<td width="250">15 Signature des chèques</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca15.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">16 Envoi des chèques</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca16.php';?></td>
				</tr>
				<tr>
					<td width="250">17 Acceptation des traites</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca17.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">18 Tenue du journal des effets à payer</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca18.php';?></td>
				</tr>
				<tr>
					<td width="250">19 Tenue du journal de trésorerie</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca19.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">20 Annulation des pièces justificatives</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca20.php';?></td>
				</tr>
				<tr>
					<td width="250">21 Accès à la comptabilité générale</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca21.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">22 Suivi des avoirs</td>
					<td width="400">
						<?php include '../../../cycleAchat/cycle_achat_a/load/load_check_fonct_sup_aca22.php';?></td>
				</tr>

				<tr>
					<td width="250">Niveau de risque</td>
					<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/load_risque_sup_aca.php';?></td>
				</tr>
		</table>
	</div>
<!--div id="fancybox_sup_aca"></div-->
</td>
<td>
<!--****************************************Interface A Superviseur droite*********************************-->
<!--div id="frm_droite"-->
<div id="interface_aca_Superviseur_Droite">
	<table>
		<tr>
			<td class="sous_Titre" height="30" bgcolor="#ccc" width="410">SYNTHESE ET CONCLUSION</td>
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td width="100">
							<textarea id="Synthese_aca_Superviseur" cols="34" rows="15" <?php if($nombre_resultat==1){echo "disabled";}?> ><?php echo $commentaire;?></textarea>
						</td>
						<td>
							<table height="180">
								<tr>
									<td  class="sous_Titre" height="170">Niveau de risque:<br /><br />
										<span>
											<?php if($nombre_resultat==1){ ?>
											<input type="radio" class="risque" value="faible" id="Synthese_aca_Superviseur_Faible" name="rd_Synthese_A_Superviseur" <?php if($risque=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
											<input type="radio" class="risque" value="moyen" id="Synthese_aca_Superviseur_Moyen" name="rd_Synthese_A_Superviseur" <?php if($risque=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
											<input type="radio" class="risque" value="eleve" id="Synthese_aca_Superviseur_Eleve" name="rd_Synthese_A_Superviseur" <?php if($risque=="eleve") {echo 'checked=checked';}?>disabled/>Elevé
										<?php } else{?>
											<input type="radio" class="risque" value="faible" id="Synthese_aca_Superviseur_Faible" name="rd_Synthese_A_Superviseur" <?php if($risque=="faible") {echo 'checked=checked';}?>disabled/>Faible<br />
											<input type="radio" class="risque" value="moyen" id="Synthese_aca_Superviseur_Moyen" name="rd_Synthese_A_Superviseur" <?php if($risque=="moyen") {echo 'checked=checked';}?>disabled/>Moyen<br />
											<input type="radio" class="risque" value="eleve" id="Synthese_aca_Superviseur_Eleve" name="rd_Synthese_A_Superviseur" <?php if($risque=="eleve") {echo 'checked=checked';}?>disabled/>Elevé
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
<div id="interface_aca_Superviseur_Droite_Bas">
	<table>
		<tr>
			<td height="30" bgcolor="#ccc" width="410" align="center">
				<input type="button" class="bouton" value="Retour"id="Int_aca_Retour_Superviseur" />&nbsp;&nbsp;		
				<input type="button" class="bouton" value="Validation" id="conclusion_aca_Superviseur"<?php if($nombre_resultat==1){echo "disabled";}?> />
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
<!--div id="fancybox_sup_btn_aca"></div-->
<!--********************************************************************************************************-->
<!--***********************************Message de fermeture de la page*************************************-->
<div id="message_fermeture_aca_sup"><?php include '../../../cycleAchat/cycle_achat_a/sms/Message retour aca superviseur.php';?></div>
<!--*******************************************************************************************************-->
<!--div id="fancybox_superviseur"></div-->
<!--******************************************************************************************************-->
<!--***********************************Interface A Message conclusion superviseur*************************-->
<!--div id="message_Synthese" data-options="handle:'#dragg'" align="center">
<div id="dragg" class="td_Titre_Question"><br />SYNTHESE</div-->
<div id="interface_aca_Conclusion_Superviseur" data-options="handle:'#dragg_conlus'" align="center">
<div id="dragg_conlus" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include '../../../cycleAchat/cycle_achat_a/form/Interface_aca_Conclusion.php';?></div>
<!--******************************************************************************************************-->
<!--**********************************Interface de message de terminaison du conclusion*******************-->
<div id="Message_Conclusion_aca_Terminer"><?php include '../../../cycleAchat/cycle_achat_a/sms/Message terminer conclusion aca.php';?></div>
<!--******************************************************************************************************-->
<!--*********************************Interface de terminaison du cunclusion/sms*******************************-->
<div id="message_Slide_Conclusion_aca"><?php include '../../../cycleAchat/cycle_achat_a/sms/Message slide aca conclusion.php';?></div>
<!--******************************************************************************************************-->
<!--********************************Emplacement du bouton de fermeture************************************-->
<div id="message_Sup_Donnees_perdues_aca"><?php include '../../../cycleAchat/cycle_achat_a/sms/Message superviseur donnee perdues.php'; ?></div>
<!--******************************************************************************************************-->
<!--*******************************Interface de message vide de la conclusion******************************-->
<div id="mess_vide_conclusion_aca"><?php include '../../../cycleAchat/cycle_achat_a/sms/Mess_vide_conclus_aca.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************Message empty in the frame conclusion******************************************-->
<div id="mess_empty_conclus"><?php include '../../../cycleAchat/cycle_achat_a/sms/mess_empty_conclus.php';?></div>
<!--************************************************************************************-->
<!--*********************Message who have not a synthèse**********************************************-->
<div id="mess_pas_synth"><?php include '../../../cycleAchat/cycle_achat_a/sms/mess_non_synth.php'; ?></div>
<!--****************************************************************************************************-->