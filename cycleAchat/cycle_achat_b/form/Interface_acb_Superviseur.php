<?php 

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=2 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1)
{
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=2 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=$donnees2['CONCLUSION_COMMENTAIRE'];
	$risque=$donnees2['CONCLUSION_RISQUE'];

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=2 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
	$risque=$donnees['SYNTHESE_RISQUE'];

}


$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=2 AND MISSION_ID='.$mission_id);
$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==1 || $donnees1['QUESTION_ID']==2 || $donnees1['QUESTION_ID']==3 || $donnees1['QUESTION_ID']==4 || $donnees1['QUESTION_ID']==5 || $donnees1['QUESTION_ID']==6 || $donnees1['QUESTION_ID']==17)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==1 || $donnees1['QUESTION_ID']==21 || $donnees1['QUESTION_ID']==22 || $donnees1['QUESTION_ID']==2 || $donnees1['QUESTION_ID']==3 || $donnees1['QUESTION_ID']==4 || $donnees1['QUESTION_ID']==5 || $donnees1['QUESTION_ID']==6 || $donnees1['QUESTION_ID']==7 || $donnees1['QUESTION_ID']==8 || $donnees1['QUESTION_ID']==9 || $donnees1['QUESTION_ID']==10 || $donnees1['QUESTION_ID']==11 || $donnees1['QUESTION_ID']==12 || $donnees1['QUESTION_ID']==13 || $donnees1['QUESTION_ID']==14 || $donnees1['QUESTION_ID']==15 || $donnees1['QUESTION_ID']==16 || $donnees1['QUESTION_ID']==17 || $donnees1['QUESTION_ID']==18 || $donnees1['QUESTION_ID']==19 || $donnees1['QUESTION_ID']==20)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==7 || $donnees1['QUESTION_ID']==8 || $donnees1['QUESTION_ID']==10 || $donnees1['QUESTION_ID']==13 || $donnees1['QUESTION_ID']==14 || $donnees1['QUESTION_ID']==15 || $donnees1['QUESTION_ID']==18 || $donnees1['QUESTION_ID']==19 || $donnees1['QUESTION_ID']==20)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==9 || $donnees1['QUESTION_ID']==11 || $donnees1['QUESTION_ID']==12 || $donnees1['QUESTION_ID']==16 || $donnees1['QUESTION_ID']==21 || $donnees1['QUESTION_ID']==22)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
?>
<link href="cycleAchat/cycle_achat_b/css/div.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_b/css/div_acb.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_b/css/class.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_b/css/div_fermer_quest_objectif_acb.css" rel="stylesheet" type="text/css" />


<link href="cycleAchat/css/AchatCSS.css" rel="stylesheet" type="text/css" />
<script>
$(function()
{

	$("#int_acb_Sup_Retour").click(function (e)
	{

		$('#mess_ret_acb_sup').show();
		$('#int_conclusion_acb_superviseur').hide();
		$('#fancybox_bouton_acb').show();
		closedButtSupacb();
	});


	//evenement de la conclusion de B superviseur
			$('#int_acb_sup_conclusion').click(function()
			{

				var commentaire=$('#txarea_synthese_acb').val();
				var risque=$('input[type=radio][name=risque]:checked').val();
				var mission_id=$('#tx_miss_conc_acb').val();
				if(document.getElementById("txarea_synthese_acb").value==""){
					$('#mess_synth_non').show();
					$('#fancybox_bouton_acb').show();
					//closedButtSupacb();
				}
				else{
					$.ajax({
						type:'POST',
						//url:'cycleAchat/cycle_achat_b/php/enreg_synth_acb.php',
						url:'cycleAchat/cycle_achat_b/php/enreg_concl_acb.php',
						data:{mission_id:mission_id,commentaire:commentaire, cycleAchatId:2,risque:risque},
						success:function(e){
							alert("cycle achat b bien enregistré");
							$('#mess_ret_acb_sup').show();
							$('#int_conclusion_acb_superviseur').hide();
							$('#fancybox_bouton_acb').show();

							$('#contenue_rsci').show();
							$('#dv_cont_obj_sup_b').hide();
							$('#mess_ret_abc_sup').hide();
							$('#fancybox_bouton_acb').hide();


								eo=""+e+"";
								doc=eo.split(',');
								$('#commentaire_Question_acb_sup_conclusion').val(doc[0]);
								if(doc[1]=='faible'){
									document.getElementById("rad_Conclus_Faible_acb").checked=true;
								}
								else if(doc[1]=='moyen'){
									document.getElementById("rad_Conclus_Moyen_acb").checked=true;
								}
								else if(doc[1]=='eleve'){
									document.getElementById("rad_Conclus_Eleve_acb").checked=true;
								}
								if(doc[2]==1){
									document.getElementById("rad_Conclus_Faible_acb").disabled=true;
									document.getElementById("rad_Conclus_Moyen_acb").disabled=true;
									document.getElementById("rad_Conclus_Eleve_acb").disabled=true;
									document.getElementById("commentaire_Question_acb_sup_conclusion").disabled=true;
								}


								$("#contenue_rsci").load('cycleAchat/index.php',function (res)
								{
									$("#contenue_rsci").show();
									$('#mess_ret_acb_sup').show();
									$('#int_conclusion_acb_superviseur').hide();
									$('#fancybox_bouton_acb').show();
								});


							// $('#int_conclusion_acb_superviseur').show();
							// $('#fancybox_bouton_acb').show();
						}
					});
				}
				//closedButtSupacb();

		});


});

function closedButtSupacb(){
	//document.getElementById("int_acb_Sup_Retour").disabled=true;
	//document.getElementById("int_acb_sup_conclusion").disabled=true;
}
function openButtSupacb(){
	document.getElementById("int_acb_Sup_Retour").disabled=false;
	//document.getElementById("int_acb_sup_conclusion").disabled=false;
}



</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_conc_acb" style="display:none;"/>



<div id="int_acb_Sup">

                <div id="fond_Sous_Titre" class="menu_Titre">
                    <label class="marge_Titre">Evaluation du contrôle des fournisseur</label>
                    <label class="margin_Code">Code : FC1</label>
                </div>
                <div id="TitreobjACHATVALID">B.Exhaustivité.</div>
                
                
                
                
	<div id="Interface_Question_acb_Superviseur"><?php include '../../../cycleAchat/cycle_achat_b/form/Interface_acb_Questionnaire_Superviseur.php';?></div>

		<div id="Interface_Synthese_acb_Audit">
        
         
           
        
			<table width="100%" bgcolor="#ccc">
				<tr>
					<td class="sous_Titre" height="30">CONCLUSION</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><textarea cols="22" rows="15" id="txarea_synthese_acb" <?php if($nombre_resultat==1){echo "disabled";}?> ><?php echo $commentaire; ?></textarea>
					</td>
					<td>
						<table>
							<tr>
								<td class="sous_Titre" align="center">Score :	</td>
							</tr>
							<tr>
								<td class="sous_Titre" align="center" height="30"><?php echo $score_final; ?>/43</td>
							</tr>
							<tr>
								<td height="50"></td>
							</tr>
							<tr>
								<td class="sous_Titre" height="30">Niveau de risque</td>
							</tr>
							<tr>
								<td class="sous_Titre" height="50">
									<?php if($nombre_resultat==1){ ?>
											<input type="radio" class="risque" value="faible" id="rd_Synthese_acb_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
											<input type="radio" class="risque" value="moyen" id="rd_Synthese_acb_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
											<input type="radio" class="risque" value="eleve" id="rd_Synthese_acb_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';} ?>disabled/>Elevé
										<?php } else{?>
											<input type="radio" class="risque" value="faible" id="rd_Synthese_acb_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?>/>Faible<br />
											<input type="radio" class="risque" value="moyen" id="rd_Synthese_acb_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
											<input type="radio" class="risque" value="eleve" id="rd_Synthese_acb_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';}?>/>Elevé
										<?php } ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div id="Interface_Conclusion_acb_Audit">
			<table width="100%" class="sous_Titre">
				<tr>
					<td align="center">
						<input type="button" value="retour" class="bouton" id="int_acb_Sup_Retour"/>
						<input type="button" value="Validation" class="bouton" id="int_acb_sup_conclusion" <?php if($nombre_resultat==1){echo "disabled";}?> />
					</td>
				</tr>
			</table>
		</div>
		<div id="fancybox_bouton_acb"></div>


	<div id="int_Bouton_Interface_acb" align="center">

	</div>

	
<!--****************************************Interface A Terminer conclusion********************************-->
<div id="message_Terminer_question_acb"><?php include '../sms/Message terminer question acb.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface B Synthese*******************************************-->
<div id="Int_Synthese_acb"><?php include 'Interface_acb_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_acb"><?php include '../sms/Message terminer synthese acb.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************Message de fermeture de la conclusion de l'objectif B sup*********************-->
<div id="mess_Termine_conclusion_acb_sup"><?php include '../sms/Message_fermer_conclusion_acb_sup.php';?></div>
<!--*******************************************************************************************************-->
<div id="mess_valide_conclusion_acb_sup"><?php include '../sms/Message_confirmation_conclusion_acb_sup.php'; ?></div>
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_acb"><?php include '../sms/Message slide acb Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_acb"><?php include '../sms/Message slide question terminer acb.php' ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de conclusion de B superviseur*****************************-->
<div id="int_conclusion_acb_superviseur" data-options="handle:'#dragg_conlus_acb'" align="center">
<div id="dragg_conlus_acb" class="td_Titre_Question"><br />CONCLUSION</div>
<?php //include 'Interface_acb_superviseur_conclusion.php'; ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de retour B superviseur************************************-->
<div id="message_retour_acb_sup"><?php include '../sms/Message_retour_acb_sup.php'; ?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de confirmation de retour****************************************-->
<div id="mess_ret_acb_sup"><?php include '../sms/Mess_ret_acb_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de validation de la conclusion******************************-->
<div id="mess_slide_conclusion_acb"><?php include '../sms/Message_slide_acb_conclusion.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de page vide de la conclusion*******************************-->
<!--div id="mess_conclus_vide"><?php //include '../sms/sms_empty/Mess_conclus_vide_sup.php';?></div-->
<!--*******************************************************************************************************-->
<!--******************************Message de la formulaire de la synthèse non existant*********************-->
<div id="mess_synth_non"><?php include '../sms/mess_non_synth.php';?></div>
<!--*******************************************************************************************************-->

<div id="mess_empty_conclus_acb"><?php include '../sms/sms_empty/mess_empty_conclus.php'; ?>
</div>
                
                
                

</div>
