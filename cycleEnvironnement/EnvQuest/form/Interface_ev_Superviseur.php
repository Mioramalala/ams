<?php 
include '../../../connexion.php';
$mission_id=$_POST['mission_id'];

// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=31 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1) {
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=31 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque=utf8_encode($donnees2['CONCLUSION_RISQUE']);

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=31 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$commentaire=utf8_encode($donnees['SYNTHESE_COMMENTAIRE']);
	$risque=utf8_encode($donnees['SYNTHESE_RISQUE']);

}

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=31 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==409 || $donnees1['QUESTION_ID']==412 || $donnees1['QUESTION_ID']==415 || $donnees1['QUESTION_ID']==416 || $donnees1['QUESTION_ID']==417 || $donnees1['QUESTION_ID']==418 || $donnees1['QUESTION_ID']==419 || $donnees1['QUESTION_ID']==421 || $donnees1['QUESTION_ID']==422 || $donnees1['QUESTION_ID']==424)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==405 || $donnees1['QUESTION_ID']==406 || $donnees1['QUESTION_ID']==407 || $donnees1['QUESTION_ID']==408 || $donnees1['QUESTION_ID']==409 || $donnees1['QUESTION_ID']==410 || $donnees1['QUESTION_ID']==411 || $donnees1['QUESTION_ID']==412 || $donnees1['QUESTION_ID']==413 || $donnees1['QUESTION_ID']==414 || $donnees1['QUESTION_ID']==415 || $donnees1['QUESTION_ID']==416 || $donnees1['QUESTION_ID']==417 || $donnees1['QUESTION_ID']==418 || $donnees1['QUESTION_ID']==418 || $donnees1['QUESTION_ID']==420 || $donnees1['QUESTION_ID']==421 || $donnees1['QUESTION_ID']==422 || $donnees1['QUESTION_ID']==423 || $donnees1['QUESTION_ID']==424 || $donnees1['QUESTION_ID']==425 || $donnees1['QUESTION_ID']==426 || $donnees1['QUESTION_ID']==427 || $donnees1['QUESTION_ID']==428 || $donnees1['QUESTION_ID']==429 || $donnees1['QUESTION_ID']==430)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==410 || $donnees1['QUESTION_ID']==420 || $donnees1['QUESTION_ID']==423 || $donnees1['QUESTION_ID']==425 || $donnees1['QUESTION_ID']==427 || $donnees1['QUESTION_ID']==429 || $donnees1['QUESTION_ID']==430)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==405 || $donnees1['QUESTION_ID']==406 || $donnees1['QUESTION_ID']==407 || $donnees1['QUESTION_ID']==408 || $donnees1['QUESTION_ID']==411 || $donnees1['QUESTION_ID']==413 || $donnees1['QUESTION_ID']==414 || $donnees1['QUESTION_ID']==426 || $donnees1['QUESTION_ID']==428)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
?>
<link href="cycleEnvironnement/EnvQuest/css/div.css" rel="stylesheet" type="text/css" />
<link href="cycleEnvironnement/EnvQuest/css/div_ev.css" rel="stylesheet" type="text/css" />
<link href="cycleEnvironnement/EnvQuest/css/class.css" rel="stylesheet" type="text/css" />
<link href="cycleEnvironnement/EnvQuest/css/div_fermer_quest_objectif_ev.css" rel="stylesheet" type="text/css" />

<script>
	$(document).ready(function() {
		$('#int_conclusion_ev_superviseur').draggable();
	});
$(function()
{

	//DEBUT CODE DE TEST LES QUESTIONNAIRE SONT DEJA REMPLIS OU NON + SYNTESE
	var SYNTHESE_COMMENTAIRE="";
	var SYNTHESE_RISQUE="";
	var Questionnaire=0;

	//test questionnaire
	$.get("cycleEnvironnement/EnvQuest/php/cpt_ev.php",function(res)
	{
		Questionnaire=res;
	});

	$.post("cycleEnvironnement/EnvQuest/php/getSynth.php",{cycleId:31},function (res)
	{
		res_=res.split('*');
		SYNTHESE_COMMENTAIRE=res_[0];
		SYNTHESE_RISQUE=res_[1];
	});
	//test SYTHESE
	//FIN CODE DE TEST LES QUESTIONNAIRE SONT DEJA REMPLIS OU NON + SYNTESE




	//evenement de retour dans le menu principale
	$('#int_ev_Sup_Retour').click(function(){
		$('#mess_ret_ev_sup').show();
		$('#int_conclusion_ev_superviseur').hide();
		$('#fancybox_bouton_ev').show();
		closedButtSupev();
	});
	//evenement de la conclusion de B superviseur
	$('#int_ev_sup_conclusion').click(function()
	{



		if(Questionnaire<27)
		{
			alert ("Vous devez repondre à toutes les questions...");
			return false;
		}else if(SYNTHESE_COMMENTAIRE=="" || SYNTHESE_RISQUE=="" )
		{
			alert ("veuillez remplir la synthese..");
			return false;
		}

			var commentaire=$('#txarea_synthese_ev').val();
			var risque=$('input[type=radio][name=risque]:checked').val();
			if(document.getElementById("txarea_synthese_ev").value==""){
				$('#mess_synth_non').show();
				$('#fancybox_bouton_ev').show();
				closedButtSupev();
			}
			else
			{
			$.ajax({
				type:'POST',
				url:'cycleEnvironnement/enregistre_conclusion.php',
				data:{risque:risque,commentaire:commentaire, cycleAchatId:31},
				success:function(e)
				{
					alert("cycle environnement bien enregistré");
					$("#contRsciEnvironnement").load("cycleEnvironnement/Environnement.php",function (e)
					{
						$('#contRsciEnvironnement').show();
						$('#contSupEv').hide();
						$('#mess_ret_ev_sup').hide();
						$('#fancybox_bouton_ev').hide();

					});




				}
			});
		}
		closedButtSupev();
	});
});

function closedButtSupev(){

	document.getElementById("int_ev_sup_conclusion").disabled=true;
}
function openButtSupev(){
	document.getElementById("int_ev_Sup_Retour").disabled=false;
	document.getElementById("int_ev_sup_conclusion").disabled=false;	
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_conc_ev" style="display:none;"/>
<div id="int_ev_Sup">
	<div id="Interface_Question_ev_Superviseur"><?php include '../../../cycleEnvironnement/EnvQuest/form/Interface_ev_Questionnaire_Superviseur.php';?></div>
		<div id="Interface_Synthese_ev_Audit">
			<table width="100%" bgcolor="#ccc">
				<tr>
					<td class="sous_Titre" height="30">CONCLUSION</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><textarea cols="22" rows="15"  id="txarea_synthese_ev" <?php if($nombre_resultat==1){echo "disabled";}?> ><?php echo $commentaire; ?></textarea>
					</td>
					<td>
						<table>
							<tr>
								<td class="sous_Titre" align="center">Score :	</td>
							</tr>
							<tr>
								<td class="sous_Titre" align="center" height="30"><?php echo $score_final; ?>/51</td>
							</tr>

							<tr>
								<td class="sous_Titre" height="30">Niveau de risque</td>
							</tr>
							<tr>
								<td class="sous_Titre" height="50">
										<?php if($nombre_resultat==1){ ?>
											<input type="radio" class="risque" value="faible" id="rd_Synthese_ev_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
											<input type="radio" class="risque" value="moyen" id="rd_Synthese_ev_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
											<input type="radio" class="risque" value="eleve" id="rd_Synthese_ev_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';}?>disabled/>Elevé
										<?php } else{?>
											<input type="radio" class="risque" value="faible" id="rd_Synthese_ev_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?>/>Faible<br />
											<input type="radio" class="risque" value="moyen" id="rd_Synthese_ev_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
											<input type="radio" class="risque" value="eleve" id="rd_Synthese_ev_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';}?>/>Elevé
										<?php } ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div id="Interface_Conclusion_ev_Audit">
			<table width="100%" class="sous_Titre">
				<tr>
					<td align="center">
						<input type="button" value="retour" class="bouton" id="int_ev_Sup_Retour"/>
						<input type="button" value="Validation" class="bouton" id="int_ev_sup_conclusion" <?php if($nombre_resultat==1){echo "disabled";}?> />
					</td>
				</tr>
			</table>
		</div>
		<div id="fancybox_bouton_ev"></div>
	

	<div id="int_Bouton_Interface_ev" align="center">

	</div>

<!--****************************************Interface A Terminer conclusion********************************-->
<div id="message_Terminer_question_ev"><?php include '../sms/Message terminer question ev.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface B Synthese*******************************************-->
<div id="Int_Synthese_ev"><?php include 'Interface_ev_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_ev"><?php include '../sms/Message terminer synthese ev.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************Message de fermeture de la conclusion de l'objectif B sup*********************-->
<div id="mess_Termine_conclusion_ev_sup"><?php include '../sms/Message_fermer_conclusion_ev_sup.php';?></div>
<!--*******************************************************************************************************-->
<div id="mess_valide_conclusion_ev_sup"><?php include '../sms/Message_confirmation_conclusion_ev_sup.php'; ?></div>
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_ev"><?php include '../sms/Message slide ev Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_ev"><?php include '../sms/Message slide question terminer ev.php';?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de conclusion de B superviseur*****************************-->
<div id="int_conclusion_ev_superviseur" data-options="handle:'#dragg_conlus_ev'" align="center">
<div id="dragg_conlus_ev" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include 'Interface_ev_superviseur_conclusion.php'; ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de retour B superviseur************************************-->
<div id="message_retour_ev_sup"><?php include '../sms/Message_retour_ev_sup.php'; ?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de confirmation de retour****************************************-->
<div id="mess_ret_ev_sup"><?php include '../sms/Mess_ret_ev_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de validation de la conclusion******************************-->
<div id="mess_slide_conclusion_ev"><?php include '../sms/Message_slide_ev_conclusion.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de page vide de la conclusion*******************************-->
<!--div id="mess_conclus_vide"><?php //include '../sms/sms_empty/Mess_conclus_vide_sup.php';?></div-->
<!--*******************************************************************************************************-->
<!--******************************Message de la formulaire de la synthèse non exipant*********************-->
<div id="mess_synth_non"><?php include '../sms/mess_non_synth.php';?></div>
<!--*******************************************************************************************************-->

<div id="mess_empty_conclus_ev"><?php include '../sms/sms_empty/mess_empty_conclus.php'; ?>
</div>
