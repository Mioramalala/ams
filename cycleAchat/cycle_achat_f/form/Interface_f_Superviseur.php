<?php 

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];


// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=6 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1) {
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=6 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque=utf8_encode($donnees2['CONCLUSION_RISQUE']);

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=6 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$commentaire=utf8_encode($donnees['SYNTHESE_COMMENTAIRE']);
	$risque=utf8_encode($donnees['SYNTHESE_RISQUE']);

}

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=6 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==58 || $donnees1['QUESTION_ID']==59 || $donnees1['QUESTION_ID']==67)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==55 || $donnees1['QUESTION_ID']==56 || $donnees1['QUESTION_ID']==57 || $donnees1['QUESTION_ID']==58 || $donnees1['QUESTION_ID']==59 || $donnees1['QUESTION_ID']==60 || $donnees1['QUESTION_ID']==61 || $donnees1['QUESTION_ID']==62 || $donnees1['QUESTION_ID']==63 || $donnees1['QUESTION_ID']==64 || $donnees1['QUESTION_ID']==65 || $donnees1['QUESTION_ID']==66 || $donnees1['QUESTION_ID']==67 || $donnees1['QUESTION_ID']==68 || $donnees1['QUESTION_ID']==69)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==55 || $donnees1['QUESTION_ID']==56 || $donnees1['QUESTION_ID']==57)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==60 || $donnees1['QUESTION_ID']==61 || $donnees1['QUESTION_ID']==62 || $donnees1['QUESTION_ID']==63 || $donnees1['QUESTION_ID']==64 || $donnees1['QUESTION_ID']==65 || $donnees1['QUESTION_ID']==66 || $donnees1['QUESTION_ID']==68 || $donnees1['QUESTION_ID']==69)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
?>
<link href="cycleAchat/cycle_achat_f/css/div.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_f/css/div_f.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_f/css/class.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_f/css/div_fermer_quest_objectif_f.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/css/AchatCSS.css" rel="stylesheet" type="text/css" />

<script>
$(function(){
	$(document).ready(function() {
		$('#int_conclusion_f_superviseur').draggable();
	});
	//evenement de retour dans le menu principale
	$('#int_f_Sup_Retour').click(function(){
		$('#mess_ret_f_sup').show();
		$('#int_conclusion_f_superviseur').hide();
		$('#fancybox_bouton_f').show();
		closedButtSupf();
	});
	//evenement de la conclusion de B superviseur
	$('#int_f_sup_conclusion').click(function(){
	var commentaire=$('#txarea_synthese_f').val();
	var risque=$('input[type=radio][name=risque]:checked').val();

		if(document.getElementById("txarea_synthese_f").value==""){
			$('#mess_synth_non').show();
			$('#fancybox_bouton_f').show();
		}
		else{
			$.ajax({
				type:'POST',
				//url:'cycleAchat/cycle_achat_f/php/enreg_synth_f.php',
				url:'cycleAchat/enregistre_conclusion.php',
				data:{commentaire:commentaire, cycleAchatId:6,risque:risque},
				success:function(e){
				alert("cycle achat f bien enregistré");
				

				
					eo=""+e+"";
					doc=eo.split(',');
					$('#commentaire_Question_f_sup_conclusion').val(doc[0]);
					if(doc[1]=='faible'){
						document.getElementById("rad_Conclus_Faible_f").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rad_Conclus_Moyen_f").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rad_Conclus_Eleve_f").checked=true;
					}
					if(doc[2]==1){
						document.getElementById("rad_Conclus_Faible_f").disabled=true;
						document.getElementById("rad_Conclus_Moyen_f").disabled=true;
						document.getElementById("rad_Conclus_Eleve_f").disabled=true;
						document.getElementById("commentaire_Question_f_sup_conclusion").disabled=true;								
					}

					$("#contenue_rsci").load('cycleAchat/index.php',function (res)
					{

						$('#contenue_rsci').show();
						$('#dv_cont_obj_f_sup').hide();
						$('#mess_ret_f_sup').hide();
						$('#fancybox_bouton_f').hide();
					});
				// $('#int_conclusion_f_superviseur').show();
				// $('#fancybox_bouton_f').show();
				}
			});
		}
		//();
	});
});

function closedButtSupf(){
	document.getElementById("int_f_Sup_Retour").disabled=true;
	document.getElementById("int_f_sup_conclusion").disabled=true;	
}
function openButtSupf(){
	document.getElementById("int_f_Sup_Retour").disabled=false;
	document.getElementById("int_f_sup_conclusion").disabled=false;	
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_conc_f" style="display:none;"/>
<div id="int_f_Sup">

		 		<div id="fond_Sous_Titre" class="menu_Titre">
                    <label class="marge_Titre">Evaluation du contrôle des fournisseur</label>
                    <label class="margin_Code">Code : FC1</label>
                </div>
                <div id="TitreobjACHATVALID">F. S'assurer que tous les achats, ainsi que les charges et produits connexes sont correctement imputés, totalisés et centralisés.</div>



	<div id="Interface_Question_f_Superviseur" style="top:130px"><?php include '../../../cycleAchat/cycle_achat_f/form/Interface_f_Questionnaire_Superviseur.php';?></div>
		<div id="Interface_Synthese_f_Audit">
			<table width="100%" bgcolor="#ccc">
				<tr>
					<td class="sous_Titre" height="30">CONCLUSION</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><textarea cols="22" rows="15" id="txarea_synthese_f"<?php if($nombre_resultat==1){echo "disabled";}?> ><?php echo $commentaire; ?></textarea>
					</td>
					<td>
						<table>
							<tr>
								<td class="sous_Titre" align="center">Score :	</td>
							</tr>
							<tr>
								<td class="sous_Titre" align="center" height="30"><?php echo $score_final; ?>/36</td>
							</tr>

							<tr>
								<td class="sous_Titre" height="30">Niveau de risque</td>
							</tr>
							<tr>
								<td class="sous_Titre" height="50">
									<?php if($nombre_resultat==1){ ?>
										<input type="radio" class="risque" value="faible" id="rd_Synthese_f_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
										<input type="radio" class="risque" value="moyen" id="rd_Synthese_f_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
										<input type="radio" class="risque" value="eleve" id="rd_Synthese_f_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';} ?>disabled/>Elevé
									<?php } else{?>
										<input type="radio" class="risque" value="faible" id="rd_Synthese_f_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?>/>Faible<br />
										<input type="radio" class="risque" value="moyen" id="rd_Synthese_f_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
										<input type="radio" class="risque" value="eleve" id="rd_Synthese_f_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';}?>/>Elevé
									<?php } ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div id="Interface_Conclusion_f_Audit" style="top: 300px;left: 450px;position: relative !important;">
			<table width="100%" class="sous_Titre">
				<tr>
					<td align="center">
						<input type="button" value="retour" class="bouton" id="int_f_Sup_Retour"/>
						<input type="button" value="Validation" class="bouton" id="int_f_sup_conclusion"<?php if($nombre_resultat==1){echo "disabled";}?> />
					</td>
				</tr>
			</table>
		</div>
		<div id="fancybox_bouton_f"></div>

	<div id="int_Bouton_Interface_f" align="center">

	</div>
<!--****************************************Interface A Terminer conclusion********************************-->
<div id="message_Terminer_question_f"><?php include '../sms/Message terminer question f.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface B Synthese*******************************************-->
<div id="Int_Synthese_f"><?php include 'Interface_f_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_f"><?php include '../sms/Message terminer synthese f.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************Message de fermeture de la conclusion de l'objectif B sup*********************-->
<div id="mess_Termine_conclusion_f_sup"><?php include '../sms/Message_fermer_conclusion_f_sup.php';?></div>
<!--*******************************************************************************************************-->
<div id="mess_valide_conclusion_f_sup"><?php include '../sms/Message_confirmation_conclusion_f_sup.php'; ?></div>
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_f"><?php include '../../cycleAchat/cycle_achat_f/sms/Message slide f Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_f"><?php include '../sms/Message slide question terminer f.php';?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de conclusion de B superviseur*****************************-->
<div id="int_conclusion_f_superviseur" data-options="handle:'#dragg_conlus_f'" align="center">
<div id="dragg_conlus_f" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include 'Interface_f_superviseur_conclusion.php'; ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de retour B superviseur************************************-->
<div id="message_retour_f_sup"><?php include '../sms/Message_retour_f_sup.php'; ?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de confirmation de retour****************************************-->
<div id="mess_ret_f_sup"><?php include '../sms/Mess_ret_f_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de validation de la conclusion******************************-->
<div id="mess_slide_conclusion_f"><?php include '../sms/Message_slide_f_conclusion.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de page vide de la conclusion*******************************-->
<div id="mess_conclus_vide"><?php include '../../cycleAchat/cycle_achat_f/sms/sms_empty/Mess_conclus_vide_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de la formulaire de la synthèse non existant*********************-->
<div id="mess_synth_non"><?php include '../../../cycleAchat/cycle_achat_f/sms/mess_non_synth.php';?></div>
<!--*******************************************************************************************************-->
</div>
