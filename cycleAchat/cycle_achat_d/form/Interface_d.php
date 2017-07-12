<?php

include '../../../connexion.php';

$reponse=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=4');
$donnees=$reponse->fetch();
$nb=$donnees['nb'];



?>


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link href="cycleAchat/cycle_achat_d/css/div.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_d/css/div_d.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_d/css/class.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_d/css/div_fermer_quest_objectif_d.css" rel="stylesheet" type="text/css" />

<script>


$(function(){
var nb=parseInt(<?php echo $nb;?>);
	if(nb!=0){
		$('textarea').attr('disabled',true);
		$(':input[type=radio]').attr('disabled',true);		$('#Synthese_d_Terminer').attr('disabled',true);

	}
	// Droit cycle by Tolotra
	// Page : RSCI -> Cycle achat
	// Tâche : Revue Contrôles Achats, numéro 1
	$.ajax({
		type: 'POST',
		url: 'droitCycle.php',
		data: {task_id: 1},
		success: function (e) {
			$("#Int_d_Continuer").attr('disabled', 0 === Number(e));
			$("#Int_d_Synthese").attr('disabled', 0 === Number(e));

		}
	});
	
	// Bouton retour menu achat
	$('#int_d_Retour').click(function(){
		$('#message_fermeture_d').show();
		$('#fancybox_d').show();
	});
	//Con$tinuer la question
	$('#Int_d_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_d").value;
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achat_d/php/aff_quest_fin_d.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==45){
					quetion_d="#Question_d_"+e;
					$(quetion_d).fadeIn(500);
				}
				else if(e==1){
					$('#Question_d_34').fadeIn(500);
				}
				else{
					quetion_d="#Question_d_"+e;
					$(quetion_d).fadeIn(500);
				}
				$('#dv_table_d').show();
				$('#lb_veuillez_aff_d').hide();
				$('#fancybox_d').show();
			}
		});
	});
	//la synthèse de d
	$('#Int_d_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_d").value;
		
		// se rediriger vers calcul score
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achat_d/php/select_score_d.php',
			data:{mission_id:mission_id},
			success:function(e){
			    $("#echo_score_d").html(e);
			}			
		});
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achat_d/php/cpt_d.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==12){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_c/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:4},
						success:function(e){
							eo=""+e+"";
							doc=eo.split('*');
							document.getElementById("txt_Synthese_d").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_d_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_d_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_d_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_d').show();
					$('#fancybox_d').show();
				}
				else{
					$('#fancybox_d').show();
					$('#mess_vide_obj_d').show();
				}
			}
		});
	});
});
function afficheReponseQuestacd(imbId,imbIdCom){
	document.getElementById("rad_Question_Oui_"+imbId).checked=false;
	document.getElementById("rad_Question_NA_"+imbId).checked=false;
	document.getElementById("rad_Question_Non_"+imbId).checked=false;
	if(doc[0]==0){
		document.getElementById("commentaire_Question_"+imbIdCom).value="";
	}
	else
		document.getElementById("commentaire_Question_"+imbIdCom).value=doc[0];
	if(doc[1]=='OUI'){
		document.getElementById("rad_Question_Oui_"+imbId).checked=true;
	}
	else if(doc[1]=='N/A'){
		document.getElementById("rad_Question_NA_"+imbId).checked=true;
	}
	else if(doc[1]=='NON'){
		document.getElementById("rad_Question_Non_"+imbId).checked=true;
	}
}
</script>

<div id="int_d"><label class="lb_veuillez" id="lb_veuillez_aff_d"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_d" style="display:none;" />
	<div id="Interface_Question_d"><?php include '../../../cycleAchat/cycle_achat_d/load/load_quest_d.php'; ?></div>
	<div id="dv_table_d" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_d">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_d"><?php include '../../../cycleAchat/cycle_achat_d/load/load_rep_d.php'; ?></div>
	<div id="Int_Droite_d">
		<input type="button" class="bouton" value="Retour" id="int_d_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_d_Continuer" /><br />
		<input type="button" class="bouton" value="Synthèse" id="Int_d_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_d"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_d_34" data-options="handle:'#dragg_34'" align="center">
<div id="dragg_34" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/12
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:110px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_d_1.php';?></div>
	<div id="Question_d_35" data-options="handle:'#dragg_35'" align="center">
<div id="dragg_35" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/12
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:100px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_d_2.php';?></div>
	<div id="Question_d_36" data-options="handle:'#dragg_36'" align="center">
<div id="dragg_36" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/12
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:90px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_d_3.php';?></div>
	<div id="Question_d_37" data-options="handle:'#dragg_37'" align="center">
<div id="dragg_37" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/12
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_d_4.php';?></div>
	<div id="Question_d_38" data-options="handle:'#dragg_38'" align="center">
<div id="dragg_38" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/12
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:70px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_d_5.php';?></div>
	<div id="Question_d_39" data-options="handle:'#dragg_39'" align="center">
<div id="dragg_39" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/12
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_d_6.php';?></div>
	<div id="Question_d_40" data-options="handle:'#dragg_40'" align="center">
<div id="dragg_40" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/12
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:50px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_d_7.php';?></div>
	<div id="Question_d_41" data-options="handle:'#dragg_41'" align="center">
<div id="dragg_41" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/12
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:40px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_d_8.php';?></div>
	<div id="Question_d_42" data-options="handle:'#dragg_42'" align="center">
<div id="dragg_42" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/12
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:30px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_d_9.php';?></div>
	<div id="Question_d_43" data-options="handle:'#dragg_43'" align="center">
<div id="dragg_43" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/12
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:20px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_d_10.php';?></div>
	<div id="Question_d_44" data-options="handle:'#dragg_44'" align="center">
<div id="dragg_44" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/12
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:10px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_d_11.php';?></div>
	<div id="Question_d_45" data-options="handle:'#dragg_45'" align="center">
<div id="dragg_45" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/12
				<input type="button" style="width:120px;height:15px;background-color:#ccc" />
				<!--input type="button" style="width:10px;height:15px;background-color:#efefef" /-->
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_d_12.php';?></div>

<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_d" data-options="handle:'#dragg_d'" align="center">
<div id="dragg_d" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include '../../../cycleAchat/cycle_achat_d/form/Interface_d_Synthese.php';?></div>
<!--*******************************************************************************************************-->





<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_d"><?php include '../../../cycleAchat/cycle_achat_d/sms/Message slide question terminer d.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_d"><?php include '../../../cycleAchat/cycle_achat_d/sms/messRetd.php';?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_d"><?php include '../../../cycleAchat/cycle_achat_d/sms/Message terminer question d.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_d"><?php include '../../../cycleAchat/cycle_achat_d/sms/Message terminer synthese d.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_d"><?php include '../../../cycleAchat/cycle_achat_d/sms/Message slide d Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_d"><?php include '../../../cycleAchat/cycle_achat_d/sms/sms_empty/Mess_vide_synth_d.php'; ?></div>
<!--*******************************************************************************************************-->



<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_d"><?php include '../../../cycleAchat/cycle_achat_d/sms/Message donnees perdues d.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_d"><?php include '../../../cycleAchat/cycle_achat_d/sms/Message annulation question d.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_d2"><?php include '../../../cycleAchat/cycle_achat_d/sms/Message_enregistre_question_d2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_d3"><?php include '../../../cycleAchat/cycle_achat_d/sms/Message_enregistre_question_d3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_d4"><?php include '../../../cycleAchat/cycle_achat_d/sms/Message_enregistre_question_d4.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_d5"><?php include '../../../cycleAchat/cycle_achat_d/sms/Message_enregistre_question_d5.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_d6"><?php include '../../../cycleAchat/cycle_achat_d/sms/Message_enregistre_question_d6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_d7"><?php include '../../../cycleAchat/cycle_achat_d/sms/Message_enregistre_question_d7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_d8"><?php include '../../../cycleAchat/cycle_achat_d/sms/Message_enregistre_question_d8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_d9"><?php include '../../../cycleAchat/cycle_achat_d/sms/Message_enregistre_question_d9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_d10"><?php include '../../../cycleAchat/cycle_achat_d/sms/Message_enregistre_question_d10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_d11"><?php include '../../../cycleAchat/cycle_achat_d/sms/Message_enregistre_question_d11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_d12"><?php include '../../../cycleAchat/cycle_achat_d/sms/Message_enregistre_question_d12.php';?></div>
<!--*******************************************************************************************************-->


<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_d1"><?php include '../../../cycleAchat/cycle_achat_d/sms/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_d2"><?php include '../../../cycleAchat/cycle_achat_d/sms/sms_empty/Mess_quest_vide_d2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_d3"><?php include '../../../cycleAchat/cycle_achat_d/sms/sms_empty/Mess_quest_vide_d3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_d4"><?php include '../../../cycleAchat/cycle_achat_d/sms/sms_empty/Mess_quest_vide_d4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_d5"><?php include '../../../cycleAchat/cycle_achat_d/sms/sms_empty/Mess_quest_vide_d5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_d6"><?php include '../../../cycleAchat/cycle_achat_d/sms/sms_empty/Mess_quest_vide_d6.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_d7"><?php include '../../../cycleAchat/cycle_achat_d/sms/sms_empty/Mess_quest_vide_d7.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_d8"><?php include '../../../cycleAchat/cycle_achat_d/sms/sms_empty/Mess_quest_vide_d8.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_d9"><?php include '../../../cycleAchat/cycle_achat_d/sms/sms_empty/Mess_quest_vide_d9.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_d10"><?php include '../../../cycleAchat/cycle_achat_d/sms/sms_empty/Mess_quest_vide_d10.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_d11"><?php include '../../../cycleAchat/cycle_achat_d/sms/sms_empty/Mess_quest_vide_d11.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_d12"><?php include '../../../cycleAchat/cycle_achat_d/sms/sms_empty/Mess_quest_vide_d12.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_d"><?php include '../../../cycleAchat/cycle_achat_d/sms/mess_vid_aud_d.php'; ?></div>
<!--*******************************************************************************************************-->
</div>

