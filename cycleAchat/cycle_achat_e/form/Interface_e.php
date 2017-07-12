<?php

include '../../../connexion.php';

$reponse=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=5');
$donnees=$reponse->fetch();
$conclusionIde=$donnees['CONCLUSION_COMMENTAIRE'];




$reponse=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=5');
$donnees=$reponse->fetch();
$nb=$donnees['nb'];

?>


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link href="cycleAchat/cycle_achat_e/css/div.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_e/css/div_e.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_e/css/class.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_e/css/div_fermer_quest_objectif_e.css" rel="stylesheet" type="text/css" />

<script>


$(function(){



	<?php
	//OBJ CYCLE DEJA VALIDER
	if($nb==1)
	{
		?>
		$('textarea').attr('disabled',true);
		$(':input[type=radio]').attr('disabled',true);
	    $('#Synthese_e_Terminer').attr('disabled',true);

		<?php
	}

	?>

	// Droit cycle by Tolotra
	// Page : RSCI -> Cycle achat
	// Tâche : Revue Contrôles Achats, numéro 1
	$.ajax({
		type: 'POST',
		url: 'droitCycle.php',
		data: {task_id: 1},
		success: function (e) {
			$("#Int_e_Continuer").attr('disabled', 0 === Number(e));
			$("#Int_e_Synthese").attr('disabled', 0 === Number(e));
		}
	});
	
	// Bouton retour menu achat
	$('#int_e_Retour').click(function(){
		$('#message_fermeture_e').show();
		$('#fancybox_e').show();
	});
	//Con$tinuer la question
	$('#Int_e_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_e").value;
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achat_e/php/aff_quest_fin_e.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==54){
					$('#message_Terminer_question_e').show();
				}
				else if(e==1){
					$('#Question_e_46').fadeIn(500);
				}
				else{
					quetion_e="#Question_e_"+e;
					$(quetion_e).fadeIn(500);
				}
				$('#dv_table_e').show();
				$('#lb_veuillez_aff_e').hide();
				$('#fancybox_e').show();
			}
		});
	});
	//la synthèse de e
	$('#Int_e_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_e").value;
		// se rediriger vers calcul score
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achat_e/php/select_score_e.php',
			data:{mission_id:mission_id},
			success:function(e){
			    $("#echo_score_e").html(e);
			}			
		});
		
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achat_e/php/cpt_e.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==9){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_c/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:5},
						success:function(e){
							eo=""+e+"";
							doc=eo.split('*');
							document.getElementById("txt_Synthese_e").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_e_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_e_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_e_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_e').show();
					$('#fancybox_e').show();
				}
				else{
					$('#fancybox_e').show();
					$('#mess_vide_obj_e').show();
				}
			}
		});
	});
});
function afficheReponseQuestace(imbId,imbIdCom){
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

<div id="int_e"><label class="lb_veuillez" id="lb_veuillez_aff_e"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_e" style="display:none;" />
	<div id="Interface_Question_e"><?php include '../../../cycleAchat/cycle_achat_e/load/load_quest_e.php'; ?></div>
	<div id="dv_table_e" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_e">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_e"><?php include '../../../cycleAchat/cycle_achat_e/load/load_rep_e.php'; ?></div>
	<div id="Int_Droite_e">
		<input type="button" class="bouton" value="Retour" id="int_e_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_e_Continuer" /><br />
		<input type="button" class="bouton" value="Synthèse" id="Int_e_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_e"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_e_46" data-options="handle:'#dragg_46'" align="center">
<div id="dragg_46" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/09
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_e_1.php';?></div>
	<div id="Question_e_47" data-options="handle:'#dragg_47'" align="center">
<div id="dragg_47" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/09
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:70px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_e_2.php';?></div>
	<div id="Question_e_48" data-options="handle:'#dragg_48'" align="center">
<div id="dragg_48" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/09
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_e_3.php';?></div>
	<div id="Question_e_49" data-options="handle:'#dragg_49'" align="center">
<div id="dragg_49" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/09
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:50px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_e_4.php';?></div>
	<div id="Question_e_50" data-options="handle:'#dragg_50'" align="center">
<div id="dragg_50" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/09
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:40px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_e_5.php';?></div>
	<div id="Question_e_51" data-options="handle:'#dragg_51'" align="center">
<div id="dragg_51" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/09
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:30px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_e_6.php';?></div>
	<div id="Question_e_52" data-options="handle:'#dragg_52'" align="center">
<div id="dragg_52" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/09
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:20px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_e_7.php';?></div>
	<div id="Question_e_53" data-options="handle:'#dragg_53'" align="center">
<div id="dragg_53" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/09
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:10px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_e_8.php';?></div>
	<div id="Question_e_54" data-options="handle:'#dragg_54'" align="center">
<div id="dragg_54" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/09
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<!--input type="button" style="width:30px;height:15px;background-color:#efefef" /-->
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_e_9.php';?></div>

<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_e" data-options="handle:'#dragg_e'" align="center">
<div id="dragg_e" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include '../../../cycleAchat/cycle_achat_e/form/Interface_e_Synthese.php';?></div>
<!--*******************************************************************************************************-->





<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_e"><?php include '../../../cycleAchat/cycle_achat_e/sms/Message slide question terminer e.php' ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_e"><?php include '../../../cycleAchat/cycle_achat_e/sms/messRete.php' ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_e"><?php include '../../../cycleAchat/cycle_achat_e/sms/Message terminer question e.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_e"><?php include '../../../cycleAchat/cycle_achat_e/sms/Message terminer synthese e.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_e"><?php include '../../../cycleAchat/cycle_achat_e/sms/Message slide e Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_e"><?php include '../../../cycleAchat/cycle_achat_e/sms/sms_empty/Mess_vide_synth_e.php'; ?></div>
<!--*******************************************************************************************************-->



<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_e"><?php include '../../../cycleAchat/cycle_achat_e/sms/Message donnees perdues e.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_e"><?php include '../../../cycleAchat/cycle_achat_e/sms/Message annulation question e.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_e2"><?php include '../../../cycleAchat/cycle_achat_e/sms/Message_enregistre_question_e2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_e3"><?php include '../../../cycleAchat/cycle_achat_e/sms/Message_enregistre_question_e3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_e4"><?php include '../../../cycleAchat/cycle_achat_e/sms/Message_enregistre_question_e4.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_e5"><?php include '../../../cycleAchat/cycle_achat_e/sms/Message_enregistre_question_e5.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_e6"><?php include '../../../cycleAchat/cycle_achat_e/sms/Message_enregistre_question_e6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_e7"><?php include '../../../cycleAchat/cycle_achat_e/sms/Message_enregistre_question_e7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_e8"><?php include '../../../cycleAchat/cycle_achat_e/sms/Message_enregistre_question_e8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_e9"><?php include '../../../cycleAchat/cycle_achat_e/sms/Message_enregistre_question_e9.php';?></div>
<!--*******************************************************************************************************-->


<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_e1"><?php include '../../../cycleAchat/cycle_achat_e/sms/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_e2"><?php include '../../../cycleAchat/cycle_achat_e/sms/sms_empty/Mess_quest_vide_e2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_e3"><?php include '../../../cycleAchat/cycle_achat_e/sms/sms_empty/Mess_quest_vide_e3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_e4"><?php include '../../../cycleAchat/cycle_achat_e/sms/sms_empty/Mess_quest_vide_e4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_e5"><?php include '../../../cycleAchat/cycle_achat_e/sms/sms_empty/Mess_quest_vide_e5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_e6"><?php include '../../../cycleAchat/cycle_achat_e/sms/sms_empty/Mess_quest_vide_e6.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_e7"><?php include '../../../cycleAchat/cycle_achat_e/sms/sms_empty/Mess_quest_vide_e7.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_e8"><?php include '../../../cycleAchat/cycle_achat_e/sms/sms_empty/Mess_quest_vide_e8.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_e9"><?php include '../../../cycleAchat/cycle_achat_e/sms/sms_empty/Mess_quest_vide_e9.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_e"><?php include '../../../cycleAchat/cycle_achat_e/sms/mess_vid_aud_e.php'; ?></div>
<!--*******************************************************************************************************-->
</div>

