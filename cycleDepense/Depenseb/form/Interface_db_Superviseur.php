<?php 

include '../../../connexion.php';
@session_start();
$mission_id=$_SESSION['idMission'];

// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=22 AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];
if ($nombre_resultat == 1) {
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=22 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque=utf8_encode($donnees2['CONCLUSION_RISQUE']);

}else{
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
	$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=22 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$commentaire=utf8_encode($donnees['SYNTHESE_COMMENTAIRE']);
	$risque=utf8_encode($donnees['SYNTHESE_RISQUE']);

}
$reponse1=$bdd->query('SELECT OBJECTIF_QCM, QUESTION_ID FROM tab_objectif WHERE CYCLE_ACHAT_ID=22 AND MISSION_ID='.$mission_id);

$score_final=0;
$score=0;
while($donnees1=$reponse1->fetch()){
	if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==286 || $donnees1['QUESTION_ID']==288 || $donnees1['QUESTION_ID']==290)){
		$score=1;
	}
	else if(($donnees1['OBJECTIF_QCM']=="NON") && ($donnees1['QUESTION_ID']==280 || $donnees1['QUESTION_ID']==281 || $donnees1['QUESTION_ID']==282 || $donnees1['QUESTION_ID']==283 || $donnees1['QUESTION_ID']==284 || $donnees1['QUESTION_ID']==285 || $donnees1['QUESTION_ID']==286 || $donnees1['QUESTION_ID']==287 || $donnees1['QUESTION_ID']==288 || $donnees1['QUESTION_ID']==289 || $donnees1['QUESTION_ID']==290 || $donnees1['QUESTION_ID']==291 || $donnees1['QUESTION_ID']==292 || $donnees1['QUESTION_ID']==293 || $donnees1['QUESTION_ID']==294)){
		$score=0;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==284 || $donnees1['QUESTION_ID']==285 || $donnees1['QUESTION_ID']==287 || $donnees1['QUESTION_ID']==289 || $donnees1['QUESTION_ID']==294)){
		$score=2;
	}
	else if(($donnees1['OBJECTIF_QCM']=="OUI" || $donnees1['OBJECTIF_QCM']=="N/A") && ($donnees1['QUESTION_ID']==280 || $donnees1['QUESTION_ID']==281 || $donnees1['QUESTION_ID']==282 || $donnees1['QUESTION_ID']==283 || $donnees1['QUESTION_ID']==291 || $donnees1['QUESTION_ID']==292 || $donnees1['QUESTION_ID']==293)){
		$score=3;
	}
	$score_final=$score_final+$score;
}
?>
<link href="cycleDepense/Depenseb/css/div.css" rel="stylesheet" type="text/css" />
<link href="cycleDepense/Depenseb/css/div_db.css" rel="stylesheet" type="text/css" />
<link href="cycleDepense/Depenseb/css/class.css" rel="stylesheet" type="text/css" />
<link href="cycleDepense/Depenseb/css/div_fermer_quest_objectif_db.css" rel="stylesheet" type="text/css" />

<link href="css/cssSousmenueCycle.css" rel="stylesheet" type="text/css" />


<script>
$(function(){
	$(document).ready(function() {
		$('#int_conclusion_db_superviseur').draggable();
	});
	//evenement de retour dans le menu principale
	$('#int_db_Sup_Retour').click(function(){
		$('#mess_ret_db_sup').show();
		$('#int_conclusion_db_superviseur').hide();
		$('#fancybox_bouton_db').show();
		closedButtSupdb();
	});
	//evenement de la conclusion de B superviseur
	$('#int_db_sup_conclusion').click(function(){
	var commentaire=$('#txarea_synthese_db').val();
	var risque=$('input[type=radio][name=risque]:checked').val();
		if(document.getElementById("txarea_synthese_db").value==""){
			$('#mess_synth_non').show();
			$('#fancybox_bouton_db').show();
			closedButtSupdb();
		}
		else{
			$.ajax({
				type:'POST',
				//url:'cycleDepense/Depenseb/php/enreg_synth_db.php',					
				url:'cycleDepense/enregistre_conclusion.php',

				data:{risque:risque,commentaire:commentaire,cycleAchatId:22},
				success:function(e){
					//alert(e);
				alert("cycle tresorerie depense b bien enregistré");
				

				
					eo=""+e+"";
					doc=eo.split(',');
					$('#commentaire_Question_db_sup_conclusion').val(doc[0]);
					if(doc[1]=='faible'){
						document.getElementById("rad_Conclus_Faible_db").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rad_Conclus_Moyen_db").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rad_Conclus_Eleve_db").checked=true;
					}
					if(doc[2]==1){
						document.getElementById("rad_Conclus_Faible_db").disabled=true;
						document.getElementById("rad_Conclus_Moyen_db").disabled=true;
						document.getElementById("rad_Conclus_Eleve_db").disabled=true;
						document.getElementById("commentaire_Question_db_sup_conclusion").disabled=true;								
					}

					$("#contRsciDepense").load("cycleDepense/Depense.php",function (res)
					{
						$('#contRsciDepense').show();
						$('#contSupDb').hide();
						$('#mess_ret_db_sup').hide();
						$('#fancybox_bouton_db').hide();

					});
				// $('#int_conclusion_db_superviseur').show();
				// $('#fancybox_bouton_db').show();
				}
			});
		}
		closedButtSupdb();
	});
});

function closedButtSupdb(){
	document.getElementById("int_db_Sup_Retour").disabled=true;
	document.getElementById("int_db_sup_conclusion").disabled=true;	
}
function openButtSupdb(){
	document.getElementById("int_db_Sup_Retour").disabled=false;
	document.getElementById("int_db_sup_conclusion").disabled=false;	
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_conc_db" style="display:none;"/>
<div id="int_db_Sup">

			<div id="fond_Sous_Titre" class="menu_Titre">
                    <label class="marge_Titre">Evaluation du contrôle des fournisseur</label>
                    <label class="margin_Code">Code : FC1</label>
                </div>
                <div id="TitreobjCycle">Exhaustivité</div>
                

	<div id="Interface_Question_db_Superviseur"><?php include '../../../cycleDepense/Depenseb/form/Interface_db_Questionnaire_Superviseur.php';?></div>
		<div id="Interface_Synthese_db_Audit">
			<table width="100%" bgcolor="#ccc">
				<tr>
					<td class="sous_Titre" height="30">CONCLUSION</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><textarea cols="22" rows="15" id="txarea_synthese_db" ><?php echo $commentaire; ?></textarea>
					</td>
					<td>
						<table>
							<tr>
								<td class="sous_Titre" align="center">Score :</td>
							</tr>
							<tr>
								<td class="sous_Titre" align="center" height="30"><?php echo $score_final; ?>/34</td>
							</tr>

							<tr>
								<td class="sous_Titre" height="30">Niveau de risque</td>
							</tr>
							<tr>
								<td class="sous_Titre" height="50">
									<input type="radio" id="rd_Synthese_db_Faible" name="risque" value="faible" <?php if($risque=="faible") echo 'checked'; ?>/>Faible<br />
									<input type="radio" id="rd_Synthese_db_Moyen" name="risque" value="moyen" <?php if($risque=="moyen") echo 'checked'; ?>/>Moyen<br />
									<input type="radio" id="rd_Synthese_db_Eleve" name="risque" value="eleve" <?php if($risque=="eleve") echo 'checked'; ?>/>Elevé<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div id="Interface_Conclusion_db_Audit">
			<table width="100%" class="sous_Titre">
				<tr>
					<td align="center">
						<input type="button" value="retour" class="bouton" id="int_db_Sup_Retour"/>
						<input type="button" value="Validation" class="bouton" id="int_db_sup_conclusion" />
					</td>
				</tr>
			</table>
		</div>
		<div id="fancybox_bouton_db"></div>

	<div id="int_Bouton_Interface_db" align="center">

	</div>

<!--****************************************Interface A Terminer conclusion********************************-->
<div id="message_Terminer_question_db"><?php include '../sms/Message terminer question db.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface B Synthese*******************************************-->
<div id="Int_Synthese_db"><?php include 'Interface_db_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_db"><?php include '../sms/Message terminer synthese db.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************Message de fermeture de la conclusion de l'objectif B sup*********************-->
<div id="mess_Termine_conclusion_db_sup"><?php include '../sms/Message_fermer_conclusion_db_sup.php';?></div>
<!--*******************************************************************************************************-->
<div id="mess_valide_conclusion_db_sup"><?php include '../sms/Message_confirmation_conclusion_db_sup.php'; ?></div>
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_db"><?php include '../sms/Message slide db Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_db"><?php include '../sms/Message slide question terminer db.php';?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de conclusion de B superviseur*****************************-->
<div id="int_conclusion_db_superviseur" data-options="handle:'#dragg_conlus_db'" align="center">
<div id="dragg_conlus_db" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include 'Interface_db_superviseur_conclusion.php'; ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de retour B superviseur************************************-->
<div id="message_retour_db_sup"><?php include '../sms/Message_retour_db_sup.php'; ?></div>
<!--*******************************************************************************************************-->
<!--******************************Message de confirmation de retour****************************************-->
<div id="mess_ret_db_sup"><?php include '../sms/Mess_ret_db_sup.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de validation de la conclusion******************************-->
<div id="mess_slide_conclusion_db"><?php include '../sms/Message_slide_db_conclusion.php';?></div>
<!--*******************************************************************************************************-->
<!--*********************************Interface de page vide de la conclusion*******************************-->
<!--div id="mess_conclus_vide"><?php //include '../sms/sms_empty/Mess_conclus_vide_sup.php';?></div-->
<!--*******************************************************************************************************-->
<!--******************************Message de la formulaire de la synthèse non exipant*********************-->
<div id="mess_synth_non"><?php include '../sms/mess_non_synth.php';?></div>
<!--*******************************************************************************************************-->

<div id="mess_empty_conclus_db"><?php include '../sms/sms_empty/mess_empty_conclus.php'; ?>
</div>
