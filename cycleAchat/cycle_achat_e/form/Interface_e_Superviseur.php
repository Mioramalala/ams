<?php 

include '../../../connexion.php';

@session_start();
$mission_id=$_SESSION['idMission'];

// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=5 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1) {
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=5 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque=utf8_encode($donnees2['CONCLUSION_RISQUE']);

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=5 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$commentaire=utf8_encode($donnees['SYNTHESE_COMMENTAIRE']);
	$risque=utf8_encode($donnees['SYNTHESE_RISQUE']);

}

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=5 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==50)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==46 || $donnees1['QUESTION_ID']==47 || $donnees1['QUESTION_ID']==48 || $donnees1['QUESTION_ID']==49 || $donnees1['QUESTION_ID']==50 || $donnees1['QUESTION_ID']==51 || $donnees1['QUESTION_ID']==52 || $donnees1['QUESTION_ID']==53 || $donnees1['QUESTION_ID']==54)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==51 || $donnees1['QUESTION_ID']==52 || $donnees1['QUESTION_ID']==53 || $donnees1['QUESTION_ID']==54)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==46 || $donnees1['QUESTION_ID']==47 || $donnees1['QUESTION_ID']==48 || $donnees1['QUESTION_ID']==49)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
?>
<?php

include '../../../connexion.php';

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=5 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=5 AND MISSION_ID='.$mission_id);

$donnees1=$reponse1->fetch();

$commentaire1=$donnees1['CONCLUSION_COMMENTAIRE'];
$risque1=$donnees1['CONCLUSION_RISQUE'];

if($risque1==""){
	$risqueFin=$risque;
}
else{
	$risqueFin=$risque1;
}

?>
<link href="cycleAchat/cycle_achat_e/css/div.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_e/css/div_e.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_e/css/class.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_e/css/div_fermer_quest_objectif_e.css" rel="stylesheet" type="text/css" />

<link href="cycleAchat/css/AchatCSS.css" rel="stylesheet" type="text/css" />


<script>

	$(document).ready(function() {
		$('#int_conclusion_e_superviseur').draggable();
	});
$(function(){

	//evenement de retour dans le menu principale
	$("#int_e_Sup_Retour").click(function()
	{
		$('#mess_ret_e_sup').show();
		$('#int_conclusion_e_superviseur').hide();
		$('#fancybox_bouton_e').show();
		closedButtSupe();
	});
	//evenement de la conclusion de B superviseur
	$('#int_e_sup_conclusion').click(function(){
	var commentaire=$('#txarea_synthese_e').val();
	var risque=$('input[type=radio][name=risque]:checked').val();
		if(document.getElementById("txarea_synthese_e").value==""){
			$('#mess_synth_non').show();
			$('#fancybox_bouton_e').show();
		}
		else{
			$.ajax({
				type:'POST',
				//url:'cycleAchat/cycle_achat_e/php/enreg_synth_e.php',
				url:'cycleAchat/enregistre_conclusion.php',
				data:{commentaire:commentaire,cycleAchatId:5,risque:risque},
				success:function(e){
				alert("cycle achat e bien enregistré");
				

					
					eo=""+e+"";
					doc=eo.split(',');
					$('#commentaire_Question_e_sup_conclusion').val(doc[0]);
					if(doc[1]=='faible'){
						document.getElementById("rad_Conclus_Faible_e").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rad_Conclus_Moyen_e").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rad_Conclus_Eleve_e").checked=true;
					}
					if(doc[2]==1){
						document.getElementById("rad_Conclus_Faible_e").disabled=true;
						document.getElementById("rad_Conclus_Moyen_e").disabled=true;
						document.getElementById("rad_Conclus_Eleve_e").disabled=true;
						document.getElementById("commentaire_Question_e_sup_conclusion").disabled=true;								
					}

					$("#contenue_rsci").load('cycleAchat/index.php',function (res)
					{

						$('#contenue_rsci').show();
						$('#dv_cont_obj_e_sup').hide();
						$('#mess_ret_e_sup').hide();
						$('#fancybox_bouton_e').hide();
					});

				// $('#int_conclusion_e_superviseur').show();
				// $('#fancybox_bouton_e').show();
				}
			});
		}
		//closedButtSupe();
	});
});

function closedButtSupe(){
	document.getElementById("int_e_Sup_Retour").disabled=true;
	document.getElementById("int_e_sup_conclusion").disabled=true;	
}
function openButtSupe(){
	document.getElementById("int_e_Sup_Retour").disabled=false;
	document.getElementById("int_e_sup_conclusion").disabled=false;	
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_conc_e" style="display:none;"/>
<div id="int_e_Sup">

 <div id="fond_Sous_Titre" class="menu_Titre">
                    <label class="marge_Titre">Evaluation du contrôle des fournisseur</label>
                    <label class="margin_Code">Code : FC1</label>
                </div>
                <div id="TitreobjACHATVALID">E. S'assurer que tous les achats, ainsi que les produits et charges connexes sont enregistrés dans la bonne période.</div>



	<div id="Interface_Question_e_Superviseur"><?php include '../../../cycleAchat/cycle_achat_e/form/Interface_e_Questionnaire_Superviseur.php';?></div>
		<div id="Interface_Synthese_e_Audit">
			<table width="100%" bgcolor="#ccc">
				<tr>
					<td class="sous_Titre" height="30">CONCLUSION</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><textarea cols="22" rows="15" id="txarea_synthese_e" <?php if($nombre_resultat==1){echo "disabled";}?> ><?php echo $commentaire; ?></textarea>
					</td>
					<td>
						<table>
							<tr>
								<td class="sous_Titre" align="center">Score :	</td>
							</tr>
							<tr>
								<td class="sous_Titre" align="center" height="30"><?php echo $score_final; ?>/21</td>
							</tr>

							<tr>
								<td class="sous_Titre" height="30">Niveau de risque</td>
							</tr>
							<tr>
								<td class="sous_Titre" height="50">
									<?php if($nombre_resultat==1){ ?>
										<input type="radio" class="risque" value="faible" id="rd_Synthese_e_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
										<input type="radio" class="risque" value="moyen" id="rd_Synthese_e_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
										<input type="radio" class="risque" value="eleve" id="rd_Synthese_e_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';} ?>disabled/>Elevé
									<?php } else{?>
										<input type="radio" class="risque" value="faible" id="rd_Synthese_e_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?>/>Faible<br />
										<input type="radio" class="risque" value="moyen" id="rd_Synthese_e_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
										<input type="radio" class="risque" value="eleve" id="rd_Synthese_e_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';}?>/>Elevé
									<?php } ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div id="Interface_Conclusion_e_Audit">
			<table width="100%" class="sous_Titre">
				<tr>
					<td align="center">
						<input type="button" value="retour" class="bouton" id="int_e_Sup_Retour"/>
						<input type="button" value="Validation" class="bouton" id="int_e_sup_conclusion"<?php if($nombre_resultat==1){echo "disabled";}?> />
					</td>
				</tr>
			</table>
		</div>
		<div id="fancybox_bouton_e"></div>
	<!--div id="Int_Droite_B">
		<input type="button" class="bouton" value="Retour" id="int_B_Retour" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_B_Synthese" /><br />
		<input type="button" class="bouton" value="Liste" id="Int_B_Liste_B" /><br />
		<input type="button" class="bouton" value="Suivant" id="Int_B_Suivant" />
	</div-->

	<div id="int_Bouton_Interface_e" align="center">

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
<div id="message_Terminer_question_e"><?php include '../sms/Message terminer question e.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface B Synthese*******************************************-->
<div id="Int_Synthese_e"><?php include 'Interface_e_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_e"><?php include '../sms/Message terminer synthese e.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************Message de fermeture de la conclusion de l'objectif B sup*********************-->
<div id="mess_Termine_conclusion_e_sup"><?php include '../sms/Message_fermer_conclusion_e_sup.php';?></div>
<!--*******************************************************************************************************-->
<div id="mess_valide_conclusion_e_sup"><?php include '../sms/Message_confirmation_conclusion_e_sup.php'; ?></div>
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_e"><?php include '../../cycleAchat/cycle_achat_e/sms/Message slide e Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_e"><?php include '../sms/Message slide question terminer e.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de conclusion de B superviseur*****************************-->
<div id="int_conclusion_e_superviseur" data-options="handle:'#dragg_conlus_e'" align="center">
<div id="dragg_conlus_e" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include 'Interface_e_superviseur_conclusion.php'; ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de retour B superviseur************************************-->
<div id="message_retour_e_sup"><?php include '../sms/Message_retour_e_sup.php'; ?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de confirmation de retour****************************************-->
<div id="mess_ret_e_sup"><?php include '../sms/Mess_ret_e_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de validation de la conclusion******************************-->
<div id="mess_slide_conclusion_e"><?php include '../sms/Message_slide_e_conclusion.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de page vide de la conclusion*******************************-->
<div id="mess_conclus_vide"><?php include '../../cycleAchat/cycle_achat_e/sms/sms_empty/Mess_conclus_vide_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de la formulaire de la synthèse non existant*********************-->
<div id="mess_synth_non"><?php include '../../../cycleAchat/cycle_achat_e/sms/mess_non_synth.php';?></div>
<!--*******************************************************************************************************-->
</div>
