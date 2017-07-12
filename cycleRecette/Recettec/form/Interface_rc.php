<?php
include $_SERVER["DOCUMENT_ROOT"]."/connexion.php";
@session_start();
$mission_id=$_SESSION['idMission'];

$verif_=$bdd->query("SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID='19' AND MISSION_ID='$mission_id'");

$resultat=$verif_->fetch();
$validRecetteC=$resultat['nb'];
?>


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script language="javascript">

// Droit cycle by Tolotra
// Page : RSCI -> Cycle Trésorerie
// Tâche : Revue Cotrôles Trésorerie, numéro 26
$.ajax({
    type: 'POST',
    url: 'droitCycle.php',
    data: {task_id: 26},
    success: function (e) {
        var result = 0 === Number(e);
        $("#Int_rc_Continuer").attr('disabled', result);
        $("#Int_rc_Synthese").attr('disabled', result);
    }
});

$(function()
{

	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($validRecetteC==1)
	{

	?>
	$('#contrc textarea').attr('disabled',true);
	$('#contrc #Synthese_rc_Terminer').attr('disabled',true);
	$('#contrc :input[type=radio]').attr('disabled',true); // tinay editer
	<?php
	}
	//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	?>

	// Bouton retour menu achat
	$('#int_rc_Retour').click(function(){
		$('#message_fermeture_rc').show();
		$('#fancybox_rc').show();
	});
	//FIN Continuer la question
	
	
	$('#Int_rc_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_rc").value;
		$.ajax({
			type:'POST',
			url:'cycleRecette/Recettec/php/aff_quest_fin_rc.php',
			data:{mission_id:mission_id},
			success:function(e){
				
					quetion_rc="#Question_rc_"+e;
					$(quetion_rc).fadeIn(500);
					rc=e;
					$.ajax({
						type:'POST',
						url:'cycleRecette/Recettec/php/getRepContinuer.php',
						data:{mission_id:mission_id, questId:e, cycleId:19},
						success:function(e1){
							eo=""+e1+"";
							doc=eo.split(',');
							cpt=1;
							for(i=255; i<263; i++){ 
								if(i==rc){
									rcId="rc_"+cpt;
									rcIdCom="rc"+cpt;
									afficheReponseQuest(rcId,rcIdCom);
									break;
								}
								cpt++;
							}
							
						}
					});
				// }
				$('#dv_table_rc').show();
				$('#lb_veuillez_aff_rc').hide();
				$('#fancybox_rc').show();
			}
		});
	});
	
	//la synthèse de rc
	$('#Int_rc_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_rc").value;
		
		// se rediriger vers calcul score
		$.ajax({
			type:'POST',
			url:'cycleRecette/Recettec/php/select_score_rc.php',
			data:{mission_id:mission_id},
			success:function(e){
			    $("#echo_score_rc").html(e);
			}			
		});
		
		$.ajax({
			type:'POST',
			url:'cycleRecette/Recettec/php/cpt_rc.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==9){
					$.ajax({
						type:'POST',
						url:'cycleRecette/Recettec/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:19},
						success:function(e){
							eo=""+e+"";
							
							doc=eo.split('*');
							document.getElementById("rc_Synthese_rc_Faible").checked=false;
							document.getElementById("rc_Synthese_rc_Moyen").checked=false;
							document.getElementById("rc_Synthese_rc_Eleve").checked=false;
							document.getElementById("txt_Synthese_rc").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rc_Synthese_rc_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rc_Synthese_rc_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rc_Synthese_rc_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_rc').show();
					$('#fancybox_rc').show();
				
				}else{
					$('#fancybox_rc').show();
					$('#mess_vide_obj_rc').show();
				}
			}
		});
	});
});
function afficheReponseQuest(rcId,rcIdCom){
	document.getElementById("rad_Question_Oui_"+rcId).checked=false;
	document.getElementById("rad_Question_NA_"+rcId).checked=false;
	document.getElementById("rad_Question_Non_"+rcId).checked=false;
	if(doc[0]==0){
		document.getElementById("commentaire_Question_"+rcIdCom).value="";
	}
	else
		document.getElementById("commentaire_Question_"+rcIdCom).value=doc[0];
	if(doc[1]=='OUI'){
		document.getElementById("rad_Question_Oui_"+rcId).checked=true;
	}
	else if(doc[1]=='N/A'){
		document.getElementById("rad_Question_NA_"+rcId).checked=true;
	}
	else if(doc[1]=='NON'){
		document.getElementById("rad_Question_Non_"+rcId).checked=true;
	}
}
</script>

<div id="int_rc"><label class="lb_veuillez" id="lb_veuillez_aff_rc"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_rc" style="display:none;" />
	<div id="Interface_Question_rc"><?php include 'cycleRecette/Recettec/load/load_quest_rc.php'; ?></div>
	<div id="dv_table_rc" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_rc">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_rc"></div>
	<div id="Int_Droite_rc">
		<input type="button" class="bouton" value="Retour" id="int_rc_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_rc_Continuer" /><br />
		<input type="button" class="bouton" value="Synthèse" id="Int_rc_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_rc"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">
	
	</div-->
	<div id="Question_rc_255" data-options="handle:'#dragg_255'" align="center">
<div id="dragg_255" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/09
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_rc_1.php';?></div>
	<div id="Question_rc_256" data-options="handle:'#dragg_256'" align="center">
<div id="dragg_256" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/09
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_rc_2.php';?></div>
	<div id="Question_rc_257" data-options="handle:'#dragg_257'" align="center">
<div id="dragg_257" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/09
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rc_3.php';?></div>
	<div id="Question_rc_258" data-options="handle:'#dragg_258'" align="center">
<div id="dragg_258" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/09
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rc_4.php';?></div>
	<div id="Question_rc_259" data-options="handle:'#dragg_259'" align="center">
<div id="dragg_259" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/09
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rc_5.php';?></div>
	<div id="Question_rc_260" data-options="handle:'#dragg_260'" align="center">
<div id="dragg_260" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/09
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rc_6.php';?></div>
	<div id="Question_rc_261" data-options="handle:'#dragg_261'" align="center">
<div id="dragg_261" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/09
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rc_7.php';?></div>
	<div id="Question_rc_262" data-options="handle:'#dragg_262'" align="center">
<div id="dragg_262" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/09
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rc_8.php';?></div>
	<div id="Question_rc_263" data-options="handle:'#dragg_263'" align="center">
<div id="dragg_263" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/09
				<input type="button" style="width:150px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rc_9.php';?></div>


<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_rc" data-options="handle:'#dragg_rc'" align="center">
<div id="dragg_rc" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleRecette/Recettec/form/Interface_rc_Synthese.php';?></div>
<!--*******************************************************************************************************-->

<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_rc"><?php include 'cycleRecette/Recettec/sms/Message slide question terminer rc.php'?></div>

<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_rc"><?php include 'cycleRecette/Recettec/sms/messRetrc.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_rc"><?php include 'cycleRecette/Recettec/sms/Message terminer question rc.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_rc"><?php include 'cycleRecette/Recettec/sms/Message terminer synthese rc.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_rc"><?php include 'cycleRecette/Recettec/sms/Message slide rc Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_rc"><?php include 'cycleRecette/Recettec/sms/sms_empty/Mess_vide_synth_rc.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Percu_rc"><?php include 'cycleRecette/Recettec/sms/Message donnees perdues rc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rc"><?php include 'cycleRecette/Recettec/sms/Message annulation question rc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rc2"><?php include 'cycleRecette/Recettec/sms/Message_enregistre_question_rc2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rc3"><?php include 'cycleRecette/Recettec/sms/Message_enregistre_question_rc3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rc4"><?php include 'cycleRecette/Recettec/sms/Message_enregistre_question_rc4.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rc5"><?php include 'cycleRecette/Recettec/sms/Message_enregistre_question_rc5.php';?></div>
<!--*******************************************************************************************************-->


<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rc6"><?php include 'cycleRecette/Recettec/sms/Message_enregistre_question_rc6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rc7"><?php include 'cycleRecette/Recettec/sms/Message_enregistre_question_rc7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rc8"><?php include 'cycleRecette/Recettec/sms/Message_enregistre_question_rc8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rc9"><?php include 'cycleRecette/Recettec/sms/Message_enregistre_question_rc9.php';?></div>
<!--*******************************************************************************************************-->

<!--*******************************************************************************************************-->

<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_rc1"><?php include 'cycleRecette/Recettec/sms/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rc2"><?php include 'cycleRecette/Recettec/sms/sms_empty/Mess_quest_vide_rc2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rc3"><?php include 'cycleRecette/Recettec/sms/sms_empty/Mess_quest_vide_rc3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rc4"><?php include 'cycleRecette/Recettec/sms/sms_empty/Mess_quest_vide_rc4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rc5"><?php include 'cycleRecette/Recettec/sms/sms_empty/Mess_quest_vide_rc5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rc6"><?php include 'cycleRecette/Recettec/sms/sms_empty/Mess_quest_vide_rc6.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rc7"><?php include 'cycleRecette/Recettec/sms/sms_empty/Mess_quest_vide_rc7.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rc8"><?php include 'cycleRecette/Recettec/sms/sms_empty/Mess_quest_vide_rc8.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rc9"><?php include 'cycleRecette/Recettec/sms/sms_empty/Mess_quest_vide_rc9.php'; ?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_rc"><?php include 'cycleRecette/Recettec/sms/mess_vid_aud_rc.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************MESSAGE QUESTIONNAIRE NON REMPLI POUR SYNTHESE********************-->
<div id="mess_vide_obj_rc"><?php include 'cycleRecette/Recettec/sms/mess_vid_aud_rc.php'; ?></div>
<!--*******************************************************************************************************-->

</div>