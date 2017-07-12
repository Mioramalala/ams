<?php 

include '../../../connexion.php';
@session_start();
$mission_id=$_SESSION['idMission'];


// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=9 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1) {
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=9 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque=utf8_encode($donnees2['CONCLUSION_RISQUE']);

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=9 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$commentaire=utf8_encode($donnees['SYNTHESE_COMMENTAIRE']);
	$risque=utf8_encode($donnees['SYNTHESE_RISQUE']);

}

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=9 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==110 || $donnees1['QUESTION_ID']==111 || $donnees1['QUESTION_ID']==116)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==106 || $donnees1['QUESTION_ID']==107 || $donnees1['QUESTION_ID']==108 || $donnees1['QUESTION_ID']==109 || $donnees1['QUESTION_ID']==110 || $donnees1['QUESTION_ID']==111 || $donnees1['QUESTION_ID']==112 || $donnees1['QUESTION_ID']==113 || $donnees1['QUESTION_ID']==114 || $donnees1['QUESTION_ID']==115 || $donnees1['QUESTION_ID']==116)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==106 || $donnees1['QUESTION_ID']==108 || $donnees1['QUESTION_ID']==112)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==107 || $donnees1['QUESTION_ID']==109 || $donnees1['QUESTION_ID']==113 || $donnees1['QUESTION_ID']==114 || $donnees1['QUESTION_ID']==115)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
?>
<link href="cycleImmo/Immod/css/div.css" rel="stylesheet" type="text/css" />
<link href="cycleImmo/Immod/css/div_imd.css" rel="stylesheet" type="text/css" />
<link href="cycleImmo/Immod/css/class.css" rel="stylesheet" type="text/css" />
<link href="cycleImmo/Immod/css/div_fermer_quest_objectif_imd.css" rel="stylesheet" type="text/css" />


<link href="css/cssSousmenueCycle.css" rel="stylesheet" type="text/css" />

<script>
$(function(){
	$(document).ready(function() {
		$('#int_conclusion_imd_superviseur').draggable();
	});
	//evenement de retour dans le menu principale
	$('#int_imd_Sup_Retour').click(function(){
		$('#mess_ret_imd_sup').show();
		$('#int_conclusion_imd_superviseur').hide();
		$('#fancybox_bouton_imd').show();
		closedButtSupimd();
	});
	//evenement de la conclusion de C superviseur
	//int_imb_sup_conclusion
	$('#int_imd_sup_conclusion').click(function()
	{

	var commentaire=$('#txarea_synthese_imd').val();
		var risque=$('input[type=radio][name=risque]:checked').val();

		if(document.getElementById("txarea_synthese_imd").value==""){
			$('#mess_synth_non').show();
			$('#fancybox_bouton_imd').show();
			closedButtSupimd();
		}
		else{
			$.ajax({
				type:'POST',
				//url:'cycleImmo/Immod/php/enreg_synth_imd.php',				
				url:'cycleImmo/enregistre_conclusion.php',

				data:{risque:risque,commentaire:commentaire, cycleAchatId:9},
				success:function(e){
				alert("cycle immo d bien enregistré");
					eo=""+e+"";
					doc=eo.split(',');
					$('#commentaire_Question_imd_sup_conclusion').val(doc[0]);
					if(doc[1]=='faible'){
						document.getElementById("rad_Conclus_Faible_imd").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rad_Conclus_Moyen_imd").checked=true;
					}
					else if(doc[1]=='eleve'){
					  	document.getElementById("rad_Conclus_Eleve_imd").checked=true;
					}
					if(doc[2]==1){
						document.getElementById("rad_Conclus_Faible_imd").disabled=true;
						document.getElementById("rad_Conclus_Moyen_imd").disabled=true;
						document.getElementById("rad_Conclus_Eleve_imd").disabled=true;
						document.getElementById("commentaire_Question_imd_sup_conclusion").disabled=true;								
					}


					$("#contRsciImmo").load("cycleImmo/Immo.php",function (res)
					{

						$('#contRsciImmo').show();
						$('#contSupimd').hide();
						$('#message_fermeture_imd_sup').hide();
					});

					  //  $("#contRsciImmo").load("/cycleImmo/Immo.php",function (res)
						//{


						// });



							
		 		// $('#int_conclusion_imd_superviseur').show();
		 		// $('#fancybox_bouton_imd').show();
				 }
			});
		}
		 closedButtSupimd();

	});
});

function closedButtSupimd(){
	document.getElementById("int_imd_Sup_Retour").disabled=true;
	document.getElementById("int_imd_sup_conclusion").disabled=true;	
}
function openButtSupimd(){
	document.getElementById("int_imd_Sup_Retour").disabled=false;
	document.getElementById("int_imd_sup_conclusion").disabled=false;	
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_conc_imd" style="display:none;"/>
<div id="int_imd_Sup">

	         <div id="fond_Sous_Titre" class="menu_Titre">
                    <label class="marge_Titre">Evaluation du contrôle des fournisseur</label>
                    <label class="margin_Code">Code : FC1</label>
                </div>
    		<div id="TitreobjCycle">D.Evaluation</div>

	<div id="Interface_Question_imd_Superviseur"><?php include '../../../cycleImmo/Immod/form/Interface_imd_Questionnaire_Superviseur.php';?></div>
		<div id="Interface_Synthese_imd_Audit">
			<table width="100%" bgcolor="#ccc">
				<tr>
					<td class="sous_Titre" height="30">CONCLUSION</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><textarea cols="22" rows="15" id="txarea_synthese_imd" <?php if($nombre_resultat==1){echo "disabled";}?> ><?php echo $commentaire; ?></textarea>
					</td>
					<td>
						<table>
							<tr>
								<td class="sous_Titre" align="center">Score :	</td>
							</tr>
							<tr>
								<td class="sous_Titre" align="center" height="30"><?php echo $score_final; ?>/24</td>
							</tr>

							<tr>
								<td class="sous_Titre" height="30">Niveau de risque</td>
							</tr>
							<tr>
								<td class="sous_Titre" height="50">
									<?php if($nombre_resultat==1){ ?>
										<input type="radio"	 value="faible" id="rd_Synthese_imd_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
										<input type="radio"  value="moyen" id="rd_Synthese_imd_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
										<input type="radio"  value="eleve" id="rd_Synthese_imd_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';} ?>disabled/>Elevé
									<?php } else{?>
										<input type="radio" value="faible" id="rd_Synthese_imd_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?>/>Faible<br />
										<input type="radio" value="moyen" id="rd_Synthese_imd_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
										<input type="radio" value="eleve" id="rd_Synthese_imd_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';}?>/>Elevé
									<?php } ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div id="Interface_Conclusion_imd_Audit">
			<table width="100%" class="sous_Titre">
				<tr>
					<td align="center">
						<input type="button" value="retour" class="bouton" id="int_imd_Sup_Retour"/>
						<input type="button" value="Validation" class="bouton" id="int_imd_sup_conclusion" <?php if($nombre_resultat==1){echo "disabled";}?> />
					</td>
				</tr>
			</table>
		</div>
		<div id="fancybox_bouton_imd"></div>

	<div id="int_Bouton_Interface_imd" align="center">

	</div>

<!--****************************************Interface A Terminer conclusion********************************-->
<div id="message_Terminer_question_imd"><?php include '../sms/Message terminer question imd.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface B Synthese*******************************************-->
<div id="Int_Synthese_imd"><?php include 'Interface_imd_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_imd"><?php include '../sms/Message terminer synthese imd.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************Message de fermeture de la conclusion de l'objectif B sup*********************-->
<div id="mess_Termine_conclusion_imd_sup"><?php include '../sms/Message_fermer_conclusion_imd_sup.php';?></div>
<!--*******************************************************************************************************-->
<div id="mess_valide_conclusion_imd_sup"><?php include '../sms/Message_confirmation_conclusion_imd_sup.php'; ?></div>
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_imd"><?php include '../sms/Message slide imd Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_imd"><?php include '../sms/Message slide question terminer imd.php';?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de conclusion de B superviseur*****************************-->
<div id="int_conclusion_imd_superviseur" data-options="handle:'#dragg_conlus_imd'" align="center">
<div id="dragg_conlus_imd" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include 'Interface_imd_superviseur_conclusion.php'; ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de retour B superviseur************************************-->
<div id="message_retour_imd_sup"><?php include '../sms/Message_retour_imd_sup.php'; ?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de confirmation de retour****************************************-->
<div id="mess_ret_imd_sup"><?php include '../sms/Mess_ret_imd_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de validation de la conclusion******************************-->
<div id="mess_slide_conclusion_imd"><?php include '../sms/Message_slide_imd_conclusion.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de page vide de la conclusion*******************************-->
<!--div id="mess_conclus_vide"><?php //include '../sms/sms_empty/Mess_conclus_vide_sup.php';?></div-->
<!--*******************************************************************************************************-->
<!--******************************Message de la formulaire de la synthèse non existant*********************-->
<div id="mess_synth_non"><?php include '../sms/mess_non_synth.php';?></div>
<!--*******************************************************************************************************-->

<div id="mess_empty_conclus_imd"><?php include '../sms/sms_empty/mess_empty_conclus.php'; ?>
</div>
