<?php 

include '../../../connexion.php';
//@session_start();
//	$mission_id=$_SESSION['idMission'];
$mission_id=$_POST['mission_id'];
//$nom=$_SESSION["nom"];
$UTIL_ID=$_SESSION['id'];
if($_SESSION["nom"]!="Administrateur" && $_SESSION["nom"]!="Super-Admin")
{
	//DEBUT test si l'utilisateur est superviseur de la mission;
	
	//FIN test si l'utilisateur est superviseur de la mission;
	
	
}

// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=3 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1) {
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=3 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque=utf8_encode($donnees2['CONCLUSION_RISQUE']);

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=3 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$commentaire=utf8_encode($donnees['SYNTHESE_COMMENTAIRE']);
	$risque=utf8_encode($donnees['SYNTHESE_RISQUE']);

}

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=3 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==29 || $donnees1['QUESTION_ID']==30 || $donnees1['QUESTION_ID']==33)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==23 || $donnees1['QUESTION_ID']==24 || $donnees1['QUESTION_ID']==25 || $donnees1['QUESTION_ID']==26 || $donnees1['QUESTION_ID']==27 || $donnees1['QUESTION_ID']==28 || $donnees1['QUESTION_ID']==29 || $donnees1['QUESTION_ID']==30 || $donnees1['QUESTION_ID']==31 || $donnees1['QUESTION_ID']==32 || $donnees1['QUESTION_ID']==33)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==23 || $donnees1['QUESTION_ID']==28 || $donnees1['QUESTION_ID']==31 || $donnees1['QUESTION_ID']==32)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==24 || $donnees1['QUESTION_ID']==25 || $donnees1['QUESTION_ID']==26 || $donnees1['QUESTION_ID']==27)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
?>
<link href="cycleAchat/cycle_achat_c/css/div.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_c/css/div_c.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_c/css/class.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_c/css/div_fermer_quest_objectif_c.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/css/AchatCSS.css" rel="stylesheet" type="text/css" />


<script>

	$(document).ready(function() {
		$('#int_conclusion_c_superviseur').draggable();
	});
$(function(){

	//evenement de retour dans le menu principale
	$("#int_c_Sup_Retour").click(function (e)
	{
		$('#mess_ret_c_sup').show();
		$('#int_conclusion_c_superviseur').hide();
		$('#fancybox_bouton_c').show();
		closedButtSupc();
		//$('#message_fermeture_c').show();
	});
	/*$(document).on("click","#int_c_Sup_Retour",function(e){

	});*/
	//evenement de la conclusion de B superviseur
	$('#int_c_sup_conclusion').click(function(){
	var commentaire=$('#txarea_synthese_c').val();
	var risque=$('input[type=radio][name=risque]:checked').val();
		if(document.getElementById("txarea_synthese_c").value==""){
			$('#mess_synth_non').show();
			$('#fancybox_bouton_c').show();
		}
		else{
			$.ajax({
				type:'POST',
				//url:'cycleAchat/cycle_achat_c/php/enreg_synth_c.php',
				url:'cycleAchat/cycle_achat_c/php/enreg_concl_c.php',
				data:{commentaire:commentaire, cycleAchatId:3,risque:risque},
				success:function(e){
				alert("cycle achat c bien enregistré");
				

				
					eo=""+e+"";
					doc=eo.split(',');
					$('#commentaire_Question_c_sup_conclusion').val(doc[0]);
					if(doc[1]=='faible'){
						document.getElementById("rad_Conclus_Faible_c").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rad_Conclus_Moyen_c").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rad_Conclus_Eleve_c").checked=true;
					}
					if(doc[2]==1){
						document.getElementById("rad_Conclus_Faible_c").disabled=true;
						document.getElementById("rad_Conclus_Moyen_c").disabled=true;
						document.getElementById("rad_Conclus_Eleve_c").disabled=true;
						document.getElementById("commentaire_Question_c_sup_conclusion").disabled=true;								
					}


					$("#contenue_rsci").load('cycleAchat/index.php',function (res)
					{

						$('#contenue_rsci').show();
						$('#dv_cont_obj_c_sup').hide();
						$('#mess_ret_c_sup').hide();
						$('#fancybox_bouton_c').hide();
					});


				}
			});
		}
		//closedButtSupc();
	});
});

function closedButtSupc(){
	document.getElementById("int_c_Sup_Retour").disabled=true;
	document.getElementById("int_c_sup_conclusion").disabled=true;	
}
function openButtSupc(){
	document.getElementById("int_c_Sup_Retour").disabled=false;
	document.getElementById("int_c_sup_conclusion").disabled=false;	
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_conc_c" style="display:none;"/>
<div id="int_c_Sup">
                <div id="fond_Sous_Titre" class="menu_Titre">
                    <label class="marge_Titre">Evaluation du contrôle des fournisseur</label>
                    <label class="margin_Code">Code : FC1</label>
                </div>
                <div id="TitreobjACHATVALID">C. S'assurer que toutes les factures (avoirs) enregistrées correspondent à des achats réels de l'entreprise.</div>


	<div id="Interface_Question_c_Superviseur"><?php include '../../../cycleAchat/cycle_achat_c/form/Interface_c_Questionnaire_Superviseur.php';?></div>
		<div id="Interface_Synthese_c_Audit">
			<table width="100%" bgcolor="#ccc">
				<tr>
					<td class="sous_Titre" height="30">CONCLUSION</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><textarea cols="22" rows="15" id="txarea_synthese_c" <?php if($nombre_resultat==1){echo "disabled";}?>><?php echo $commentaire; ?></textarea>
					</td>
					<td>
						<table>
							<tr>
								<td class="sous_Titre" align="center">Score :	</td>
							</tr>
							<tr>
								<td class="sous_Titre" align="center" height="30"><?php echo $score_final; ?>/23</td>
							</tr>

							<tr>
								<td class="sous_Titre" height="30">Niveau de risque</td>
							</tr>
							<tr>
								<td class="sous_Titre" height="50">
									<?php if($nombre_resultat==1){ ?>
											<input type="radio" class="risque" value="faible" id="rd_Synthese_c_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
											<input type="radio" class="risque" value="moyen" id="rd_Synthese_c_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
											<input type="radio" class="risque" value="eleve" id="rd_Synthese_c_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';} ?>disabled/>Elevé
										<?php } else{?>
											<input type="radio" class="risque" value="faible" id="rd_Synthese_c_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?>/>Faible<br />
											<input type="radio" class="risque" value="moyen" id="rd_Synthese_c_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
											<input type="radio" class="risque" value="eleve" id="rd_Synthese_c_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';}?>/>Elevé
										<?php } ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div id="Interface_Conclusion_c_Audit">
			<table width="100%" class="sous_Titre">
				<tr>
					<td align="center">
						<input type="button" value="retour" class="bouton" id="int_c_Sup_Retour"/>
						<input type="button" value="Validation" class="bouton" id="int_c_sup_conclusion"<?php if($nombre_resultat==1){echo "disabled";}?> />
					</td>
				</tr>
			</table>
		</div>
		<div id="fancybox_bouton_c"></div>

	<div id="int_Bouton_Interface_c" align="center">

	</div>

	<div id="Question_c_23_Sup"></div>
	<div id="Question_c_24_Sup"></div>
	<div id="Question_c_25_Sup"></div>	
	<div id="Question_c_26_Sup"></div>
	<div id="Question_c_27_Sup"></div>
	<div id="Question_c_28_Sup"></div>
	<div id="Question_c_29_Sup"></div>
	<div id="Question_c_30_Sup"></div>
	<div id="Question_c_31_Sup"></div>
	<div id="Question_c_32_Sup"></div>
	<div id="Question_c_33_Sup"></div>
	
<!--****************************************Interface A Terminer conclusion********************************-->
<div id="message_Terminer_question_c"><?php include '../sms/Message terminer question c.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface B Synthese*******************************************-->
<div id="Int_Synthese_c"><?php include 'Interface_c_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_c"><?php include '../sms/Message terminer synthese c.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************Message de fermeture de la conclusion de l'objectif B sup*********************-->
<div id="mess_Termine_conclusion_c_sup"><?php include '../sms/Message_fermer_conclusion_c_sup.php';?></div>
<!--*******************************************************************************************************-->
<div id="mess_valide_conclusion_c_sup"><?php include '../sms/Message_confirmation_conclusion_c_sup.php'; ?></div>
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_c"><?php include '../../cycleAchat/cycle_achat_c/sms/Message slide c Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_c"><?php include '../sms/Message slide question terminer c.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de conclusion de B superviseur*****************************-->
<div id="int_conclusion_c_superviseur" data-options="handle:'#dragg_conlus_c'" align="center">
<div id="dragg_conlus_c" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include 'Interface_c_superviseur_conclusion.php'; ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de retour B superviseur************************************-->
<div id="message_retour_c_sup"><?php include '../sms/Message_retour_c_sup.php'; ?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de confirmation de retour****************************************-->
<div id="mess_ret_c_sup"><?php include '../sms/Mess_ret_c_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de validation de la conclusion******************************-->
<div id="mess_slide_conclusion_c"><?php include '../sms/Message_slide_c_conclusion.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de page vide de la conclusion*******************************-->
<div id="mess_conclus_vide"><?php include '../../cycleAchat/cycle_achat_c/sms/sms_empty/cycle_achat_mess_vide_quest_B/Mess_conclus_vide_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de la formulaire de la synthèse non existant*********************-->
<div id="mess_synth_non"><?php include '../sms/mess_non_synth.php';?></div>
<!--*******************************************************************************************************-->
</div>
