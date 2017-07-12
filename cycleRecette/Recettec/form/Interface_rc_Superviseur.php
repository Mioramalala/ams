<?php 

include '../../../connexion.php';

@session_start();
$mission_id=$_SESSION['idMission'];


// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=19 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1) {
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=19 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque=utf8_encode($donnees2['CONCLUSION_RISQUE']);

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=19 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$commentaire=utf8_encode($donnees['SYNTHESE_COMMENTAIRE']);
	$risque=utf8_encode($donnees['SYNTHESE_RISQUE']);

}

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=19 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	// if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==235 || $donnees1['QUESTION_ID']==236)){
	// 	$score=1;
	// }
	if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==255 || $donnees1['QUESTION_ID']==256 || $donnees1['QUESTION_ID']==257 || $donnees1['QUESTION_ID']==258 || $donnees1['QUESTION_ID']==259 || $donnees1['QUESTION_ID']==260 || $donnees1['QUESTION_ID']==261 || $donnees1['QUESTION_ID']==262 || $donnees1['QUESTION_ID']==263)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==256)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==255 || $donnees1['QUESTION_ID']==257 || $donnees1['QUESTION_ID']==258 || $donnees1['QUESTION_ID']==259 || $donnees1['QUESTION_ID']==260 || $donnees1['QUESTION_ID']==261 || $donnees1['QUESTION_ID']==262 || $donnees1['QUESTION_ID']==263)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
?>
<link href="cycleRecette/Recettec/css/div.css" rel="stylesheet" type="text/css" />
<link href="cycleRecette/Recettec/css/div_rc.css" rel="stylesheet" type="text/css" />
<link href="cycleRecette/Recettec/css/class.css" rel="stylesheet" type="text/css" />
<link href="cycleRecette/Recettec/css/div_fermer_quest_objectif_rc.css" rel="stylesheet" type="text/css" />

<link href="css/cssSousmenueCycle.css" rel="stylesheet" type="text/css" />

<script>
$(function(){
	$(document).ready(function() {
		$('#int_conclusion_rc_superviseur').draggable();
	});
	//evenement de retour dans le menu principale
	$('#int_rc_Sup_Retour').click(function(){
		$('#mess_ret_rc_sup').show();
		$('#int_conclusion_rc_superviseur').hide();
		$('#fancybox_bouton_rc').show();
		//$('#table_questionnaire_d_Sup').hide()
		closedButtSuprc();
	});
	//evenement de la conclusion de B superviseur
	$('#int_rc_sup_conclusion').click(function(){
	var commentaire=$('#txarea_synthese_rc').val();		
	var risque=$('input[type=radio][name=risque]:checked').val();

		if(document.getElementById("txarea_synthese_rc").value==""){
			$('#mess_synth_non').show();
			$('#fancybox_bouton_rc').show();
			closedButtSuprc();
		}
		else{
			$.ajax({
				type:'POST',
				//url:'cycleRecette/Recettec/php/enreg_synth_rc.php',					
				url:'cycleRecette/enregistre_conclusion.php',
				data:{risque:risque,commentaire:commentaire,cycleAchatId:19},
				success:function(e){
				alert("cycle tresorerie recette rd bien enregistré");
				$('#contRsciRecette').show();
				$('#contSupRc').hide();
				$('#mess_ret_rc_sup').hide();
				$('#fancybox_bouton_rc').hide();
				
					eo=""+e+"";
					doc=eo.split(',');
					$('#commentaire_Question_rc_sup_conclusion').val(doc[0]);
					if(doc[1]=='faible'){
						document.getElementById("rad_Conclus_Faible_rc").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rad_Conclus_Moyen_rc").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rad_Conclus_Eleve_rc").checked=true;
					}
					if(doc[2]==1){
						document.getElementById("rad_Conclus_Faible_rc").disabled=true;
						document.getElementById("rad_Conclus_Moyen_rc").disabled=true;
						document.getElementById("rad_Conclus_Eleve_rc").disabled=true;
						document.getElementById("commentaire_Question_rc_sup_conclusion").disabled=true;								
					}


					$("#contRsciRecette").load("cycleRecette/Recette.php",function (res)
					{



						$('#contRsciRecette').show();
						$('#contSupRc').hide();
						$('#mess_ret_rc_sup').hide();
						$('#fancybox_bouton_rc').hide();
						//$('#message_fermeture_imb_sup').hide();
					});
				// $('#int_conclusion_rc_superviseur').show();
				// $('#fancybox_bouton_rc').show();
				}
			});
		}
		closedButtSuprc();
	});
});

function closedButtSuprc(){
	document.getElementById("int_rc_Sup_Retour").disabled=true;
	document.getElementById("int_rc_sup_conclusion").disabled=true;	
}
function openButtSuprc(){
	document.getElementById("int_rc_Sup_Retour").disabled=false;
	document.getElementById("int_rc_sup_conclusion").disabled=false;	
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_conc_rc" style="display:none;"/>
<div id="int_rc_Sup">

	
	<div id="fond_Sous_Titre" class="menu_Titre">
                    <label class="marge_Titre">AAAAEvaluation du contrôle des fournisseur</label>
                    <label class="margin_Code">Code : FC1</label>
                </div>
    <div id="TitreobjCycle">D.Réalité</div>


	<div id="Interface_Question_rc_Superviseur"><?php include '../../../cycleRecette/Recettec/form/Interface_rc_Questionnaire_Superviseur.php';?></div>
		<div id="Interface_Synthese_rc_Audit">
			<table width="100%" bgcolor="#ccc">
				<tr>
					<td class="sous_Titre" height="30">CONCLUSION</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><textarea cols="22" rows="15" id="txarea_synthese_rc" <?php if($nombre_resultat==1){echo "disabled";}?> ><?php echo $commentaire; ?></textarea>
					</td>
					<td>
						<table>
							<tr>
								<td class="sous_Titre" align="center">Score :	</td>
							</tr>
							<tr>
								<td class="sous_Titre" align="center" height="30"><?php echo $score_final; ?>/26</td>
							</tr>

							<tr>
								<td class="sous_Titre" height="30">Niveau de risque</td>
							</tr>
							<tr>
								<td class="sous_Titre" height="50">
									<?php if($nombre_resultat==1){ ?>
										<input type="radio"	 value="faible" id="rc_Synthese_rc_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
										<input type="radio"  value="moyen" id="rc_Synthese_rc_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
										<input type="radio"  value="eleve" id="rc_Synthese_rc_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';} ?>disabled/>Elevé
									<?php } else{?>
										<input type="radio" value="faible" id="rc_Synthese_rc_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?>/>Faible<br />
										<input type="radio" value="moyen" id="rc_Synthese_rc_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
										<input type="radio" value="eleve" id="rc_Synthese_rc_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';}?>/>Elevé
									<?php } ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div id="Interface_Conclusion_rc_Audit">
			<table width="100%" class="sous_Titre">
				<tr>
					<td align="center">
						<input type="button" value="retour" class="bouton" id="int_rc_Sup_Retour"/>
						<input type="button" value="Validation" class="bouton" id="int_rc_sup_conclusion"  <?php if($nombre_resultat==1){echo "disabled";}?>/>
					</td>
				</tr>
			</table>
		</div>
		<div id="fancybox_bouton_rc"></div>
	
	<div id="int_Bouton_Interface_rc" align="center">

	</div>

<!--****************************************Interface A Terminer conclusion********************************-->
<div id="message_Terminer_question_rc"><?php include '../sms/Message terminer question rc.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface B Synthese*******************************************-->
<div id="Int_Synthese_rc"><?php include 'Interface_rc_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_rc"><?php include '../sms/Message terminer synthese rc.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************Message de fermeture de la conclusion de l'objectif B sup*********************-->
<div id="mess_Termine_conclusion_rc_sup"><?php include '../sms/Message_fermer_conclusion_rc_sup.php';?></div>
<!--*******************************************************************************************************-->
<div id="mess_valide_conclusion_rc_sup"><?php include '../sms/Message_confirmation_conclusion_rc_sup.php'; ?></div>
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_rc"><?php include '../sms/Message slide rc Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_rc"><?php include '../sms/Message slide question terminer rc.php';?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de conclusion de B superviseur*****************************-->
<div id="int_conclusion_rc_superviseur" data-options="handle:'#dragg_conlus_rc'" align="center">
<div id="dragg_conlus_rc" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include 'Interface_rc_superviseur_conclusion.php'; ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de retour B superviseur************************************-->
<div id="message_retour_rc_sup"><?php include '../sms/Message_retour_rc_sup.php'; ?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de confirmation de retour****************************************-->
<div id="mess_ret_rc_sup"><?php include '../sms/Mess_ret_rc_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de validation de la conclusion******************************-->
<div id="mess_slide_conclusion_rc"><?php include '../sms/Message_slide_rc_conclusion.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de page vide de la conclusion*******************************-->
<!--div id="mess_conclus_vide"><?php //include '../sms/sms_empty/Mess_conclus_vide_sup.php';?></div-->
<!--*******************************************************************************************************-->
<!--******************************Message de la formulaire de la synthèse non exipant*********************-->
<div id="mess_synth_non"><?php include '../sms/mess_non_synth.php';?></div>
<!--*******************************************************************************************************-->

<div id="mess_empty_conclus_rc"><?php include '../sms/sms_empty/mess_empty_conclus.php'; ?>
</div>
