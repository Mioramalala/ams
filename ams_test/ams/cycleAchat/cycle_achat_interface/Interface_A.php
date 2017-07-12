<script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.easyui.min.js"></script>

<script>
$(function(){
	$(document).ready(function() {
		$('#message_Synthese_a').draggable();
		$('#interface_A_Conclusion_Superviseur').draggable();
	});
});
</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<div id="int_A">
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
	include '../../connexion.php';

	$reponse = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE MISSION_ID='.$mission_id.' AND tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId);
	
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
<div id="table_Interface_A">
<table  class="label">
	<tr bgcolor="#efefef">
		<td width="380">1 Demandeurs d'achats</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_1.php'?></td>
	</tr>
	<tr>
		<td width="380">2 Établissement des commandes</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_2.php'?></td>
	</tr>
	<tr  bgcolor="#efefef">
		<td width="380">3 Autorisation des commandes</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_3.php'?></td>
	</tr>
	<tr>
		<td width="380">4 Réception</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_4.php'?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">5 Comparaison commande-facture</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_5.php'?></td>
	</tr>
	<tr>
		<td width="380">6 Comparaison bon de réception-facture</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_6.php'?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">7 Imputation comptable</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_7.php'?></td>
	</tr>
	<tr>
		<td width="380">8 Vérification de l'imputation comptable</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_8.php'?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">9 Bon à payer</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_9.php'?></td>
	</tr>
	<tr>
		<td width="380">10 Tenue du journal des achats</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_10.php'?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">11 Tenue des comptes fournisseurs</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_11.php'?></td>
	</tr>
	<tr>
		<td width="380">12 Rapprochement des relevés fournisseurs avec les comptes</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_12.php'?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">13 Rapprochement de la balance fournisseurs avec le compte collectif</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_13.php'?></td>
	</tr>
	<tr>
		<td width="380">14 Centralisation des achats</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_14.php'?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">15 Signature des chèques</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_15.php'?></td>
	</tr>
	<tr>
		<td width="380">16 Envoi des chèques</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_16.php'?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">17 Acceptation des traites</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_17.php'?></td>
	</tr>
	<tr>
		<td width="380">18 Tenue du journal des effets à payer</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_18.php'?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">19 Tenue du journal de trésorerie</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_19.php'?></td>
	</tr>
	<tr>
		<td width="380">20 Annulation des pièces justificatives</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_20.php'?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">21 Accès à la comptabilité générale</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_21.php'?></td>
	</tr>
	<tr>
		<td width="380">22 Suivi des avoirs</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_A_Check_Fonction_22.php'?></td>
	</tr>
	<tr>
		<td width="380">Niveaux de risque</td>
		<td width="900"><?php include '../../cycleAchat/cycle_achat_load/Load_Risque_A.php'; ?></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="button" class="bouton" value="Retour"id="Int_A_Retour" />&nbsp;&nbsp;
			<input type="button" class="bouton" value="Suivant" id="Int_A_Suivant" />
		</td>
	</tr>
</table>

</div>
</div>
<!--div id="int_Bouton" align="center" style="margin-top:-20px;">

</div-->
<div id="fancybox"></div>
<!--****************************************Interface A questionnaire**************************************-->
<div id="interface_Question_A"><?php include '../../cycleAchat/cycle_achat_interface/Interface_A_Questionnaire.php';?></div>
<!--*******************************************************************************************************-->


<!------------------------------Tsizy--------------------------------->
<!--****************************************Interface A questionnaire**************************************-->
<!--div id="interface_Conclusion_A"><?php //include 'cycleAchat/cycle_achat_interface/Interface_A_conclusion.php';?></div-->
<!--*******************************************************************************************************-->
<!--****************************************Interface A Terminer conclusion********************************-->
<!--div id="message_Terminer" align="center"><?php //include 'cycleAchat/cycle_achat_message/Message terminer.php';?></div-->
<!--*******************************************************************************************************-->
<!--****************************************Interface A Synthese conclusion********************************-->



<div id="message_Synthese_a" data-options="handle:'#dragg'" align="center">
<div id="dragg" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include '../../cycleAchat/cycle_achat_interface/Interface_A_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface A Synthese A terminer********************************-->
<div id="message_Synthese_Terminer" align="center"><?php include '../../cycleAchat/cycle_achat_message/Message synthese termine.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Slide"><?php include '../../cycleAchat/cycle_achat_message/Message slide.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Donnees_Perdu"><?php include '../../cycleAchat/cycle_achat_message/Message donnees perdu.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de fermeture de la page***************************************-->
<div id="message_Fermeture_A"><?php include '../../cycleAchat/cycle_achat_message/Message retour A.php'?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de message vide du synthese***********************************-->
<div id="mess_vide_synthese_A"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_A/Mess_vide_synth_A.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***************************Formulaire de comptage de resultat de a*************************************-->
<div id="mess_vide_a"><?php include '../../cycleAchat/cycle_achat_message/mess_vide_a.php'; ?></div>
