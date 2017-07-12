<?php 

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=4 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1) {
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=4 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque=utf8_encode($donnees2['CONCLUSION_RISQUE']);

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=4 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$commentaire=utf8_encode($donnees['SYNTHESE_COMMENTAIRE']);
	$risque=utf8_encode($donnees['SYNTHESE_RISQUE']);

}
$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=4 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==34 || $donnees1['QUESTION_ID']==35 || $donnees1['QUESTION_ID']==36 || $donnees1['QUESTION_ID']==37 || $donnees1['QUESTION_ID']==38 || $donnees1['QUESTION_ID']==39 || $donnees1['QUESTION_ID']==40 || $donnees1['QUESTION_ID']==41 || $donnees1['QUESTION_ID']==42 || $donnees1['QUESTION_ID']==43 || $donnees1['QUESTION_ID']==44 || $donnees1['QUESTION_ID']==45)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==34 || $donnees1['QUESTION_ID']==35 || $donnees1['QUESTION_ID']==36 || $donnees1['QUESTION_ID']==37 || $donnees1['QUESTION_ID']==38 || $donnees1['QUESTION_ID']==42 || $donnees1['QUESTION_ID']==43 || $donnees1['QUESTION_ID']==44 || $donnees1['QUESTION_ID']==45)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==39 || $donnees1['QUESTION_ID']==40 || $donnees1['QUESTION_ID']==41)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
?>
<link href="cycleAchat/cycle_achat_d/css/div.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_d/css/div_d.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_d/css/class.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_d/css/div_fermer_quest_objectif_d.css" rel="stylesheet" type="text/css" />

<link href="cycleAchat/css/AchatCSS.css" rel="stylesheet" type="text/css" />



<script>
$(function(){
	$(document).ready(function() {
		$('#int_conclusion_d_superviseur').draggable();
	});
	//evenement de retour dans le menu principale
	$('#int_d_Sup_Retour').click(function(){
		$('#mess_ret_d_sup').show();
		$('#int_conclusion_d_superviseur').hide();
		$('#fancybox_bouton_d').show();
		closedButtSupd();
	});
	//evenement de la conclusion de B superviseur
	$('#int_d_sup_conclusion').click(function(){
	var commentaire=$('#txarea_synthese_d').val();
	var risque=$('input[type=radio][name=risque]:checked').val();
		if(document.getElementById("txarea_synthese_d").value==""){
			$('#mess_synth_non').show();
			$('#fancybox_bouton_d').show();
		}
		else{
			$.ajax({
				type:'POST',
				//url:'cycleAchat/cycle_achat_d/php/enreg_synth_d.php',
				url:'cycleAchat/cycle_achat_d/php/enreg_concl_d.php',
				data:{commentaire:commentaire, cycleAchatId:4,risque:risque},
				success:function(e){
				alert("cycle achat d bien enregistré");
				

					
					eo=""+e+"";
					doc=eo.split(',');
					$('#commentaire_Question_d_sup_conclusion').val(doc[0]);
					if(doc[1]=='faible'){
						document.getElementById("rad_Conclus_Faible_d").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rad_Conclus_Moyen_d").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rad_Conclus_Eleve_d").checked=true;
					}
					if(doc[2]==1){
						document.getElementById("rad_Conclus_Faible_d").disabled=true;
						document.getElementById("rad_Conclus_Moyen_d").disabled=true;
						document.getElementById("rad_Conclus_Eleve_d").disabled=true;
						document.getElementById("commentaire_Question_d_sup_conclusion").disabled=true;								
					}

					$("#contenue_rsci").load('cycleAchat/index.php',function (res)
					{

						$('#contenue_rsci').show();
						$('#dv_cont_obj_d_sup').hide();
						$('#mess_ret_d_sup').hide();
						$('#fancybox_bouton_d').hide();
					});
				// $('#int_conclusion_d_superviseur').show();
				// $('#fancybox_bouton_d').show();
				}
			});
		}
		//closedButtSupd();
	});
});

function closedButtSupd(){
	document.getElementById("int_d_Sup_Retour").disabled=true;
	document.getElementById("int_d_sup_conclusion").disabled=true;	
}
function openButtSupd(){
	document.getElementById("int_d_Sup_Retour").disabled=false;
	document.getElementById("int_d_sup_conclusion").disabled=false;	
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_conc_d" style="display:none;"/>
<div id="int_d_Sup">

		   <div id="fond_Sous_Titre" class="menu_Titre">
                    <label class="marge_Titre">Evaluation du contrôle des fournisseur</label>
                    <label class="margin_Code">Code : FC1</label>
                </div>
                <div id="TitreobjACHATVALID">D. S'assurer que tous les achats enregistrés sont correctement évalués.</div>


	<div id="Interface_Question_d_Superviseur"><?php include '../../../cycleAchat/cycle_achat_d/form/Interface_d_Questionnaire_Superviseur.php';?></div>
		<div id="Interface_Synthese_d_Audit">
			<table width="100%" bgcolor="#ccc">
				<tr>
					<td class="sous_Titre" height="30">CONCLUSION</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><textarea cols="22" rows="15" id="txarea_synthese_d" <?php if($nombre_resultat==1){echo "disabled";}?> ><?php echo $commentaire; ?></textarea>
					</td>
					<td>
						<table>
							<tr>
								<td class="sous_Titre" align="center">Score :	</td>
							</tr>
							<tr>
								<td class="sous_Titre" align="center" height="30"><?php echo $score_final; ?>/27</td>
							</tr>

							<tr>
								<td class="sous_Titre" height="30">Niveau de risque</td>
							</tr>
							<tr>
								<td class="sous_Titre" height="50">
										<?php if($nombre_resultat==1){ ?>
											<input type="radio"	 value="faible" id="rd_Synthese_d_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
											<input type="radio"  value="moyen" id="rd_Synthese_d_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
											<input type="radio"  value="eleve" id="rd_Synthese_d_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';} ?>disabled/>Elevé
										<?php } else{?>
											<input type="radio" value="faible" id="rd_Synthese_d_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?>/>Faible<br />
											<input type="radio" value="moyen" id="rd_Synthese_d_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
											<input type="radio" value="eleve" id="rd_Synthese_d_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';}?>/>Elevé
										<?php } ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div id="Interface_Conclusion_d_Audit">
			<table width="100%" class="sous_Titre">
				<tr>
					<td align="center">
						<input type="button" value="retour" class="bouton" id="int_d_Sup_Retour"/>
						<input type="button" value="Validation" class="bouton" id="int_d_sup_conclusion"<?php if($nombre_resultat==1){echo "disabled";}?>  />
					</td>
				</tr>
			</table>
		</div>
		<div id="fancybox_bouton_d"></div>
	<!--div id="Int_Droite_B">
		<input type="button" class="bouton" value="Retour" id="int_B_Retour" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_B_Synthese" /><br />
		<input type="button" class="bouton" value="Liste" id="Int_B_Liste_B" /><br />
		<input type="button" class="bouton" value="Suivant" id="Int_B_Suivant" />
	</div-->

	<div id="int_Bouton_Interface_d" align="center">

	</div>

	<div id="Question_d_23_Sup"></div>
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
	<div id="Question_d_34_Sup"></div>
<!--****************************************Interface A Terminer conclusion********************************-->
<div id="message_Terminer_question_d"><?php include '../sms/Message terminer question d.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface B Synthese*******************************************-->
<div id="Int_Synthese_d"><?php include 'Interface_d_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_d"><?php include '../sms/Message terminer synthese d.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************Message de fermeture de la conclusion de l'objectif B sup*********************-->
<div id="mess_Termine_conclusion_d_sup"><?php include '../sms/Message_fermer_conclusion_d_sup.php';?></div>
<!--*******************************************************************************************************-->
<div id="mess_valide_conclusion_d_sup"><?php include '../sms/Message_confirmation_conclusion_d_sup.php'; ?></div>
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_d"><?php include '../../cycleAchat/cycle_achat_d/sms/Message slide d Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_d"><?php include '../sms/Message slide question terminer d.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de conclusion de B superviseur*****************************-->
<div id="int_conclusion_d_superviseur" data-options="handle:'#dragg_conlus_d'" align="center">
<div id="dragg_conlus_d" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include 'Interface_d_superviseur_conclusion.php'; ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de retour B superviseur************************************-->
<div id="message_retour_d_sup"><?php include '../sms/Message_retour_d_sup.php'; ?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de confirmation de retour****************************************-->
<div id="mess_ret_d_sup"><?php include '../sms/Mess_ret_d_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de validation de la conclusion******************************-->
<div id="mess_slide_conclusion_d"><?php include '../sms/Message_slide_d_conclusion.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de page vide de la conclusion*******************************-->
<div id="mess_conclus_vide"><?php include '../../cycleAchat/cycle_achat_d/sms/sms_empty/Mess_conclus_vide_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de la formulaire de la synthèse non existant*********************-->
<div id="mess_synth_non"><?php include '../../../cycleAchat/cycle_achat_d/sms/mess_non_synth.php';?></div>
<!--*******************************************************************************************************-->
</div>
