<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';



$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=30 AND MISSION_ID='.$mission_id;
//print ($sql);
$verif=$bdd->query($sql);
$res_=$verif->fetch();
$nbRES=$res_["nb"];

?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/cssSousmenueCycle.css" rel="stylesheet" type="text/css" />
<script language="javascript">

// Droit cycle by Tolotra
// Page : RSCI -> Cycle ventes
// Tâche : Revue Cotrôles ventes, numéro 37
$.ajax({
    type: 'POST',
    url: 'droitCycle.php',
    data: {task_id: 37},
    success: function (e) {
        var result = 0 === Number(e);
        $("#Int_vf_Continuer").attr('disabled', result);
        $("#Int_vf_Synthese").attr('disabled', result);
    }
});

var quetion_vf;
$(function()
{

	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($nbRES==1)
	{

	?>
	$('#contvf textarea').attr('disabled',true);
	$('#contvf :input[type=radio]').attr('disabled',true);
	$('#contvf #Synthese_vf_Terminer').attr('disabled',true);
	<?php
	}
	//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	?>
	// Bouton retour menu achat
	$('#int_vf_Retour').click(function(){
		$('#message_fermeture_vf').show();
		$('#fancybox_vf').show();
	});
	//Con$tinuer la question
	$('#Int_vf_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_vf").value;
		$.ajax({
			type:'POST',
			url:'cycleVente/Ventef/php/aff_quest_fin_vf.php',
			data:{mission_id:mission_id},
			success:function(e){
				
					quetion_vf="#Question_vf_"+e;
					$(quetion_vf).fadeIn(500);
					vf=e;
					$.ajax({
						type:'POST',
						url:'cycleVente/Ventef/php/getRepContinuer.php',
						data:{mission_id:mission_id, questId:e, cycleId:30},
						success:function(e1){
							eo=""+e1+"";
							doc=eo.split(',');
							cpt=1;
							for(i=393; i<404; i++){ 
								if(i==vf){
									vfId="vf_"+cpt;
									vfIdCom="vf"+cpt;
									afficheReponseQuest(vfId,vfIdCom);
									break;
								}
								cpt++;
							}
							
						}
					});
				// }
				$('#dv_table_vf').show();
				$('#lb_veuillez_aff_vf').hide();
				$('#fancybox_vf').show();
			}
		});
	});
	//la synthèse de vf
	$('#Int_vf_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_vf").value;
		
		// se rediriger vers calcul score
		$.ajax({
			type:'POST',
			url:'cycleVente/Ventef/php/select_score_vf.php',
			data:{mission_id:mission_id},
			success:function(e){
			    $("#echo_score_vf").html(e);
			}			
		});
		
		$.ajax({
			type:'POST',
			url:'cycleVente/Ventef/php/cpt_vf.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==12){
					$.ajax({
						type:'POST',
						url:'cycleVente/Ventef/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:30},
						success:function(e){
							eo=""+e+"";
							doc=eo.split('*');
							document.getElementById("rd_Synthese_vf_Faible").checked=false;
							document.getElementById("rd_Synthese_vf_Moyen").checked=false;
							document.getElementById("rd_Synthese_vf_Eleve").checked=false;
							document.getElementById("txt_Synthese_vf").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_vf_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_vf_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_vf_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_vf').show();
					$('#fancybox_vf').show();
				}
				else{
					$('#fancybox_vf').show();
					$('#mess_vide_obj_vf').show();
				}
			}
		});
	});
});
function afficheReponseQuest(vfId,vfIdCom){
	document.getElementById("rad_Question_Oui_"+vfId).checked=false;
	document.getElementById("rad_Question_NA_"+vfId).checked=false;
	document.getElementById("rad_Question_Non_"+vfId).checked=false;
	if(doc[0]==0){
		document.getElementById("commentaire_Question_"+vfIdCom).value="";
	}
	else
		document.getElementById("commentaire_Question_"+vfIdCom).value=doc[0];
	if(doc[1]=='OUI'){
		document.getElementById("rad_Question_Oui_"+vfId).checked=true;
	}
	else if(doc[1]=='N/A'){
		document.getElementById("rad_Question_NA_"+vfId).checked=true;
	}
	else if(doc[1]=='NON'){
		document.getElementById("rad_Question_Non_"+vfId).checked=true;
	}
	document.getElementById('t_vf_1').style.backgroundColor='grey';
}
</script>

<div id="int_vf">

		


<label class="lb_veuillez" id="lb_veuillez_aff_vf"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_vf" style="display:none;" />
	<div id="Interface_Question_vf"><?php include 'cycleVente/Ventef/load/load_quest_vf.php'; ?></div>
	<div id="dv_table_vf" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_vf">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_vf"></div>
	<div id="Int_Droite_vf">
		<input type="button" class="bouton" value="Retour" id="int_vf_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_vf_Continuer" /><br />
		<input type="button" class="bouton" value="Synthèse" id="Int_vf_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_vf"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">
	
	</div-->
	<div id="Question_vf_393" data-options="handle:'#dragg_393'" align="center">
<div id="dragg_393" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/12
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_vf_1.php';?></div>
	<div id="Question_vf_394" data-options="handle:'#dragg_394'" align="center">
<div id="dragg_394" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/12
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_vf_2.php';?></div>
	<div id="Question_vf_395" data-options="handle:'#dragg_395'" align="center">
<div id="dragg_395" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/12
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vf_3.php';?></div>
	<div id="Question_vf_396" data-options="handle:'#dragg_396'" align="center">
<div id="dragg_396" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/12
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vf_4.php';?></div>
	<div id="Question_vf_397" data-options="handle:'#dragg_397'" align="center">
<div id="dragg_397" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/12
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vf_5.php';?></div>
	<div id="Question_vf_398" data-options="handle:'#dragg_398'" align="center">
<div id="dragg_398" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/12
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vf_6.php';?></div>
	<div id="Question_vf_399" data-options="handle:'#dragg_399'" align="center">
<div id="dragg_399" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/12
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vf_7.php';?></div>
	<div id="Question_vf_400" data-options="handle:'#dragg_400'" align="center">
<div id="dragg_400" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/12
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vf_8.php';?></div>
	<div id="Question_vf_401" data-options="handle:'#dragg_401'" align="center">
<div id="dragg_401" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/12
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vf_9.php';?></div>
	<div id="Question_vf_402" data-options="handle:'#dragg_402'" align="center">
<div id="dragg_402" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/12
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vf_10.php';?></div>
	<div id="Question_vf_403" data-options="handle:'#dragg_403'" align="center">
<div id="dragg_403" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/12
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vf_11.php';?></div>
	<div id="Question_vf_404" data-options="handle:'#dragg_404'" align="center">
<div id="dragg_404" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/12
				<input type="button" style="width:150px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vf_12.php';?></div>


<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_vf" data-options="handle:'#dragg_vf'" align="center">
<div id="dragg_vf" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleVente/Ventef/form/Interface_vf_Synthese.php';?></div>
<!--*******************************************************************************************************-->

<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_vf"><?php include 'cycleVente/Ventef/sms/Message slide question terminer vf.php'?></div>

<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_vf"><?php include 'cycleVente/Ventef/sms/messRetvf.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_vf"><?php include 'cycleVente/Ventef/sms/Message terminer question vf.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_vf"><?php include 'cycleVente/Ventef/sms/Message terminer synthese vf.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_vf"><?php include 'cycleVente/Ventef/sms/Message slide vf Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_vf"><?php include 'cycleVente/Ventef/sms/sms_empty/Mess_vide_synth_vf.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_vf"><?php include 'cycleVente/Ventef/sms/Message donnees perdues vf.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vf"><?php include 'cycleVente/Ventef/sms/Message annulation question vf.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vf2"><?php include 'cycleVente/Ventef/sms/Message_enregistre_question_vf2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vf3"><?php include 'cycleVente/Ventef/sms/Message_enregistre_question_vf3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vf4"><?php include 'cycleVente/Ventef/sms/Message_enregistre_question_vf4.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vf5"><?php include 'cycleVente/Ventef/sms/Message_enregistre_question_vf5.php';?></div>
<!--*******************************************************************************************************-->


<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vf6"><?php include 'cycleVente/Ventef/sms/Message_enregistre_question_vf6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vf7"><?php include 'cycleVente/Ventef/sms/Message_enregistre_question_vf7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vf8"><?php include 'cycleVente/Ventef/sms/Message_enregistre_question_vf8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vf9"><?php include 'cycleVente/Ventef/sms/Message_enregistre_question_vf9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vf10"><?php include 'cycleVente/Ventef/sms/Message_enregistre_question_vf10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vf11"><?php include 'cycleVente/Ventef/sms/Message_enregistre_question_vf11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vf12"><?php include 'cycleVente/Ventef/sms/Message_enregistre_question_vf12.php';?></div>
<!--*******************************************************************************************************-->

<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_vf1"><?php include 'cycleVente/Ventef/sms/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vf2"><?php include 'cycleVente/Ventef/sms/sms_empty/Mess_quest_vide_vf2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vf3"><?php include 'cycleVente/Ventef/sms/sms_empty/Mess_quest_vide_vf3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vf4"><?php include 'cycleVente/Ventef/sms/sms_empty/Mess_quest_vide_vf4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vf5"><?php include 'cycleVente/Ventef/sms/sms_empty/Mess_quest_vide_vf5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vf6"><?php include 'cycleVente/Ventef/sms/sms_empty/Mess_quest_vide_vf6.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vf7"><?php include 'cycleVente/Ventef/sms/sms_empty/Mess_quest_vide_vf7.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vf8"><?php include 'cycleVente/Ventef/sms/sms_empty/Mess_quest_vide_vf8.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vf9"><?php include 'cycleVente/Ventef/sms/sms_empty/Mess_quest_vide_vf9.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vf10"><?php include 'cycleVente/Ventef/sms/sms_empty/Mess_quest_vide_vf10.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vf11"><?php include 'cycleVente/Ventef/sms/sms_empty/Mess_quest_vide_vf11.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vf12"><?php include 'cycleVente/Ventef/sms/sms_empty/Mess_quest_vide_vf12.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_vf"><?php include 'cycleVente/Ventef/sms/mess_vid_aud_vf.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************MESSAGE QUESTIONNAIRE NON REMPLI POUR SYNTHESE********************-->
<div id="mess_vide_obj_vf"><?php include 'cycleVente/Ventef/sms/mess_vid_aud_vf.php'; ?></div>
<!--*******************************************************************************************************-->

</div>