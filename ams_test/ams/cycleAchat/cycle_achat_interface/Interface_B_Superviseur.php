<?php 

include '../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=2 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$synthese_b=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=2 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==1 || $donnees1['QUESTION_ID']==2 || $donnees1['QUESTION_ID']==3 || $donnees1['QUESTION_ID']==4 || $donnees1['QUESTION_ID']==5 || $donnees1['QUESTION_ID']==6 || $donnees1['QUESTION_ID']==17)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==1 || $donnees1['QUESTION_ID']==21 || $donnees1['QUESTION_ID']==22 || $donnees1['QUESTION_ID']==2 || $donnees1['QUESTION_ID']==3 || $donnees1['QUESTION_ID']==4 || $donnees1['QUESTION_ID']==5 || $donnees1['QUESTION_ID']==6 || $donnees1['QUESTION_ID']==7 || $donnees1['QUESTION_ID']==8 || $donnees1['QUESTION_ID']==9 || $donnees1['QUESTION_ID']==10 || $donnees1['QUESTION_ID']==11 || $donnees1['QUESTION_ID']==12 || $donnees1['QUESTION_ID']==13 || $donnees1['QUESTION_ID']==14 || $donnees1['QUESTION_ID']==15 || $donnees1['QUESTION_ID']==16 || $donnees1['QUESTION_ID']==17 || $donnees1['QUESTION_ID']==18 || $donnees1['QUESTION_ID']==19 || $donnees1['QUESTION_ID']==20)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==7 || $donnees1['QUESTION_ID']==8 || $donnees1['QUESTION_ID']==10 || $donnees1['QUESTION_ID']==13 || $donnees1['QUESTION_ID']==14 || $donnees1['QUESTION_ID']==15 || $donnees1['QUESTION_ID']==18 || $donnees1['QUESTION_ID']==19 || $donnees1['QUESTION_ID']==20)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==9 || $donnees1['QUESTION_ID']==11 || $donnees1['QUESTION_ID']==12 || $donnees1['QUESTION_ID']==16 || $donnees1['QUESTION_ID']==21 || $donnees1['QUESTION_ID']==22)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
?>
<link href="cycleAchat/cycle_achat_css/div.css" rel="stylesheet" type="text/css" />
<!--link href="../cycle_achat_css/class.css" rel="stylesheet" type="text/css" /-->
<link href="cycleAchat/cycle_achat_css/div_fermer_quest_objectif_B.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_css/class_b/class.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_css/class_b/div.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.js"></script>
<script type="text/javascript" src="cycleAchat/cycle_achat_js/js.js"></script>
<script type="text/javascript" src="cycleAchat/cycle_achat_js/js_b.js"></script>

<script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.easyui.min.js"></script>

<script>
$(function(){
	$(document).ready(function() {
		$('#int_conclusion_B_superviseur').draggable();
	});
});
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_conc_b" style="display:none;"/>
<div id="int_B_Sup">
	<div id="Interface_Question_B_Superviseur"><?php include '../../cycleAchat/cycle_achat_interface/Interface_B_Questionnaire_Superviseur.php'?></div>
		<div id="Interface_Synthese_B_Audit">
			<table width="100%" bgcolor="#ccc">
				<tr>
					<td class="sous_Titre" height="30">SYNTHESE</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><textarea cols="22" rows="15" readonly id="txarea_synthese" ><?php echo $synthese_b; ?></textarea>
					</td>
					<td>
						<table>
							<tr>
								<td class="sous_Titre" align="center">Score :	</td>
							</tr>
							<tr>
								<td class="sous_Titre" align="center" height="30"><?php echo $score_final; ?>/44</td>
							</tr>

							<tr>
								<td class="sous_Titre" height="30">Niveau de risque</td>
							</tr>
							<tr>
								<td class="sous_Titre" height="50">
									<input type="radio" id="rd_Synthese_B_Faible" <?php if($risque=="faible") echo 'checked'; ?> disabled />Faible<br />
									<input type="radio" id="rd_Synthese_B_Moyen" <?php if($risque=="moyen") echo 'checked'; ?> disabled />Moyen<br />
									<input type="radio" id="rd_Synthese_B_Eleve" <?php if($risque=="eleve") echo 'checked'; ?> disabled />Elevé<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div id="Interface_Conclusion_B_Audit">
			<table width="100%" class="sous_Titre">
				<tr>
					<td align="center">
						<input type="button" value="retour" class="bouton" id="int_B_Sup_Retour"/>
						<input type="button" value="conclusion" class="bouton" id="int_B_sup_conclusion" />
					</td>
				</tr>
			</table>
		</div>
		<div id="fancybox_bouton_b"></div>
	<!--div id="Int_Droite_B">
		<input type="button" class="bouton" value="Retour" id="int_B_Retour" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_B_Synthese" /><br />
		<input type="button" class="bouton" value="Liste" id="Int_B_Liste_B" /><br />
		<input type="button" class="bouton" value="Suivant" id="Int_B_Suivant" />
	</div-->

	<div id="int_Bouton_Interface_B" align="center">

	</div>

	<div id="Question_B_1_Sup"></div>
	<div id="Question_B_2_Sup"></div>
	<div id="Question_B_3_Sup"></div>	
	<div id="Question_B_4_Sup"></div>
	<div id="Question_B_5_Sup"></div>
	<div id="Question_B_6_Sup"></div>
	<div id="Question_B_7_Sup"></div>
	<div id="Question_B_8_Sup"></div>
	<div id="Question_B_9_Sup"></div>
	<div id="Question_B_10_Sup"></div>
	<div id="Question_B_11_Sup"></div>
	<div id="Question_B_12_Sup"></div>
	<div id="Question_B_13_Sup"></div>
	<div id="Question_B_14_Sup"></div>
	<div id="Question_B_15_Sup"></div>
	<div id="Question_B_16_Sup"></div>
	<div id="Question_B_17_Sup"></div>
	<div id="Question_B_18_Sup"></div>
	<div id="Question_B_19_Sup"></div>
	<div id="Question_B_20_Sup"></div>
	<div id="Question_B_21_Sup"></div>
	<div id="Question_B_22_Sup"></div>
	
<!--****************************************Interface A Terminer conclusion********************************-->
<div id="message_Terminer_question_B"><?php include '../../cycleAchat/cycle_achat_message/Message terminer question B.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface B Synthese*******************************************-->
<div id="Int_Synthese_B"><?php include '../../cycleAchat/cycle_achat_interface/Interface_B_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_B"><?php include '../../cycleAchat/cycle_achat_message/Message terminer synthese B.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************Message de fermeture de la conclusion de l'objectif B sup*********************-->
<div id="mess_Termine_conclusion_B_sup"><?php include '../../cycleAchat/cycle_achat_message/Message_fermer_conclusion_B_sup.php';?></div>
<!--*******************************************************************************************************-->
<div id="mess_valide_conclusion_B_sup"><?php include '../../cycleAchat/cycle_achat_message/Message_confirmation_conclusion_B_sup.php'; ?></div>
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_B"><?php include '../../cycleAchat/cycle_achat_message/Message slide B Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_B"><?php include '../../cycleAchat/cycle_achat_message/Message slide question terminer B.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de conclusion de B superviseur*****************************-->
<div id="int_conclusion_B_superviseur" data-options="handle:'#dragg_conlus'" align="center">
<div id="dragg_conlus" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include '../../cycleAchat/cycle_achat_interface/Interface_B_superviseur_conclusion.php'; ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de retour B superviseur************************************-->
<div id="message_retour_B_sup"><?php include '../../cycleAchat/cycle_achat_message/Message_retour_B_sup.php'; ?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de confirmation de retour****************************************-->
<div id="mess_ret_B_sup"><?php include '../../cycleAchat/cycle_achat_message/Mess_ret_B_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de validation de la conclusion******************************-->
<div id="mess_slide_conclusion_B"><?php include '../../cycleAchat/cycle_achat_message/Message_slide_B_conclusion.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de page vide de la conclusion*******************************-->
<div id="mess_conclus_vide"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_conclus_vide_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de la formulaire de la synthèse non existant*********************-->
<div id="mess_synth_non"><?php include '../../cycleAchat/cycle_achat_message/mess_non_synth.php';?></div>
<!--*******************************************************************************************************-->
</div>
