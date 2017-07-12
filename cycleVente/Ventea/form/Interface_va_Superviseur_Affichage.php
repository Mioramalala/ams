<?php

include '../../../connexion.php';


// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=10 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1) {
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=10 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque=utf8_encode($donnees2['CONCLUSION_RISQUE']);

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=10 AND MISSION_ID='.$mission_id);
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
	$.get("cycleVente/Ventea/php/countColFunct.php",function(res)
	{
		Questionnaire=res;
	});

	$.post("cycleVente/Ventea/php/getSynth.php",{cycleId:10},function (res)
	{
		res_=res.split('*');
		SYNTHESE_COMMENTAIRE=res_[0];
		SYNTHESE_RISQUE=res_[1];
	});

	//test SYTHESE
	//FIN CODE DE TEST LES QUESTIONNAIRE SONT DEJA REMPLIS OU NON + SYNTESE


	// alert("Interface Superviseur");
	
	// $('#interface_va_Conclusion_Superviseur').draggable();
	
	$('#Int_va_Retour_Superviseur').click(function(){
		$('#message_fermeture_va_sup').show();
		closedButSupva();
	});
	$('#conclusion_va_Superviseur').click(function()
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
			var commentaire=$('#Synthese_va_Superviseur').val();
			var risque=$('input[type=radio][name=rd_Synthese_A_Superviseur]:checked').val();
				$.ajax({
					type:'POST',
					url:'cycleVente/enregistre_conclusion.php',
					data:{commentaire:commentaire,cycleAchatId:10,risque:risque},
					success:function(e){
						// alert(e);
						alert("cycle vente a bien enregistré");
						$("#contRsciVente").html("");
						$("#contRsciVente").load("cycleVente/Vente.php",function (res)
						{
							$('#contRsciVente').show();
							$('#contSupVa').hide();
							$('#message_fermeture_va_sup').hide();
							openButSupva();
						});

					}
				});
		closedButSupva();
	});
});
function openButSupva(){
	document.getElementById("Int_va_Retour_Superviseur").disabled=false;
	document.getElementById("conclusion_va_Superviseur").disabled=false;
}
function closedButSupva(){
	//document.getElementById("Int_va_Retour_Superviseur").disabled=true;
	document.getElementById("conclusion_va_Superviseur").disabled=true;
}
</script>
<div id="int_va_Superviseur">
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

						$reponse = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE MISSION_ID='.$mission_id.' AND  tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND POSTE_CYCLE_NOM="vente"');
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
		<div id="Int_va_Sup_Overflow">
			<table class="label">
				<tr bgcolor="#ccc">
					<td width="250">1 Traitement des commandes</td>
					<td width="400">
						<?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va1.php';?>
					</td>
				</tr>
				<tr>
					<td width="250">2 Examen de la solvabilité des clients</td>
					<td width="400">
						<?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va2.php';?>
					</td>
				</tr>
				<tr  bgcolor="#ccc">
					<td width="250">3 Facturation</td>
					<td width="400">
						<?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va3.php';?></td>
				</tr>
				<tr>
					<td width="250">4 Contrôle bon de livraison - facture</td>
					<td width="400">
						<?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va4.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">5 Contrôle commande - facture</td>
					<td width="400">
						<?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va5.php';?></td>
				</tr>
				<tr>
					<td width="250">6 Tenue du journal des ventes</td>
					<td width="400">
						<?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va6.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">7 Vérification de la continuité des numéros de factures comptabilisées</td>
					<td width="400">
						<?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va7.php';?>
					</td>
				</tr>
				<tr>
					<td width="250">8 Liste des bons de sortie non facturés</td>
					<td width="400">
						<?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va8.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">9 Tenue des comptes clients</td>
					<td width="400">
						<?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va9.php';?></td>
				</tr>
				<tr>
					<td width="250">10 Établissement de la balance clients</td>
					<td width="400">
						<?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va10.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">11 Etablissement de la balance clients par ancienneté de solde</td>
					<td width="400">
						<?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va11.php';?></td>
				</tr>
				<tr>
					<td width="250">12 Rapprochement balance clients - compte collectif</td>
					<td width="400">
						<?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va12.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">13 Centralisation des ventes</td>
					<td width="400">
						<?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va13.php';?></td>
				</tr>
				<tr>
					<td width="250">14 Détermination des conditions de paiement</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va14.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">15 Relevé des chèques reçus au courrier</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va15.php';?></td>
				</tr>
				<tr>
					<td width="250">16 Détention des effets à recevoir</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va16.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">17 Tenue du journal des effets à recevoir</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va17.php';?></td>
				</tr>
				<tr>
					<td width="250">18 Inventaire des effets à recevoir</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va18.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">19 Accès à la comptabilité générale</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va19.php';?></td>
				</tr>
				<tr>
					<td width="250">20 Tenue du journal de trésorerie</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va20.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">21 Émission d'avoirs</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va21.php';?></td>
				</tr>
				<tr>
					<td width="250">22 Approbation des avoirs</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va22.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">23 Établissement des relevés clients</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va23.php';?></td>
				</tr>
				<tr>
					<td width="250">24 Envoi des relevés aux clients</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va24.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">25 Comparaison des relevés avec les comptes</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va25.php';?></td>
				</tr>
				<tr>
					<td width="250">26 Comparaison de la balance clients avec les comptes individuels</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va26.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">27 Confirmation des comptes clients</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va27.php';?></td>
				</tr>
				<tr>
					<td width="250">28 Relance des clients</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va28.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">29 Prolongation des conditions de paiement</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va29.php';?></td>
				</tr>
				<tr>
					<td width="250">30 Accord d'escomptes</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va30.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">31 Autorisation de passer en pertes des créances</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va31.php';?></td>
				</tr>
				<tr>
					<td width="250">32 Détention de la liste des clients passés en perte</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va32.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">33 Tenue des comptes débiteurs divers</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va33.php';?></td>
				</tr>
				<tr>
					<td width="250">34 Expédition des produits finis</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va34.php';?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">35 Surveillance des stocks</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_check_fonct_sup_va35.php';?></td>
				</tr>


				<tr>
					<td width="250">Niveau de risque</td>
					<td width="400"><?php include '../../../cycleVente/Ventea/load/load_risque_va_sup.php';?></td>
				</tr>
		</table>
	</div>
</td>
<td>
<!--****************************************Interface A Superviseur droite*********************************-->
<div id="interface_va_Superviseur_Droite">
	<table>
		<tr>
			<td class="sous_Titre" height="30" bgcolor="#ccc" width="410">SYNTHESE ET CONCLUSION</td>
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td width="100">
							<textarea id="Synthese_va_Superviseur" cols="34" rows="15" <?php if($nombre_resultat==1){echo "disabled";}?> ><?php echo $commentaire;?></textarea>
						</td>
						<td>
							<table height="180">
								<tr>
									<td  class="sous_Titre" height="170">Niveau de risque:<br /><br />
										<span>
										<?php if($nombre_resultat==1){ ?>
											<input type="radio" class="risque" value="faible" id="Synthese_va_Superviseur_Faible" name="rd_Synthese_A_Superviseur" <?php if($risque=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
											<input type="radio" class="risque" value="moyen" id="Synthese_va_Superviseur_Moyen" name="rd_Synthese_A_Superviseur" <?php if($risque=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
											<input type="radio" class="risque" value="eleve" id="Synthese_va_Superviseur_Eleve" name="rd_Synthese_A_Superviseur" <?php if($risque=="eleve") {echo 'checked=checked';}?>disabled/>Elevé
										<?php } else{?>
											<input type="radio" class="risque" value="faible" id="Synthese_va_Superviseur_Faible" name="rd_Synthese_A_Superviseur" <?php if($risque=="faible") {echo 'checked=checked';}?>disabled/>Faible<br />
											<input type="radio" class="risque" value="moyen" id="Synthese_va_Superviseur_Moyen" name="rd_Synthese_A_Superviseur" <?php if($risque=="moyen") {echo 'checked=checked';}?>disabled/>Moyen<br />
											<input type="radio" class="risque" value="eleve" id="Synthese_va_Superviseur_Eleve" name="rd_Synthese_A_Superviseur" <?php if($risque=="eleve") {echo 'checked=checked';}?>disabled/>Elevé
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
<div id="interface_va_Superviseur_Droite_Bas">
	<table>
		<tr>
			<td height="30" bgcolor="#ccc" width="410" align="center">
				<input type="button" class="bouton" value="Retour"id="Int_va_Retour_Superviseur" />&nbsp;&nbsp;		
				<input type="button" class="bouton" value="Validation" id="conclusion_va_Superviseur"<?php if($nombre_resultat==1){echo "disabled";}?>  />
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
<!--div id="fancybox_sup_btn_va"></div-->
<!--********************************************************************************************************-->
<!--***********************************Message de fermeture de la page*************************************-->
<div id="message_fermeture_va_sup"><?php include '../../../cycleVente/Ventea/sms/Message retour va superviseur.php';?></div>
<!--*******************************************************************************************************-->
<!--div id="fancybox_superviseur"></div-->
<!--******************************************************************************************************-->
<!--***********************************Interface A Message conclusion superviseur*************************-->
<!--div id="message_Synthese" data-options="handle:'#dragg'" align="center">
<div id="dragg" class="td_Titre_Question"><br />SYNTHESE</div-->
<div id="interface_va_Conclusion_Superviseur" data-options="handle:'#dragg_conlus_va'" align="center">
<div id="dragg_conlus_va" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include '../../../cycleVente/Ventea/form/Interface_va_Conclusion.php';?></div>
<!--******************************************************************************************************-->
<!--**********************************Interface de message de terminaison du conclusion*******************-->
<div id="Message_Conclusion_va_Terminer"><?php include '../../../cycleVente/Ventea/sms/Message terminer conclusion va.php';?></div>
<!--******************************************************************************************************-->
<!--*********************************Interface de terminaison du cunclusion/sms*******************************-->
<div id="message_Slide_Conclusion_va"><?php include '../../../cycleVente/Ventea/sms/Message slide va conclusion.php';?></div>
<!--******************************************************************************************************-->
<!--********************************Emplacement du bouton de fermeture************************************-->
<div id="message_Sup_Donnees_perdues"><?php include '../../../cycleVente/Ventea/sms/Message superviseur donnee perdues.php'; ?></div>
<!--******************************************************************************************************-->
<!--*******************************Interface de message vide de la conclusion******************************-->
<div id="mess_vide_conclusion_va"><?php include '../../../cycleVente/Ventea/sms/Mess_vide_conclus_va.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************Pas de synthèse******************************************-->
<div id="mess_pas_synth"><?php include '../../../cycleVente/Ventea/sms/mess_vide_conclus_va.php';?></div>
<!--************************************************************************************-->