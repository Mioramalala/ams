<?php 

include '../../../connexion.php';

@session_start();
$mission_id=$_SESSION['idMission'];

// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=17 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1) {
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=17 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque=utf8_encode($donnees2['CONCLUSION_RISQUE']);

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=17 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$commentaire=utf8_encode($donnees['SYNTHESE_COMMENTAIRE']);
	$risque=utf8_encode($donnees['SYNTHESE_RISQUE']);

}

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=17 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==227 || $donnees1['QUESTION_ID']==192 || $donnees1['QUESTION_ID']==193)){
		$score=1;
	}
	if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==196 || $donnees1['QUESTION_ID']==197 || $donnees1['QUESTION_ID']==198 || $donnees1['QUESTION_ID']==199 || $donnees1['QUESTION_ID']==200 || $donnees1['QUESTION_ID']==201 || $donnees1['QUESTION_ID']==202 || $donnees1['QUESTION_ID']==203 || $donnees1['QUESTION_ID']==204 || $donnees1['QUESTION_ID']==205 || $donnees1['QUESTION_ID']==205 || $donnees1['QUESTION_ID']==206 || $donnees1['QUESTION_ID']==207 || $donnees1['QUESTION_ID']==208 || $donnees1['QUESTION_ID']==209 || $donnees1['QUESTION_ID']==210 || $donnees1['QUESTION_ID']==211 || $donnees1['QUESTION_ID']==212 || $donnees1['QUESTION_ID']==213 || $donnees1['QUESTION_ID']==214 || $donnees1['QUESTION_ID']==215 || $donnees1['QUESTION_ID']==216 || $donnees1['QUESTION_ID']==217 || $donnees1['QUESTION_ID']==218 || $donnees1['QUESTION_ID']==219 || $donnees1['QUESTION_ID']==220 || $donnees1['QUESTION_ID']==221)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==228 || $donnees1['QUESTION_ID']==229 || $donnees1['QUESTION_ID']==230 || $donnees1['QUESTION_ID']==231 || $donnees1['QUESTION_ID']==188 || $donnees1['QUESTION_ID']==189 || $donnees1['QUESTION_ID']==194 || $donnees1['QUESTION_ID']==234)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==232 || $donnees1['QUESTION_ID']==233 || $donnees1['QUESTION_ID']==191)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
?>
<link href="cyclePaie/Paiee/css/div.css" rel="stylesheet" type="text/css" />
<link href="cyclePaie/Paiee/css/div_pe.css" rel="stylesheet" type="text/css" />
<link href="cyclePaie/Paiee/css/class.css" rel="stylesheet" type="text/css" />
<link href="cyclePaie/Paiee/css/div_fermer_quest_objectif_pe.css" rel="stylesheet" type="text/css" />

<link href="css/cssSousmenueCycle.css" rel="stylesheet" type="text/css" />


<script>
$(function(){
	$(document).ready(function() {
		$('#int_conclusion_pe_superviseur').draggable();
	});
	//evenement de retour dans le menu principale
	$('#int_pe_Sup_Retour').click(function(){
		$('#mess_ret_pe_sup').show();
		$('#int_conclusion_pe_superviseur').hide();
		$('#fancybox_bouton_pe').show();
		closedButtSuppe();
	});
	//evenement de la conclusion de B superviseur
	$('#int_pe_sup_conclusion').click(function(){
	var commentaire=$('#txarea_synthese_pe').val();	
	var risque=$('input[type=radio][name=risque]:checked').val();

		if(document.getElementById("txarea_synthese_pe").value==""){
			$('#mess_synth_non').show();
			$('#fancybox_bouton_pe').show();
			closedButtSuppe();
		}
		else{
			$.ajax({
				type:'POST',
				//url:'cyclePaie/Paiee/php/enreg_synth_pe.php',
				url:'cycleVente/enregistre_conclusion.php',
				data:{risque:risque,commentaire:commentaire, cycleAchatId:17},
				success:function(e){
				alert("cycle paie e bien enregistré");
					eo=""+e+"";
					doc=eo.split(',');
					$('#commentaire_Question_pe_sup_conclusion').val(doc[0]);
					if(doc[1]=='faible'){
						document.getElementById("rad_Conclus_Faible_pe").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rad_Conclus_Moyen_pe").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rad_Conclus_Eleve_pe").checked=true;
					}
					if(doc[2]==1){
						document.getElementById("rad_Conclus_Faible_pe").disabled=true;
						document.getElementById("rad_Conclus_Moyen_pe").disabled=true;
						document.getElementById("rad_Conclus_Eleve_pe").disabled=true;
						document.getElementById("commentaire_Question_pe_sup_conclusion").disabled=true;								
					}

					$('#contRsciPaie').load("cyclePaie/Paie.php",function (e)
					{
						$('#contRsciPaie').show();
						$('#contSupPe').hide();
						$('#mess_ret_pe_sup').hide();
						$('#fancybox_bouton_pe').hide();

					});

				
				
				
				}
			});
		}
		closedButtSuppe();
	});
});

function closedButtSuppe(){
	document.getElementById("int_pe_Sup_Retour").disabled=true;
	document.getElementById("int_pe_sup_conclusion").disabled=true;	
}
function openButtSuppe(){
	document.getElementById("int_pe_Sup_Retour").disabled=false;
	document.getElementById("int_pe_sup_conclusion").disabled=false;	
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_conc_pe" style="display:none;"/>
<div id="int_pe_Sup">
<div id="fond_Sous_Titre" class="menu_Titre">
                    <label class="marge_Titre">Evaluation du contrôle des fournisseur</label>
                    <label class="margin_Code">Code : FC1</label>
       </div>
       <div id="TitreobjCycle">E.Imputation.</div>


	<div id="Interface_Question_pe_Superviseur"><?php include '../../../cyclePaie/Paiee/form/Interface_pe_Questionnaire_Superviseur.php';?></div>
		<div id="Interface_Synthese_pe_Audit">
			<table width="100%" bgcolor="#ccc">
				<tr>
					<td class="sous_Titre" height="30">SYNTHESE ET CONLUSION</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><textarea cols="22" rows="15" id="txarea_synthese_pe" <?php if($nombre_resultat==1){echo "disabled";}?> ><?php echo $commentaire; ?></textarea>
					</td>
					<td>
						<table>
							<tr>
								<td class="sous_Titre" align="center">Score :	</td>
							</tr>
							<tr>
								<td class="sous_Titre" align="center" height="30"><?php echo $score_final; ?>/38</td>
							</tr>

							<tr>
								<td class="sous_Titre" height="30">Niveau de risque</td>
							</tr>
							<tr>
								<td class="sous_Titre" height="50">
									<?php if($nombre_resultat==1){ ?>
										<input type="radio"	 value="faible" id="rd_Synthese_pe_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
										<input type="radio"  value="moyen" id="rd_Synthese_pe_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
										<input type="radio"  value="eleve" id="rd_Synthese_pe_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';} ?>disabled/>Elevé
									<?php } else{?>
										<input type="radio" value="faible" id="rd_Synthese_pe_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?>/>Faible<br />
										<input type="radio" value="moyen" id="rd_Synthese_pe_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
										<input type="radio" value="eleve" id="rd_Synthese_pe_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';}?>/>Elevé
									<?php } ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div id="Interface_Conclusion_pe_Audit">
			<table width="100%" class="sous_Titre">
				<tr>
					<td align="center">
						<input type="button" value="retour" class="bouton" id="int_pe_Sup_Retour"/>
						<input type="button" value="Validation" class="bouton" id="int_pe_sup_conclusion" <?php if($nombre_resultat==1){echo "disabled";}?> />
					</td>
				</tr>
			</table>
		</div>
		<div id="fancybox_bouton_pe"></div>
	<!--div id="Int_Droite_B">
		<input type="button" class="bouton" value="Retour" id="int_B_Retour" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_B_Synthese" /><br />
		<input type="button" class="bouton" value="Liste" id="Int_B_Liste_B" /><br />
		<input type="button" class="bouton" value="Suivant" id="Int_B_Suivant" />
	</div-->

	<div id="int_Bouton_Interface_pe" align="center">

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
<div id="message_Terminer_question_pe"><?php include '../sms/Message terminer question pe.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface B Synthese*******************************************-->
<div id="Int_Synthese_pe"><?php include 'Interface_pe_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_pe"><?php include '../sms/Message terminer synthese pe.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************Message de fermeture de la conclusion de l'objectif B sup*********************-->
<div id="mess_Termine_conclusion_pe_sup"><?php include '../sms/Message_fermer_conclusion_pe_sup.php';?></div>
<!--*******************************************************************************************************-->
<div id="mess_valide_conclusion_pe_sup"><?php include '../sms/Message_confirmation_conclusion_pe_sup.php'; ?></div>
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_pe"><?php include '../sms/Message slide pe Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_pe"><?php include '../sms/Message slide question terminer pe.php';?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de conclusion de B superviseur*****************************-->
<div id="int_conclusion_pe_superviseur" data-options="handle:'#dragg_conlus_pe'" align="center">
<div id="dragg_conlus_pe" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include 'Interface_pe_superviseur_conclusion.php'; ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de retour B superviseur************************************-->
<div id="message_retour_pe_sup"><?php include '../sms/Message_retour_pe_sup.php'; ?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de confirmation de retour****************************************-->
<div id="mess_ret_pe_sup"><?php include '../sms/Mess_ret_pe_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de validation de la conclusion******************************-->
<div id="mess_slide_conclusion_pe"><?php include '../sms/Message_slide_pe_conclusion.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de page vide de la conclusion*******************************-->
<!--div id="mess_conclus_vide"><?php //include '../sms/sms_empty/Mess_conclus_vide_sup.php';?></div-->
<!--*******************************************************************************************************-->
<!--******************************Message de la formulaire de la synthèse non exipant*********************-->
<div id="mess_synth_non"><?php include '../sms/mess_non_synth.php';?></div>
<!--*******************************************************************************************************-->

<div id="mess_empty_conclus_pe"><?php include '../sms/sms_empty/mess_empty_conclus.php'; ?>
</div>
