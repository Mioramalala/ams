<?php 
include '../../../connexion.php';
@session_start();
$mission_id=$_SESSION['idMission'];
// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=26 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1) {
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=26 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque=utf8_encode($donnees2['CONCLUSION_RISQUE']);

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=26 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$commentaire=utf8_encode($donnees['SYNTHESE_COMMENTAIRE']);
	$risque=utf8_encode($donnees['SYNTHESE_RISQUE']);

}

$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=26 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==320 || $donnees1['QUESTION_ID']==321 || $donnees1['QUESTION_ID']==322 || $donnees1['QUESTION_ID']==323)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON")){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==324 || $donnees1['QUESTION_ID']==325 || $donnees1['QUESTION_ID']==326 || $donnees1['QUESTION_ID']==327 || $donnees1['QUESTION_ID']==328 || $donnees1['QUESTION_ID']==334)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==318 || $donnees1['QUESTION_ID']==319 || $donnees1['QUESTION_ID']==329 || $donnees1['QUESTION_ID']==330 || $donnees1['QUESTION_ID']==331 || $donnees1['QUESTION_ID']==332 || $donnees1['QUESTION_ID']==333)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
?>
<link href="cycleVente/Venteb/css/div.css" rel="stylesheet" type="text/css" />
<link href="cycleVente/Venteb/css/div_vb.css" rel="stylesheet" type="text/css" />
<link href="cycleVente/Venteb/css/class.css" rel="stylesheet" type="text/css" />
<link href="cycleVente/Venteb/css/div_fermer_quest_objectif_vb.css" rel="stylesheet" type="text/css" />



<script language="javascript">
$(function(){
	$(document).ready(function() {
		$('#int_conclusion_vb_superviseur').draggable();
	});
	//evenement de retour dans le menu principale
	$('#int_vb_Sup_Retour').click(function(){
		$('#mess_ret_vb_sup').show();
		$('#int_conclusion_vb_superviseur').hide();
		$('#fancybox_bouton_vb').show();
		closedButtSupvb();
	});
	//evenement de la conclusion de B superviseur
	$('#int_vb_sup_conclusion').click(function(){
	var commentaire=$('#txarea_synthese_vb').val();
	var risque=$('input[type=radio][name=risque]:checked').val();
		if(document.getElementById("txarea_synthese_vb").value==""){
			$('#mess_synth_non').show();
			$('#fancybox_bouton_vb').show();
			closedButtSupvb();
		}
		else{
			$.ajax({
				type:'POST',
				//url:'cycleVente/Venteb/php/enreg_synth_vb.php',
				url:'cycleVente/enregistre_conclusion.php',
				data:{commentaire:commentaire, cycleAchatId:26,risque:risque},
				success:function(e){
				alert("cycle vente b bien enregistré");
					eo=""+e+"";
					doc=eo.split(',');
					$('#commentaire_Question_vb_sup_conclusion').val(doc[0]);
					if(doc[1]=='faible'){
						document.getElementById("rad_Conclus_Faible_vb").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rad_Conclus_Moyen_vb").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rad_Conclus_Eleve_vb").checked=true;
					}
					if(doc[2]==1){
						document.getElementById("rad_Conclus_Faible_vb").disabled=true;
						document.getElementById("rad_Conclus_Moyen_vb").disabled=true;
						document.getElementById("rad_Conclus_Eleve_vb").disabled=true;
						document.getElementById("commentaire_Question_vb_sup_conclusion").disabled=true;								
					}

					$("#contRsciVente").html("");
					$("#contRsciVente").load("cycleVente/Vente.php",function (res)
					{
						$('#contRsciVente').show();
						$('#contSupVb').hide();
						$('#mess_ret_vb_sup').hide();
						$('#fancybox_bouton_vb').hide();
					});
				/**/
				/* $('#int_conclusion_vb_superviseur').show();
				 $('#fancybox_bouton_vb').show();*/
				}
			});
		}
		closedButtSupvb();
	});
});

function closedButtSupvb(){
	document.getElementById("int_vb_Sup_Retour").disabled=true;
	document.getElementById("int_vb_sup_conclusion").disabled=true;	
}
function openButtSupvb(){
	document.getElementById("int_vb_Sup_Retour").disabled=false;
	document.getElementById("int_vb_sup_conclusion").disabled=false;	
}
</script>

<link href="css/cssSousmenueCycle.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_conc_vb" style="display:none;"/>
<div id="int_vb_Sup">
   
   
	<div id="fond_Sous_Titre" class="menu_Titre">
                    <label class="marge_Titre">Evaluation du contrôle des fournisseur</label>
                    <label class="margin_Code">Code : FCZ</label>
       </div>
       <div id="TitreobjCycle">B.Exhaustivité.</div>
	      

	<div id="Interface_Question_vb_Superviseur"><?php include '../../../cycleVente/Venteb/form/Interface_vb_Questionnaire_Superviseur.php';?></div>
		<div id="Interface_Synthese_vb_Audit">
			<table width="100%" bgcolor="#ccc">
				<tr>
					<td class="sous_Titre" height="30">SYNTHESE ET CONCLUSION</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><textarea cols="22" rows="15" id="txarea_synthese_vb"<?php if($nombre_resultat==1){echo "disabled";}?> ><?php echo $commentaire; ?></textarea>
					</td>
					<td>
						<table>
							<tr>
								<td class="sous_Titre" align="center">Score :	</td>
							</tr>
							<tr>
								<td class="sous_Titre" align="center" height="30"><?php echo $score_final; ?>/37</td>
							</tr>

							<tr>
								<td class="sous_Titre" height="30">Niveau de risque</td>
							</tr>
							<tr>
								<td class="sous_Titre" height="50">
									<?php if($nombre_resultat==1){ ?>
										<input type="radio"	 value="faible" id="rd_Synthese_vb_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
										<input type="radio"  value="moyen" id="rd_Synthese_vb_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
										<input type="radio"  value="eleve" id="rd_Synthese_vb_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';} ?>disabled/>Elevé
									<?php } else{?>
										<input type="radio" value="faible" id="rd_Synthese_vb_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?>/>Faible<br />
										<input type="radio" value="moyen" id="rd_Synthese_vb_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
										<input type="radio" value="eleve" id="rd_Synthese_vb_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';}?>/>Elevé
									<?php } ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div id="Interface_Conclusion_vb_Audit">
			<table width="100%" class="sous_Titre">
				<tr>
					<td align="center">
						<input type="button" value="retour" class="bouton" id="int_vb_Sup_Retour"/>
						<input type="button" value="Validation" class="bouton" id="int_vb_sup_conclusion"<?php if($nombre_resultat==1){echo "disabled";}?> />
					</td>
				</tr>
			</table>
		</div>
		<div id="fancybox_bouton_vb"></div>
	<!--div id="Int_Droite_B">
		<input type="button" class="bouton" value="Retour" id="int_B_Retour" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_B_Synthese" /><br />
		<input type="button" class="bouton" value="Liste" id="Int_B_Liste_B" /><br />
		<input type="button" class="bouton" value="Suivant" id="Int_B_Suivant" />
	</div-->

	<div id="int_Bouton_Interface_vb" align="center">

	</div>
<!--****************************************Interface A Terminer conclusion********************************-->
<div id="message_Terminer_question_vb"><?php include '../sms/Message terminer question vb.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface B Synthese*******************************************-->
<div id="Int_Synthese_vb"><?php include 'Interface_vb_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_vb"><?php include '../sms/Message terminer synthese vb.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************Message de fermeture de la conclusion de l'objectif B sup*********************-->
<div id="mess_Termine_conclusion_vb_sup"><?php include '../sms/Message_fermer_conclusion_vb_sup.php';?></div>
<!--*******************************************************************************************************-->
<div id="mess_valide_conclusion_vb_sup"><?php include '../sms/Message_confirmation_conclusion_vb_sup.php'; ?></div>
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_vb"><?php include '../sms/Message slide vb Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_vb"><?php include '../sms/Message slide question terminer vb.php';?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de conclusion de B superviseur*****************************-->
<div id="int_conclusion_vb_superviseur" data-options="handle:'#dragg_conlus_vb'" align="center">
<div id="dragg_conlus_vb" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include 'Interface_vb_superviseur_conclusion.php'; ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de retour B superviseur************************************-->
<div id="message_retour_vb_sup"><?php include '../sms/Message_retour_vb_sup.php'; ?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de confirmation de retour****************************************-->
<div id="mess_ret_vb_sup"><?php include '../sms/Mess_ret_vb_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de validation de la conclusion******************************-->
<div id="mess_slide_conclusion_vb"><?php include '../sms/Message_slide_vb_conclusion.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de page vide de la conclusion*******************************-->
<!--div id="mess_conclus_vide"><?php //include '../sms/sms_empty/Mess_conclus_vide_sup.php';?></div-->
<!--*******************************************************************************************************-->
<!--******************************Message de la formulaire de la synthèse non existant*********************-->
<div id="mess_synth_non"><?php include '../sms/mess_non_synth.php';?></div>
<!--*******************************************************************************************************-->

<div id="mess_empty_conclus_vb"><?php include '../sms/sms_empty/mess_empty_conclus.php'; ?>
</div>
