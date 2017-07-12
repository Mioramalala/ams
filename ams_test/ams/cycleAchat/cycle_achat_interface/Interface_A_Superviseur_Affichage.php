<?php

include '../../connexion.php';

$reponse = $bdd->query('SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=1');

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];
?>

<script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.easyui.min.js"></script>
<script>
$(function(){
	$(document).ready(function() {
		$('#interface_A_Conclusion_Superviseur').draggable();
	});
});
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
						include '../../connexion.php';

						$reponse = $bdd->query('SELECT DISTINCT POSTE_CLE_NOM FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID');

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
</div>
<table>
<tr>
	<td>
<div id="Int_A_Sup_Overflow">
<table class="label">
	<tr bgcolor="#ccc">
		<td width="250">1 Demandeurs d'achats</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_A1_check_fonct_sup.php'?></td>
	</tr>
	<tr>
		<td width="250">2 Établissement des commandes</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A2.php'?></td>
	</tr>
	<tr  bgcolor="#ccc">
		<td width="250">3 Autorisation des commandes</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A3.php'?></td>
	</tr>
	<tr>
		<td width="250">4 Réception</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A4.php'?></td>
	</tr>
	<tr bgcolor="#ccc">
		<td width="250">5 Comparaison commande-facture</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A5.php'?></td>
	</tr>
	<tr>
		<td width="250">6 Comparaison bon de réception-facture</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A6.php'?></td>
	</tr>
	<tr bgcolor="#ccc">
		<td width="250">7 Imputation comptable</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A7.php'?></td>
	</tr>
	<tr>
		<td width="250">8 Vérification de l'imputation comptable</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A8.php'?></td>
	</tr>
	<tr bgcolor="#ccc">
		<td width="250">9 Bon à payer</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A9.php'?></td>
	</tr>
	<tr>
		<td width="250">10 Tenue du journal des achats</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A10.php'?></td>
	</tr>
	<tr bgcolor="#ccc">
		<td width="250">11 Tenue des comptes fournisseurs</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A11.php'?></td>
	</tr>
	<tr>
		<td width="250">12 Rapprochement des relevés fournisseurs avec les comptes</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A12.php'?></td>
	</tr>
	<tr bgcolor="#ccc">
		<td width="250">13 Rapprochement de la balance fournisseurs avec le compte collectif</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A13.php'?></td>
	</tr>
	<tr>
		<td width="250">14 Centralisation des achats</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A14.php'?></td>
	</tr>
	<tr bgcolor="#ccc">
		<td width="250">15 Signature des chèques</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A15.php'?></td>
	</tr>
	<tr>
		<td width="250">16 Envoi des chèques</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A16.php'?></td>
	</tr>
	<tr bgcolor="#ccc">
		<td width="250">17 Acceptation des traites</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A17.php'?></td>
	</tr>
	<tr>
		<td width="250">18 Tenue du journal des effets à payer</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A18.php'?></td>
	</tr>
	<tr bgcolor="#ccc">
		<td width="250">19 Tenue du journal de trésorerie</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A19.php'?></td>
	</tr>
	<tr>
		<td width="250">20 Annulation des pièces justificatives</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A20.php'?></td>
	</tr>
	<tr bgcolor="#ccc">
		<td width="250">21 Accès à la comptabilité générale</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A21.php'?></td>
	</tr>
	<tr>
		<td width="250">22 Suivi des avoirs</td>
		<td width="400"><?php include '../../cycleAchat/cycle_achat_load/load_check_fonct_sup_A22.php'?></td>
	</tr>
	<tr>
		<td width="250">Niveau de risque</td>
		<td width="400"><div id="load_risque"><?php include '../../cycleAchat/cycle_achat_load/load_risque_sup_A.php'?></div></td>
	</tr>
</table>
</div>
<!--div id="fancybox_sup"></div-->
</td>
<td>
<!--****************************************Interface A Superviseur droite*********************************-->
<!--div id="frm_droite"-->
<div id="interface_A_Superviseur_Droite">
	<table>
		<tr>
			<td class="sous_Titre" height="30" bgcolor="#ccc" width="410">SYNTHESE</td>
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td width="100">
							<textarea id="Synthese_A_Superviseur" cols="34" rows="15" readonly ><?php echo $commentaire;?></textarea>
						</td>
						<td>
							<table height="180">
								<tr>
									<td  class="sous_Titre" height="170">Niveau de risque:<br /><br />
										<span>
											<input type="radio" id="Synthese_A_Superviseur_Faible" name="rd_Synthese_A_Superviseur" <?php if($risque=="faible") echo 'checked'; ?> disabled />Faible<br />
											<input type="radio" id="Synthese_A_Superviseur_Moyen" name="rd_Synthese_A_Superviseur" <?php if($risque=="moyen") echo 'checked'; ?> disabled />Moyen<br />
											<input type="radio" id="Synthese_A_Superviseur_Eleve" name="rd_Synthese_A_Superviseur" <?php if($risque=="eleve") echo 'checked'; ?> disabled />Elevé
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
<div id="interface_A_Superviseur_Droite_Bas">
	<table>
		<tr>
			<td height="30" bgcolor="#ccc" width="410" align="center">
				<input type="button" class="bouton" value="Retour"id="Int_A_Retour_Superviseur" />&nbsp;&nbsp;		
				<input type="button" class="bouton" value="Conclusion" id="conclusion_A_Superviseur" />
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
<!--*************************************Fancybox des boutons retour et conclusion**************************-->
<div id="fancybox_sup_btn"></div>
<!--********************************************************************************************************-->
<!--***********************************Message de fermeture de la page*************************************-->
<div id="message_fermeture_A_sup"><?php include '../../cycleAchat/cycle_achat_message/Message retour A superviseur.php';?></div>
<!--*******************************************************************************************************-->
<!--div id="fancybox_superviseur"></div-->
<!--******************************************************************************************************-->
<!--***********************************Interface A Message conclusion superviseur*************************-->
<!--div id="message_Synthese" data-options="handle:'#dragg'" align="center">
<div id="dragg" class="td_Titre_Question"><br />SYNTHESE</div-->
<div id="interface_A_Conclusion_Superviseur" data-options="handle:'#dragg_conlus'" align="center">
<div id="dragg_conlus" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include '../../cycleAchat/cycle_achat_interface/Interface_A_Conclusion.php';?></div>
<!--******************************************************************************************************-->
<!--**********************************Interface de message de terminaison du conclusion*******************-->
<div id="Message_Conclusion_A_Terminer"><?php include '../../cycleAchat/cycle_achat_message/Message terminer conclusion A.php'?></div>
<!--******************************************************************************************************-->
<!--*********************************Interface de terminaison du cunclusion*******************************-->
<div id="message_Slide_Conclusion_A"><?php include '../../cycleAchat/cycle_achat_message/Message slide A conclusion.php'?></div>
<!--******************************************************************************************************-->
<!--********************************Emplacement du bouton de fermeture************************************-->
<div id="message_Sup_Donnees_perdues"><?php include '../../cycleAchat/cycle_achat_message/Message superviseur donnee perdues.php'; ?></div>
<!--******************************************************************************************************-->
<!--*******************************Interface de message vide de la conclusion******************************-->
<div id="mess_vide_conclusion_A"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_A/Mess_vide_conclus_A.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************Pas de synthèse******************************************-->
<div id="mess_pas_synth"><?php include '../../cycleAchat/cycle_achat_message/mess_vide_conclus_a.php';?></div>
<!--************************************************************************************-->