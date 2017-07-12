<?php 

include '../../../connexion.php';

@session_start();
$mission_id=$_SESSION['idMission'];

// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=15 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1) {
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=15 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque=utf8_encode($donnees2['CONCLUSION_RISQUE']);

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=15 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$commentaire=utf8_encode($donnees['SYNTHESE_COMMENTAIRE']);
	$risque=utf8_encode($donnees['SYNTHESE_RISQUE']);

}



$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=15 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==209 || $donnees1['QUESTION_ID']==216 || $donnees1['QUESTION_ID']==217 || $donnees1['QUESTION_ID']==220)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==196 || $donnees1['QUESTION_ID']==197 || $donnees1['QUESTION_ID']==198 || $donnees1['QUESTION_ID']==199 || $donnees1['QUESTION_ID']==200 || $donnees1['QUESTION_ID']==201 || $donnees1['QUESTION_ID']==202 || $donnees1['QUESTION_ID']==203 || $donnees1['QUESTION_ID']==204 || $donnees1['QUESTION_ID']==205 || $donnees1['QUESTION_ID']==206 || $donnees1['QUESTION_ID']==207 || $donnees1['QUESTION_ID']==208 || $donnees1['QUESTION_ID']==209|| $donnees1['QUESTION_ID']==210 || $donnees1['QUESTION_ID']==211 || $donnees1['QUESTION_ID']==212 || $donnees1['QUESTION_ID']==213 || $donnees1['QUESTION_ID']==214 || $donnees1['QUESTION_ID']==215 || $donnees1['QUESTION_ID']==216 || $donnees1['QUESTION_ID']==217 || $donnees1['QUESTION_ID']==218 || $donnees1['QUESTION_ID']==219 || $donnees1['QUESTION_ID']==220 || $donnees1['QUESTION_ID']==221)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==196 || $donnees1['QUESTION_ID']==197 || $donnees1['QUESTION_ID']==198 || $donnees1['QUESTION_ID']==199 || $donnees1['QUESTION_ID']==200 || $donnees1['QUESTION_ID']==201 || $donnees1['QUESTION_ID']==202 || $donnees1['QUESTION_ID']==207 || $donnees1['QUESTION_ID']==221)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==203 || $donnees1['QUESTION_ID']==204 || $donnees1['QUESTION_ID']==205 || $donnees1['QUESTION_ID']==206 || $donnees1['QUESTION_ID']==208 || $donnees1['QUESTION_ID']==210 || $donnees1['QUESTION_ID']==211 || $donnees1['QUESTION_ID']==212 || $donnees1['QUESTION_ID']==213 || $donnees1['QUESTION_ID']==214 || $donnees1['QUESTION_ID']==215 || $donnees1['QUESTION_ID']==218 || $donnees1['QUESTION_ID']==219)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
?>
<link href="cyclePaie/Paiec/css/div.css" rel="stylesheet" type="text/css" />
<link href="cyclePaie/Paiec/css/div_pc.css" rel="stylesheet" type="text/css" />
<link href="cyclePaie/Paiec/css/class.css" rel="stylesheet" type="text/css" />
<link href="cyclePaie/Paiec/css/div_fermer_quest_objectif_pc.css" rel="stylesheet" type="text/css" />

<link href="css/cssSousmenueCycle.css" rel="stylesheet" type="text/css" />


<script>
$(function(){
	// $(document).ready(function() {
		// $('#int_conclusion_pc_superviseur').draggable();
	// });
	//evenement de retour dans le menu principale
	$('#int_pc_Sup_Retour').click(function(){
		$('#mess_ret_pc_sup').show();
		$('#int_conclusion_pc_superviseur').hide();
		$('#fancybox_bouton_pc').show();
		closedButtSuppc();
	});
	
	//evenement de la conclusion de B superviseur
	$('#int_pc_sup_conclusion1').click(function(){
	var commentaire=$('#txarea_synthese_pc').val();
	var risque=$('input[type=radio][name=risque]:checked').val();
		if(document.getElementById("txarea_synthese_pc").value==""){
			$('#mess_synth_non').show();
			$('#fancybox_bouton_pc').show();
			closedButtSuppc();
		}
		else{
			$.ajax({
				type:'POST',

				url:'cycleVente/enregistre_conclusion.php',
				data:{risque:risque,commentaire:commentaire, cycleAchatId:15},
				success:function(e){
					alert("cycle paie c bien enregistré");
					$('#contRsciPaie').load("cyclePaie/Paie.php",function (e)
					{
						$('#contRsciPaie').show();
						$('#contSupPc').hide();
						$('#mess_ret_pc_sup').hide();
						$('#fancybox_bouton_pc').hide();

					});

					eo=""+e+"";
					doc=eo.split(',');
					$('#commentaire_Question_pc_sup_conclusion').val(doc[0]);
					if(doc[1]=='faible'){
						document.getElementById("rad_Conclus_Faible_pc").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rad_Conclus_Moyen_pc").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rad_Conclus_Eleve_pc").checked=true;
					}
					if(doc[2]==1){
						document.getElementById("rad_Conclus_Faible_pc").disabled=true;
						document.getElementById("rad_Conclus_Moyen_pc").disabled=true;
						document.getElementById("rad_Conclus_Eleve_pc").disabled=true;
						document.getElementById("commentaire_Question_pc_sup_conclusion").disabled=true;								
					}



					
				// $('#int_conclusion_pc_superviseur').show();
				// $('#fancybox_bouton_pc').show();
				}
			});
		}
		 closedButtSuppc();
	
	});
	
	
});

function closedButtSuppc(){
	document.getElementById("int_pc_Sup_Retour").disabled=true;
	document.getElementById("int_pc_sup_conclusion").disabled=true;	
}
function openButtSuppc(){
	document.getElementById("int_pc_Sup_Retour").disabled=false;
	document.getElementById("int_pc_sup_conclusion").disabled=false;	
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_conc_pc" style="display:none;"/>
<div id="int_pc_Sup">


		<div id="fond_Sous_Titre" class="menu_Titre">
                    <label class="marge_Titre">Evaluation du contrôle des fournisseur</label>
                    <label class="margin_Code">Code : FC1</label>
       </div>
       <div id="TitreobjCycle">C.Réalité.</div>
       
       
	<div id="Interface_Question_pc_Superviseur"><?php include '../../../cyclePaie/Paiec/form/Interface_pc_Questionnaire_Superviseur.php';?></div>
		<div id="Interface_Synthese_pc_Audit">
			<table width="100%" bgcolor="#ccc">
				<tr>
					<td class="sous_Titre" height="30">SYNTHESE ET CONCLUSION</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><textarea cols="22" rows="15" id="txarea_synthese_pc"<?php if($nombre_resultat==1){echo "disabled";}?> ><?php echo $commentaire; ?></textarea>
					</td>
					<td>
						<table>
							<tr>
								<td class="sous_Titre" align="center">Score :	</td>
							</tr>
							<tr>
								<td class="sous_Titre" align="center" height="30"><?php echo $score_final; ?>/66</td>
							</tr>

							<tr>
								<td class="sous_Titre" height="30">Niveau de risque</td>
							</tr>
							<tr>
								<td class="sous_Titre" height="50">
									<?php if($nombre_resultat==1){ ?>
										<input type="radio"	 value="faible" id="rd_Synthese_pc_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
										<input type="radio"  value="moyen" id="rd_Synthese_pc_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
										<input type="radio"  value="eleve" id="rd_Synthese_pc_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';} ?>disabled/>Elevé
									<?php } else{?>
										<input type="radio" value="faible" id="rd_Synthese_pc_Faible" name="risque" <?php if($risque=="faible") {echo 'checked=checked';}?>/>Faible<br />
										<input type="radio" value="moyen" id="rd_Synthese_pc_Moyen" name="risque" <?php if($risque=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
										<input type="radio" value="eleve" id="rd_Synthese_pc_Eleve" name="risque" <?php if($risque=="eleve") {echo 'checked=checked';}?>/>Elevé
									<?php } ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div id="Interface_Conclusion_pc_Audit">
			<table width="100%" class="sous_Titre">
				<tr>
					<td align="center">
						<input type="button" value="retour" class="bouton" id="int_pc_Sup_Retour"/>
						<input type="button" value="Validation" class="bouton" id="int_pc_sup_conclusion1"<?php if($nombre_resultat==1){echo "disabled";}?> />
					</td>
				</tr>
			</table>
		</div>
		<div id="fancybox_bouton_pc"></div>

	<div id="int_Bouton_Interface_pc" align="center">

	</div>

<!--****************************************Interface A Terminer conclusion********************************-->
<div id="message_Terminer_question_pc"><?php include '../sms/Message terminer question pc.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface B Synthese*******************************************-->
<div id="Int_Synthese_pc"><?php include 'Interface_pc_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_pc"><?php include '../sms/Message terminer synthese pc.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************Message de fermeture de la conclusion de l'objectif B sup*********************-->
<div id="mess_Termine_conclusion_pc_sup"><?php include '../sms/Message_fermer_conclusion_pc_sup.php';?></div>
<!--*******************************************************************************************************-->
<div id="mess_valide_conclusion_pc_sup"><?php include '../sms/Message_confirmation_conclusion_pc_sup.php'; ?></div>
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_pc"><?php include '../sms/Message slide pc Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_pc"><?php include '../sms/Message slide question terminer pc.php';?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de conclusion de B superviseur*****************************-->
<div id="int_conclusion_pc_superviseur" data-options="handle:'#dragg_conlus_pc'" align="center">
<div id="dragg_conlus_pc" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include 'Interface_pc_superviseur_conclusion.php'; ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de retour B superviseur************************************-->
<div id="message_retour_pc_sup"><?php include '../sms/Message_retour_pc_sup.php'; ?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de confirmation de retour****************************************-->
<div id="mess_ret_pc_sup"><?php include '../sms/Mess_ret_pc_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de validation de la conclusion******************************-->
<div id="mess_slide_conclusion_pc"><?php include '../sms/Message_slide_pc_conclusion.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de page vide de la conclusion*******************************-->
<!--div id="mess_conclus_vide"><?php //include '../sms/sms_empty/Mess_conclus_vide_sup.php';?></div-->
<!--*******************************************************************************************************-->
<!--******************************Message de la formulaire de la synthèse non exipant*********************-->
<div id="mess_synth_non"><?php include '../sms/mess_non_synth.php';?></div>
<!--*******************************************************************************************************-->

<div id="mess_empty_conclus_pc"><?php include '../sms/sms_empty/mess_empty_conclus.php'; ?>
</div>
