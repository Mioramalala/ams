<?php 

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=13 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=13 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==159 || $donnees1['QUESTION_ID']==161 || $donnees1['QUESTION_ID']==167 || $donnees1['QUESTION_ID']==180)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==152 || $donnees1['QUESTION_ID']==153 || $donnees1['QUESTION_ID']==154 || $donnees1['QUESTION_ID']==155 || $donnees1['QUESTION_ID']==156 || $donnees1['QUESTION_ID']==157 || $donnees1['QUESTION_ID']==158 || $donnees1['QUESTION_ID']==159 || $donnees1['QUESTION_ID']==160 || $donnees1['QUESTION_ID']==161 || $donnees1['QUESTION_ID']==162 || $donnees1['QUESTION_ID']==163 || $donnees1['QUESTION_ID']==164 || $donnees1['QUESTION_ID']==165 || $donnees1['QUESTION_ID']==166 || $donnees1['QUESTION_ID']==167 || $donnees1['QUESTION_ID']==168 || $donnees1['QUESTION_ID']==169 || $donnees1['QUESTION_ID']==170 || $donnees1['QUESTION_ID']==171 || $donnees1['QUESTION_ID']==172 || $donnees1['QUESTION_ID']==173 || $donnees1['QUESTION_ID']==174 || $donnees1['QUESTION_ID']==175 || $donnees1['QUESTION_ID']==176 || $donnees1['QUESTION_ID']==177 || $donnees1['QUESTION_ID']==178 || $donnees1['QUESTION_ID']==179 || $donnees1['QUESTION_ID']==180)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==154 || $donnees1['QUESTION_ID']==155 || $donnees1['QUESTION_ID']==156 || $donnees1['QUESTION_ID']==160 || $donnees1['QUESTION_ID']==164 || $donnees1['QUESTION_ID']==165 || $donnees1['QUESTION_ID']==168 || $donnees1['QUESTION_ID']==169 || $donnees1['QUESTION_ID']==172 || $donnees1['QUESTION_ID']==173 || $donnees1['QUESTION_ID']==174 || $donnees1['QUESTION_ID']==175 || $donnees1['QUESTION_ID']==176)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==152 || $donnees1['QUESTION_ID']==153 || $donnees1['QUESTION_ID']==157 || $donnees1['QUESTION_ID']==158 || $donnees1['QUESTION_ID']==162 || $donnees1['QUESTION_ID']==163 || $donnees1['QUESTION_ID']==166 || $donnees1['QUESTION_ID']==170 || $donnees1['QUESTION_ID']==171 || $donnees1['QUESTION_ID']==177 || $donnees1['QUESTION_ID']==178 || $donnees1['QUESTION_ID']==179)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
?>
<link href="cycleStock/Stockd/css/div.css" rel="stylesheet" type="text/css" />
<link href="cycleStock/Stockd/css/div_std.css" rel="stylesheet" type="text/css" />
<link href="cycleStock/Stockd/css/class.css" rel="stylesheet" type="text/css" />
<link href="cycleStock/Stockd/css/div_fermer_quest_objectif_std.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
<script>
$(function(){
	$(document).ready(function() {
		$('#int_conclusion_std_superviseur').draggable();
	});
	//evenement de retour dans le menu principale
	$('#int_std_Sup_Retour').click(function(){
		$('#mess_ret_std_sup').show();
		$('#int_conclusion_std_superviseur').hide();
		$('#fancybox_bouton_std').show();
		closedButtSupstd();
	});
	//evenement de la conclusion de B superviseur
	$('#int_std_sup_conclusion').click(function(){
	var commentaire=$('#txarea_synthese_std').val();
		if(document.getElementById("txarea_synthese_std").value==""){
			$('#mess_synth_non').show();
			$('#fancybox_bouton_std').show();
			closedButtSupstd();
		}
		else{
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockd/php/enreg_synth_std.php',
				data:{mission_id:mission_id,commentaire:commentaire, cycleAchatId:13},
				success:function(e){
				alert("cycle stock d bien enregistré");
					eo=""+e+"";
					doc=eo.split(',');
					$('#commentaire_Question_std_sup_conclusion').val(doc[0]);
					if(doc[1]=='faible'){
						document.getElementById("rad_Conclus_Faible_std").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rad_Conclus_Moyen_std").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rad_Conclus_Eleve_std").checked=true;
					}
					if(doc[2]==1){
						document.getElementById("rad_Conclus_Faible_std").disabled=true;
						document.getElementById("rad_Conclus_Moyen_std").disabled=true;
						document.getElementById("rad_Conclus_Eleve_std").disabled=true;
						document.getElementById("commentaire_Question_std_sup_conclusion").disabled=true;								
					}			
				// $('#int_conclusion_std_superviseur').show();
				// $('#fancybox_bouton_std').show();
				}
			});
		}
		closedButtSupstd();
	});
});

function closedButtSupstd(){
	document.getElementById("int_std_Sup_Retour").disabled=true;
	document.getElementById("int_std_sup_conclusion").disabled=true;	
}
function openButtSupstd(){
	document.getElementById("int_std_Sup_Retour").disabled=false;
	document.getElementById("int_std_sup_conclusion").disabled=false;	
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_conc_std" style="display:none;"/>
<div id="int_std_Sup">
	<div id="Interface_Question_std_Superviseur"><?php include '../../../cycleStock/Stockd/form/Interface_std_Questionnaire_Superviseur.php'?></div>
		<div id="Interface_Synthese_std_Audit">
			<table width="100%" bgcolor="#ccc">
				<tr>
					<td class="sous_Titre" height="30">CONCLUSION</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><textarea cols="22" rows="15" id="txarea_synthese_std" ><?php echo $commentaire; ?></textarea>
					</td>
					<td>
						<table>
							<tr>
								<td class="sous_Titre" align="center">Score :	</td>
							</tr>
							<tr>
								<td class="sous_Titre" align="center" height="30"><?php echo $score_final; ?>/66</td>
							</tr>

							<tr>
								<td class="sous_Titre" height="30">Niveau de risque</td>
							</tr>
							<tr>
								<td class="sous_Titre" height="50">
									<input type="radio" id="rd_Synthese_std_Faible" <?php if($risque=="faible") echo 'checked'; ?> disabled />Faible<br />
									<input type="radio" id="rd_Synthese_std_Moyen" <?php if($risque=="moyen") echo 'checked'; ?> disabled />Moyen<br />
									<input type="radio" id="rd_Synthese_std_Eleve" <?php if($risque=="eleve") echo 'checked'; ?> disabled />Elevé<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div id="Interface_Conclusion_std_Audit">
			<table width="100%" class="sous_Titre">
				<tr>
					<td align="center">
						<input type="button" value="retour" class="bouton" id="int_std_Sup_Retour"/>
						<input type="button" value="Validation" class="bouton" id="int_std_sup_conclusion" />
					</td>
				</tr>
			</table>
		</div>
		<div id="fancybox_bouton_std"></div>
	

	<div id="int_Bouton_Interface_std" align="center">

	</div>

<!--****************************************Interface A Terminer conclusion********************************-->
<div id="message_Terminer_question_std"><?php include '../sms/Message terminer question std.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface B Synthese*******************************************-->
<div id="Int_Synthese_std"><?php include 'Interface_std_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_std"><?php include '../sms/Message terminer synthese std.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************Message de fermeture de la conclusion de l'objectif B sup*********************-->
<div id="mess_Termine_conclusion_std_sup"><?php include '../sms/Message_fermer_conclusion_std_sup.php';?></div>
<!--*******************************************************************************************************-->
<div id="mess_valide_conclusion_std_sup"><?php include '../sms/Message_confirmation_conclusion_std_sup.php'; ?></div>
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_std"><?php include '../sms/Message slide std Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_std"><?php include '../sms/Message slide question terminer std.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de conclusion de B superviseur*****************************-->
<div id="int_conclusion_std_superviseur" data-options="handle:'#dragg_conlus_std'" align="center">
<div id="dragg_conlus_std" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include 'Interface_std_superviseur_conclusion.php'; ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de retour B superviseur************************************-->
<div id="message_retour_std_sup"><?php include '../sms/Message_retour_std_sup.php'; ?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de confirmation de retour****************************************-->
<div id="mess_ret_std_sup"><?php include '../sms/Mess_ret_std_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de validation de la conclusion******************************-->
<div id="mess_slide_conclusion_std"><?php include '../sms/Message_slide_std_conclusion.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de page vide de la conclusion*******************************-->
<!--div id="mess_conclus_vide"><?php //include '../sms/sms_empty/Mess_conclus_vide_sup.php';?></div-->
<!--*******************************************************************************************************-->
<!--******************************Message de la formulaire de la synthèse non existant*********************-->
<div id="mess_synth_non"><?php include '../sms/mess_non_synth.php';?></div>
<!--*******************************************************************************************************-->

<div id="mess_empty_conclus_std"><?php include '../sms/sms_empty/mess_empty_conclus.php'; ?>
</div>
