<?php 

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];


// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=12 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1) {
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=12 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque=utf8_encode($donnees2['CONCLUSION_RISQUE']);

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=12 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$commentaire=utf8_encode($donnees['SYNTHESE_COMMENTAIRE']);
	$risque=utf8_encode($donnees['SYNTHESE_RISQUE']);

}
$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=12 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==142 || $donnees1['QUESTION_ID']==143 || $donnees1['QUESTION_ID']==144 || $donnees1['QUESTION_ID']==148 || $donnees1['QUESTION_ID']==149)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==135 || $donnees1['QUESTION_ID']==136 || $donnees1['QUESTION_ID']==137 || $donnees1['QUESTION_ID']==138 || $donnees1['QUESTION_ID']==139 || $donnees1['QUESTION_ID']==140 || $donnees1['QUESTION_ID']==141 || $donnees1['QUESTION_ID']==142 || $donnees1['QUESTION_ID']==143 || $donnees1['QUESTION_ID']==144 || $donnees1['QUESTION_ID']==145 || $donnees1['QUESTION_ID']==146 || $donnees1['QUESTION_ID']==147 || $donnees1['QUESTION_ID']==148|| $donnees1['QUESTION_ID']==149 || $donnees1['QUESTION_ID']==150 || $donnees1['QUESTION_ID']==151)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==150 || $donnees1['QUESTION_ID']==151)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==135 || $donnees1['QUESTION_ID']==136 || $donnees1['QUESTION_ID']==137 || $donnees1['QUESTION_ID']==138 || $donnees1['QUESTION_ID']==139 || $donnees1['QUESTION_ID']==140 || $donnees1['QUESTION_ID']==141 || $donnees1['QUESTION_ID']==145 || $donnees1['QUESTION_ID']==146 || $donnees1['QUESTION_ID']==147)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
?>
<link href="cycleStock/Stockc/css/div.css" rel="stylesheet" type="text/css" />
<link href="cycleStock/Stockc/css/div_stc.css" rel="stylesheet" type="text/css" />
<link href="cycleStock/Stockc/css/class.css" rel="stylesheet" type="text/css" />
<link href="cycleStock/Stockc/css/div_fermer_quest_objectif_stc.css" rel="stylesheet" type="text/css" />

<link href="css/cssSousmenueCycle.css" rel="stylesheet" type="text/css" />


<script>
$(function(){
	$(document).ready(function() {
		$('#int_conclusion_stc_superviseur').draggable();
	});
	//evenement de retour dans le menu principale
	$('#int_stc_Sup_Retour').click(function(){
		$('#mess_ret_stc_sup').show();
		$('#int_conclusion_stc_superviseur').hide();
		$('#fancybox_bouton_stc').show();
		closedButtSupstc();
	});
	//evenement de la conclusion de B superviseur
	$('#int_stc_sup_conclusion').click(function(){
	var commentaire=$('#txarea_synthese_stc').val();
	var risque=$('input[type=radio][name=risque]:checked').val();

		if(document.getElementById("txarea_synthese_stc").value==""){
			$('#mess_synth_non').show();
			$('#fancybox_bouton_stc').show();
			closedButtSupstc();
		}
		else{
			$.ajax({
				type:'POST',
				//url:'cycleStock/Stockc/php/enreg_synth_stc.php',				
				url:'cycleStock/enregistre_conclusion.php',

				data:{risque:risque,commentaire:commentaire, cycleAchatId:12},
				success:function(e){

					alert("cycle stock a bien enregistré");
					$("#contRsciStock").load("cycleStock/Stock.php",function (e)
					{
						$('#contRsciStock').show();
						$('#contSupstc').hide();
						$('#mess_ret_stc_sup').hide();
						$('#fancybox_bouton_stc').hide();
					});
					
					
					

					
					
					
				// $('#int_conclusion_stc_superviseur').show();
				// $('#fancybox_bouton_stc').show();
				}
			});
		}
		closedButtSupstc();
	});
});

function closedButtSupstc(){
	document.getElementById("int_stc_Sup_Retour").disabled=true;
	document.getElementById("int_stc_sup_conclusion").disabled=true;	
}
function openButtSupstc(){
	document.getElementById("int_stc_Sup_Retour").disabled=false;
	document.getElementById("int_stc_sup_conclusion").disabled=false;	
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_conc_stc" style="display:none;"/>
<div id="int_stc_Sup">

	  <div id="fond_Sous_Titre" class="menu_Titre">
                    <label class="marge_Titre">B.Exhaustivité.</label>
                    <label class="margin_Code">Code : FC1</label>
       </div>
       <div id="TitreobjCycle">D. Bonne période</div>


	<div id="Interface_Question_stc_Superviseur"><?php include '../../../cycleStock/Stockc/form/Interface_stc_Questionnaire_Superviseur.php';?></div>
		<div id="Interface_Synthese_stc_Audit">
			<table width="100%" bgcolor="#ccc">
				<tr>
					<td class="sous_Titre" height="30">CONCLUSION</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><textarea cols="22" rows="15" id="txarea_synthese_stc"  <?php if($nombre_resultat==1){echo "disabled";}?>><?php echo $commentaire; ?></textarea>
					</td>
					<td>
						<table>
							<tr>
								<td class="sous_Titre" align="center">Score :	</td>
							</tr>
							<tr>
								<td class="sous_Titre" align="center" height="30"><?php echo $score_final; ?>/39</td>
							</tr>

							<tr>
								<td class="sous_Titre" height="30">Niveau de risque</td>
							</tr>
							<tr>
								<td class="sous_Titre" height="50">
									<?php if($nombre_resultat==1){ ?>
										<input type="radio"	 value="faible" id="rd_Synthese_stc_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
										<input type="radio"  value="moyen" id="rd_Synthese_stc_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
										<input type="radio"  value="eleve" id="rd_Synthese_stc_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';} ?>disabled/>Elevé
									<?php } else{?>
										<input type="radio" value="faible" id="rd_Synthese_stc_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?>/>Faible<br />
										<input type="radio" value="moyen" id="rd_Synthese_stc_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
										<input type="radio" value="eleve" id="rd_Synthese_stc_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';}?>/>Elevé
									<?php } ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div id="Interface_Conclusion_stc_Audit">
			<table width="100%" class="sous_Titre">
				<tr>
					<td align="center">
						<input type="button" value="retour" class="bouton" id="int_stc_Sup_Retour"/>
						<input type="button" value="Validation" class="bouton" id="int_stc_sup_conclusion"  <?php if($nombre_resultat==1){echo "disabled";}?>/>
					</td>
				</tr>
			</table>
		</div>
		<div id="fancybox_bouton_stc"></div>
	
	<div id="int_Bouton_Interface_stc" align="center">

	</div>

<!--****************************************Interface A Terminer conclusion********************************-->
<div id="message_Terminer_question_stc"><?php include '../sms/Message terminer question stc.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface B Synthese*******************************************-->
<div id="Int_Synthese_stc"><?php include 'Interface_stc_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_stc"><?php include '../sms/Message terminer synthese stc.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************Message de fermeture de la conclusion de l'objectif B sup*********************-->
<div id="mess_Termine_conclusion_stc_sup"><?php include '../sms/Message_fermer_conclusion_stc_sup.php';?></div>
<!--*******************************************************************************************************-->
<div id="mess_valide_conclusion_stc_sup"><?php include '../sms/Message_confirmation_conclusion_stc_sup.php'; ?></div>
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_stc"><?php include '../sms/Message slide stc Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_stc"><?php include '../sms/Message slide question terminer stc.php';?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de conclusion de B superviseur*****************************-->
<div id="int_conclusion_stc_superviseur" data-options="handle:'#dragg_conlus_stc'" align="center">
<div id="dragg_conlus_stc" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include 'Interface_stc_superviseur_conclusion.php'; ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de retour B superviseur************************************-->
<div id="message_retour_stc_sup"><?php include '../sms/Message_retour_stc_sup.php'; ?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de confirmation de retour****************************************-->
<div id="mess_ret_stc_sup"><?php include '../sms/Mess_ret_stc_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de validation de la conclusion******************************-->
<div id="mess_slide_conclusion_stc"><?php include '../sms/Message_slide_stc_conclusion.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de page vide de la conclusion*******************************-->
<!--div id="mess_conclus_vide"><?php //include '../sms/sms_empty/Mess_conclus_vide_sup.php';?></div-->
<!--*******************************************************************************************************-->
<!--******************************Message de la formulaire de la synthèse non existant*********************-->
<div id="mess_synth_non"><?php include '../sms/mess_non_synth.php';?></div>
<!--*******************************************************************************************************-->

<div id="mess_empty_conclus_stc"><?php include '../sms/sms_empty/mess_empty_conclus.php'; ?>
</div>
