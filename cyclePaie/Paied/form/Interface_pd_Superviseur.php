<?php 

include '../../../connexion.php';

@session_start();
$mission_id=$_SESSION['idMission'];

// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=16 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1) {
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=16 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque=utf8_encode($donnees2['CONCLUSION_RISQUE']);

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=16 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$commentaire=utf8_encode($donnees['SYNTHESE_COMMENTAIRE']);
	$risque=utf8_encode($donnees['SYNTHESE_RISQUE']);

}
$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=16 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==181 || $donnees1['QUESTION_ID']==192 || $donnees1['QUESTION_ID']==193)){
		$score=1;
	}
	if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==196 || $donnees1['QUESTION_ID']==197 || $donnees1['QUESTION_ID']==198 || $donnees1['QUESTION_ID']==199 || $donnees1['QUESTION_ID']==200 || $donnees1['QUESTION_ID']==201 || $donnees1['QUESTION_ID']==202 || $donnees1['QUESTION_ID']==203 || $donnees1['QUESTION_ID']==204 || $donnees1['QUESTION_ID']==205 || $donnees1['QUESTION_ID']==205 || $donnees1['QUESTION_ID']==206 || $donnees1['QUESTION_ID']==207 || $donnees1['QUESTION_ID']==208 || $donnees1['QUESTION_ID']==209 || $donnees1['QUESTION_ID']==210 || $donnees1['QUESTION_ID']==211 || $donnees1['QUESTION_ID']==212 || $donnees1['QUESTION_ID']==213 || $donnees1['QUESTION_ID']==214 || $donnees1['QUESTION_ID']==215 || $donnees1['QUESTION_ID']==216 || $donnees1['QUESTION_ID']==217 || $donnees1['QUESTION_ID']==218 || $donnees1['QUESTION_ID']==219 || $donnees1['QUESTION_ID']==220 || $donnees1['QUESTION_ID']==221)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==182 || $donnees1['QUESTION_ID']==183 || $donnees1['QUESTION_ID']==184 || $donnees1['QUESTION_ID']==185 || $donnees1['QUESTION_ID']==188 || $donnees1['QUESTION_ID']==189 || $donnees1['QUESTION_ID']==194 || $donnees1['QUESTION_ID']==195)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==186 || $donnees1['QUESTION_ID']==187 || $donnees1['QUESTION_ID']==191)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
?>
<link href="cyclePaie/Paied/css/div.css" rel="stylesheet" type="text/css" />
<link href="cyclePaie/Paied/css/div_pd.css" rel="stylesheet" type="text/css" />
<link href="cyclePaie/Paied/css/class.css" rel="stylesheet" type="text/css" />
<link href="cyclePaie/Paied/css/div_fermer_quest_objectif_pd.css" rel="stylesheet" type="text/css" />

<link href="css/cssSousmenueCycle.css" rel="stylesheet" type="text/css" />



<script>
$(function(){
	$(document).ready(function() {
		$('#int_conclusion_pd_superviseur').draggable();
	});
	//evenement de retour dans le menu principale
	$('#int_pd_Sup_Retour').click(function(){
		$('#mess_ret_pd_sup').show();
		$('#int_conclusion_pd_superviseur').hide();
		$('#fancybox_bouton_pd').show();
		closedButtSuppd();
	});
	//evenement de la conclusion de B superviseur
	$('#int_pd_sup_conclusion').click(function(){
	var commentaire=$('#txarea_synthese_pd').val();
	var risque=$('input[type=radio][name=risque]:checked').val();
		if(document.getElementById("txarea_synthese_pd").value==""){
			$('#mess_synth_non').show();
			$('#fancybox_bouton_pd').show();
			closedButtSuppd();
		}
		else{
			$.ajax({
				type:'POST',
				//url:'cyclePaie/Paied/php/enreg_synth_pd.php',
				url:'cycleVente/enregistre_conclusion.php',
				data:{risque:risque,commentaire:commentaire, cycleAchatId:16},
				success:function(e){
				alert("cycle paie d bien enregistré");

					$('#contRsciPaie').load("cyclePaie/Paie.php",function (e)
					{
						$('#contRsciPaie').show();
						$('#contSupPd').hide();
						$('#mess_ret_pd_sup').hide();
						$('#fancybox_bouton_pd').hide();

					});





					

					
						
				// $('#int_conclusion_pd_superviseur').show();
				// $('#fancybox_bouton_pd').show();
				}
			});
		}
		closedButtSuppd();
	});
});

function closedButtSuppd(){
	document.getElementById("int_pd_Sup_Retour").disabled=true;
	document.getElementById("int_pd_sup_conclusion").disabled=true;	
}
function openButtSuppd(){
	document.getElementById("int_pd_Sup_Retour").disabled=false;
	document.getElementById("int_pd_sup_conclusion").disabled=false;	
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_conc_pd" style="display:none;"/>
<div id="int_pd_Sup">

	<div id="fond_Sous_Titre" class="menu_Titre">
                    <label class="marge_Titre">Evaluation du contrôle des fournisseur</label>
                    <label class="margin_Code">Code : FC1</label>
       </div>
       <div id="TitreobjCycle">D.Evaluation.</div>


	<div id="Interface_Question_pd_Superviseur"><?php include '../../../cyclePaie/Paied/form/Interface_pd_Questionnaire_Superviseur.php';?></div>
		<div id="Interface_Synthese_pd_Audit">
			<table width="100%" bgcolor="#ccc">
				<tr>
					<td class="sous_Titre" height="30">SYNTHESE ET CONCLUSION</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><textarea cols="22" rows="15" id="txarea_synthese_pd"<?php if($nombre_resultat==1){echo "disabled";}?>  ><?php echo $commentaire; ?></textarea>
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
										<input type="radio"	 value="faible" id="rd_Synthese_pd_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
										<input type="radio"  value="moyen" id="rd_Synthese_pd_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
										<input type="radio"  value="eleve" id="rd_Synthese_pd_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';} ?>disabled/>Elevé
									<?php } else{?>
										<input type="radio" value="faible" id="rd_Synthese_pd_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?>/>Faible<br />
										<input type="radio" value="moyen" id="rd_Synthese_pd_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
										<input type="radio" value="eleve" id="rd_Synthese_pd_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';}?>/>Elevé
									<?php } ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div id="Interface_Conclusion_pd_Audit">
			<table width="100%" class="sous_Titre">
				<tr>
					<td align="center">
						<input type="button" value="retour" class="bouton" id="int_pd_Sup_Retour"/>
						<input type="button" value="Validation" class="bouton" id="int_pd_sup_conclusion"<?php if($nombre_resultat==1){echo "disabled";}?>  />
					</td>
				</tr>
			</table>
		</div>
		<div id="fancybox_bouton_pd"></div>
	

	<div id="int_Bouton_Interface_pd" align="center">

	</div>

<!--****************************************Interface A Terminer conclusion********************************-->
<div id="message_Terminer_question_pd"><?php include '../sms/Message terminer question pd.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface B Synthese*******************************************-->
<div id="Int_Synthese_pd"><?php include 'Interface_pd_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_pd"><?php include '../sms/Message terminer synthese pd.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************Message de fermeture de la conclusion de l'objectif B sup*********************-->
<div id="mess_Termine_conclusion_pd_sup"><?php include '../sms/Message_fermer_conclusion_pd_sup.php';?></div>
<!--*******************************************************************************************************-->
<div id="mess_valide_conclusion_pd_sup"><?php include '../sms/Message_confirmation_conclusion_pd_sup.php'; ?></div>
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_pd"><?php include '../sms/Message slide pd Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_pd"><?php include '../sms/Message slide question terminer pd.php';?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de conclusion de B superviseur*****************************-->
<div id="int_conclusion_pd_superviseur" data-options="handle:'#dragg_conlus_pd'" align="center">
<div id="dragg_conlus_pd" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include 'Interface_pd_superviseur_conclusion.php'; ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de retour B superviseur************************************-->
<div id="message_retour_pd_sup"><?php include '../sms/Message_retour_pd_sup.php'; ?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de confirmation de retour****************************************-->
<div id="mess_ret_pd_sup"><?php include '../sms/Mess_ret_pd_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de validation de la conclusion******************************-->
<div id="mess_slide_conclusion_pd"><?php include '../sms/Message_slide_pd_conclusion.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de page vide de la conclusion*******************************-->
<!--div id="mess_conclus_vide"><?php //include '../sms/sms_empty/Mess_conclus_vide_sup.php';?></div-->
<!--*******************************************************************************************************-->
<!--******************************Message de la formulaire de la synthèse non exipant*********************-->
<div id="mess_synth_non"><?php include '../sms/mess_non_synth.php';?></div>
<!--*******************************************************************************************************-->

<div id="mess_empty_conclus_pd"><?php include '../sms/sms_empty/mess_empty_conclus.php'; ?>
</div>
