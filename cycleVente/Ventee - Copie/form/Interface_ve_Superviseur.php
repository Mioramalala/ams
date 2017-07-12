<?php 

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=29 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$synthese_ve=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=29 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==386 || $donnees1['QUESTION_ID']==387 || $donnees1['QUESTION_ID']==388)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON")){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==389 || $donnees1['QUESTION_ID']==390 || $donnees1['QUESTION_ID']==391)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==392)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
?>
<link href="cycleVente/Ventee/css/div.css" rel="stylesheet" type="text/css" />
<link href="cycleVente/Ventee/css/div_ve.css" rel="stylesheet" type="text/css" />
<link href="cycleVente/Ventee/css/class.css" rel="stylesheet" type="text/css" />
<link href="cycleVente/Ventee/css/div_fermer_quest_objectif_ve.css" rel="stylesheet" type="text/css" />

<script>
$(function(){
	$(document).ready(function() {
		$('#int_conclusion_ve_superviseur').draggable();
	});
	//evenement de retour dans le menu principale
	$('#int_ve_Sup_Retour').click(function(){
		$('#mess_ret_ve_sup').show();
		$('#int_conclusion_ve_superviseur').hide();
		$('#fancybox_bouton_ve').show();
		//$('#table_questionnaire_d_Sup').hide()
		closedButtSupve();
	});
	//evenement de la conclusion de B superviseur
	$('#int_ve_sup_conclusion').click(function(){
		if(document.getElementById("txarea_synthese_ve").value==""){
			$('#mess_synth_non').show();
			$('#fancybox_bouton_ve').show();
			closedButtSupve();
		}
		else{
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventee/php/getConclus.php',
				data:{mission_id:mission_id, cycleAchatId:29},
				success:function(e){
					eo=""+e+"";
					doc=eo.split(',');
					$('#commentaire_Question_ve_sup_conclusion').val(doc[0]);
					if(doc[1]=='faible'){
						document.getElementById("rad_Conclus_Faible_ve").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rad_Conclus_Moyen_ve").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rad_Conclus_Eleve_ve").checked=true;
					}
					if(doc[2]==1){
						document.getElementById("rad_Conclus_Faible_ve").disabled=true;
						document.getElementById("rad_Conclus_Moyen_ve").disabled=true;
						document.getElementById("rad_Conclus_Eleve_ve").disabled=true;
						document.getElementById("commentaire_Question_ve_sup_conclusion").disabled=true;								
					}			
				$('#int_conclusion_ve_superviseur').show();
				$('#fancybox_bouton_ve').show();
				}
			});
		}
		closedButtSupve();
	});
});

function closedButtSupve(){
	document.getElementById("int_ve_Sup_Retour").disabled=true;
	document.getElementById("int_ve_sup_conclusion").disabled=true;	
}
function openButtSupve(){
	document.getElementById("int_ve_Sup_Retour").disabled=false;
	document.getElementById("int_ve_sup_conclusion").disabled=false;	
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_conc_ve" style="display:none;"/>
<div id="int_ve_Sup">
	<div id="Interface_Question_ve_Superviseur"><?php include '../../../cycleVente/Ventee/form/Interface_ve_Questionnaire_Superviseur.php'?></div>
		<div id="Interface_Synthese_ve_Audit">
			<table width="100%" bgcolor="#ccc">
				<tr>
					<td class="sous_Titre" height="30">SYNTHESE</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><textarea cols="22" rows="15" readonly id="txarea_synthese_ve" ><?php echo $synthese_ve; ?></textarea>
					</td>
					<td>
						<table>
							<tr>
								<td class="sous_Titre" align="center">Score :	</td>
							</tr>
							<tr>
								<td class="sous_Titre" align="center" height="30"><?php echo $score_final; ?>/12</td>
							</tr>

							<tr>
								<td class="sous_Titre" height="30">Niveau de risque</td>
							</tr>
							<tr>
								<td class="sous_Titre" height="50">
									<input type="radio" id="ve_Synthese_ve_Faible" <?php if($risque=="faible") echo 'checked'; ?> disabled />Faible<br />
									<input type="radio" id="ve_Synthese_ve_Moyen" <?php if($risque=="moyen") echo 'checked'; ?> disabled />Moyen<br />
									<input type="radio" id="ve_Synthese_ve_Eleve" <?php if($risque=="eleve") echo 'checked'; ?> disabled />Elevé<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div id="Interface_Conclusion_ve_Audit">
			<table width="100%" class="sous_Titre">
				<tr>
					<td align="center">
						<input type="button" value="retour" class="bouton" id="int_ve_Sup_Retour"/>
						<input type="button" value="conclusion" class="bouton" id="int_ve_sup_conclusion" />
					</td>
				</tr>
			</table>
		</div>
		<div id="fancybox_bouton_ve"></div>
	<!--div id="Int_Droite_B">
		<input type="button" class="bouton" value="Retour" id="int_B_Retour" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_B_Synthese" /><br />
		<input type="button" class="bouton" value="Liste" id="Int_B_Liste_B" /><br />
		<input type="button" class="bouton" value="Suivant" id="Int_B_Suivant" />
	</div-->

	<div id="int_Bouton_Interface_ve" align="center">

	</div>

	<!--div id="Question_d_23_Sup"></div>
	<div id="Question_d_24_Sup"></div>
	<div id="Question_d_25_Sup"></div>	
	<div id="Question_d_26_Sup"></div>
	<div id="Question_d_27_Sup"></div>
	<div id="Question_d_28_Sup"></div>
	<div id="Question_d_29_Sup"></div>
	<div id="Question_d_30_Sup"></div>
	<div id="Question_d_31_Sup"></div>
	<div id="Question_d_32_Sup"></div>
	<div id="Question_d_33_Sup"></div>
	<div id="Question_d_34_Sup"></div-->
<!--****************************************Interface A Terminer conclusion********************************-->
<div id="message_Terminer_question_ve"><?php include '../sms/Message terminer question ve.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface B Synthese*******************************************-->
<div id="Int_Synthese_ve"><?php include 'Interface_ve_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_ve"><?php include '../sms/Message terminer synthese ve.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************Message de fermeture de la conclusion de l'objectif B sup*********************-->
<div id="mess_Termine_conclusion_ve_sup"><?php include '../sms/Message_fermer_conclusion_ve_sup.php';?></div>
<!--*******************************************************************************************************-->
<div id="mess_valide_conclusion_ve_sup"><?php include '../sms/Message_confirmation_conclusion_ve_sup.php'; ?></div>
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_ve"><?php include '../sms/Message slide ve Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_ve"><?php include '../sms/Message slide question terminer ve.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de conclusion de B superviseur*****************************-->
<div id="int_conclusion_ve_superviseur" data-options="handle:'#dragg_conlus_ve'" align="center">
<div id="dragg_conlus_ve" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include 'Interface_ve_superviseur_conclusion.php'; ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de retour B superviseur************************************-->
<div id="message_retour_ve_sup"><?php include '../sms/Message_retour_ve_sup.php'; ?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de confirmation de retour****************************************-->
<div id="mess_ret_ve_sup"><?php include '../sms/Mess_ret_ve_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de validation de la conclusion******************************-->
<div id="mess_slide_conclusion_ve"><?php include '../sms/Message_slide_ve_conclusion.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de page vide de la conclusion*******************************-->
<!--div id="mess_conclus_vide"><?php //include '../sms/sms_empty/Mess_conclus_vide_sup.php';?></div-->
<!--*******************************************************************************************************-->
<!--******************************Message de la formulaire de la synthèse non exipant*********************-->
<div id="mess_synth_non"><?php include '../sms/mess_non_synth.php';?></div>
<!--*******************************************************************************************************-->

<div id="mess_empty_conclus_ve"><?php include '../sms/sms_empty/mess_empty_conclus.php'; ?>
</div>
