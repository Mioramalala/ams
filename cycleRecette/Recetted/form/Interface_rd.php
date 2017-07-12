<?php
include $_SERVER["DOCUMENT_ROOT"]."/connexion.php";
@session_start();
$mission_id=$_SESSION['idMission'];

$verif_=$bdd->query("SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID='20' AND MISSION_ID='$mission_id'");

$resultat=$verif_->fetch();
$validRecetteD=$resultat['nb'];



?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script>
// Droit cycle by Tolotra
// Page : RSCI -> Cycle Trésorerie
// Tâche : Revue Cotrôles Trésorerie, numéro 26
$.ajax({
    type: 'POST',
    url: 'droitCycle.php',
    data: {task_id: 26},
    success: function (e) {
        var result = 0 === Number(e);
        $("#Int_rd_Synthese").attr('disabled', result);
        $("#Int_rd_Continuer").attr('disabled', result);
    }
});

$(function()
{
	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($validRecetteD==1)
	{

	?>
	$('#contrd textarea').attr('disabled',true);
	$('#contrd #Synthese_rd_Terminer').attr('disabled',true);
	$('#contrd:input[type=radio]').attr('disabled',true); // tinay editer
	<?php
	}
	//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	?>

	// Bouton retour menu achat
	$('#int_rd_Retour').click(function(){
		$('#message_fermeture_rd').show();
		$('#fancybox_rd').show();
	});
	//Con$tinuer la question
	$('#Int_rd_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_rd").value;
		$.ajax({
			type:'POST',
			url:'cycleRecette/Recetted/php/aff_quest_fin_rd.php',
			data:{mission_id:mission_id},
			success:function(e){
				
					//alert(e);
					quetion_rd="#Question_rd_"+e;
					$(quetion_rd).fadeIn(500);
					rd=e;
					$.ajax({
						type:'POST',
						url:'cycleRecette/Recetted/php/getRepContinuer.php',
						data:{mission_id:mission_id, questId:e, cycleId:20},
						success:function(e1){
							eo=""+e1+"";
							doc=eo.split(',');
							cpt=1;
							for(i=264; i<272; i++){ 
								if(i==rd){
									rdId="rd_"+cpt;
									rdIdCom="rd"+cpt;
									afficheReponseQuest(rdId,rdIdCom);
									break;
								}
								cpt++;
							}
							
						}
					});
				// }
				$('#dv_table_rd').show();
				$('#lb_veuillez_aff_rd').hide();
				$('#fancybox_rd').show();
			}
		});
	});
	//la synthèse de rd
	$('#Int_rd_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_rd").value;
		
		// se rediriger vers calcul score
		$.ajax({
			type:'POST',
			url:'cycleRecette/Recetted/php/select_score_rd.php',
			data:{mission_id:mission_id},
			success:function(e){
			    $("#echo_score_rd").html(e);
			}			
		});
		
		$.ajax({
			type:'POST',
			url:'cycleRecette/Recetted/php/cpt_rd.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==9){
					$.ajax({
						type:'POST',
						url:'cycleRecette/Recetted/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:20},
						success:function(e){
							eo=""+e+"";
							doc=eo.split('*');
							document.getElementById("rd_Synthese_rd_Faible").checked=false;
							document.getElementById("rd_Synthese_rd_Moyen").checked=false;
							document.getElementById("rd_Synthese_rd_Eleve").checked=false;
							document.getElementById("txt_Synthese_rd").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_rd_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_rd_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_rd_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_rd').show();
					$('#fancybox_rd').show();
				}
				else{
					$('#fancybox_rd').show();
					$('#mess_vide_obj_rd').show();
				}
			}
		});
	});
});
function afficheReponseQuest(rdId,rdIdCom){
	document.getElementById("rad_Question_Oui_"+rdId).checked=false;
	document.getElementById("rad_Question_NA_"+rdId).checked=false;
	document.getElementById("rad_Question_Non_"+rdId).checked=false;
	if(doc[0]==0){
		document.getElementById("commentaire_Question_"+rdIdCom).value="";
	}
	else
		document.getElementById("commentaire_Question_"+rdIdCom).value=doc[0];
	if(doc[1]=='OUI'){
		document.getElementById("rad_Question_Oui_"+rdId).checked=true;
	}
	else if(doc[1]=='N/A'){
		document.getElementById("rad_Question_NA_"+rdId).checked=true;
	}
	else if(doc[1]=='NON'){
		document.getElementById("rad_Question_Non_"+rdId).checked=true;
	}
}
</script>

<div id="int_rd"><label class="lb_veuillez" id="lb_veuillez_aff_rd"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_rd" style="display:none;" />
	<div id="Interface_Question_rd"><?php include 'cycleRecette/Recetted/load/load_quest_rd.php'; ?></div>
	<div id="dv_table_rd" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_rd">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_rd"></div>
	<div id="Int_Droite_rd">
		<input type="button" class="bouton" value="Retour" id="int_rd_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_rd_Continuer" /><br />
		<input type="button" class="bouton" value="Synthèse" id="Int_rd_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_rd"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">
	
	</div-->
	<div id="Question_rd_264" data-options="handle:'#dragg_264'" align="center">
<div id="dragg_264" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/09
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_rd_1.php';?></div>
	<div id="Question_rd_265" data-options="handle:'#dragg_265'" align="center">
<div id="dragg_265" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/09
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_rd_2.php';?></div>
	<div id="Question_rd_266" data-options="handle:'#dragg_266'" align="center">
<div id="dragg_266" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/09
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rd_3.php';?></div>
	<div id="Question_rd_267" data-options="handle:'#dragg_267'" align="center">
<div id="dragg_267" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/09
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rd_4.php';?></div>
	<div id="Question_rd_268" data-options="handle:'#dragg_268'" align="center">
<div id="dragg_268" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/09
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rd_5.php';?></div>
	<div id="Question_rd_269" data-options="handle:'#dragg_269'" align="center">
<div id="dragg_269" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/09
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rd_6.php';?></div>
	<div id="Question_rd_270" data-options="handle:'#dragg_270'" align="center">
<div id="dragg_270" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/09
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rd_7.php';?></div>
	<div id="Question_rd_271" data-options="handle:'#dragg_271'" align="center">
<div id="dragg_271" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/09
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rd_8.php';?></div>
	<div id="Question_rd_272" data-options="handle:'#dragg_272'" align="center">
<div id="dragg_272" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/09
				<input type="button" style="width:150px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rd_9.php';?></div>


<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_rd" data-options="handle:'#dragg_rd'" align="center">
<div id="dragg_rd" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleRecette/Recetted/form/Interface_rd_Synthese.php';?></div>
<!--*******************************************************************************************************-->

<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_rd"><?php include 'cycleRecette/Recetted/sms/Message slide question terminer rd.php'?></div>

<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_rd"><?php include 'cycleRecette/Recetted/sms/messRetrd.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_rd"><?php include 'cycleRecette/Recetted/sms/Message terminer question rd.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_rd"><?php include 'cycleRecette/Recetted/sms/Message terminer synthese rd.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_rd"><?php include 'cycleRecette/Recetted/sms/Message slide rd Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_rd"><?php include 'cycleRecette/Recetted/sms/sms_empty/Mess_vide_synth_rd.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_rd"><?php include 'cycleRecette/Recetted/sms/Message donnees perdues rd.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rd"><?php include 'cycleRecette/Recetted/sms/Message annulation question rd.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rd2"><?php include 'cycleRecette/Recetted/sms/Message_enregistre_question_rd2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rd3"><?php include 'cycleRecette/Recetted/sms/Message_enregistre_question_rd3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rd4"><?php include 'cycleRecette/Recetted/sms/Message_enregistre_question_rd4.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rd5"><?php include 'cycleRecette/Recetted/sms/Message_enregistre_question_rd5.php';?></div>
<!--*******************************************************************************************************-->


<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rd6"><?php include 'cycleRecette/Recetted/sms/Message_enregistre_question_rd6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rd7"><?php include 'cycleRecette/Recetted/sms/Message_enregistre_question_rd7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rd8"><?php include 'cycleRecette/Recetted/sms/Message_enregistre_question_rd8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rd9"><?php include 'cycleRecette/Recetted/sms/Message_enregistre_question_rd9.php';?></div>
<!--*******************************************************************************************************-->

<!--*******************************************************************************************************-->

<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_rd1"><?php include 'cycleRecette/Recetted/sms/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rd2"><?php include 'cycleRecette/Recetted/sms/sms_empty/Mess_quest_vide_rd2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rd3"><?php include 'cycleRecette/Recetted/sms/sms_empty/Mess_quest_vide_rd3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rd4"><?php include 'cycleRecette/Recetted/sms/sms_empty/Mess_quest_vide_rd4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rd5"><?php include 'cycleRecette/Recetted/sms/sms_empty/Mess_quest_vide_rd5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rd6"><?php include 'cycleRecette/Recetted/sms/sms_empty/Mess_quest_vide_rd6.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rd7"><?php include 'cycleRecette/Recetted/sms/sms_empty/Mess_quest_vide_rd7.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rd8"><?php include 'cycleRecette/Recetted/sms/sms_empty/Mess_quest_vide_rd8.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rd9"><?php include 'cycleRecette/Recetted/sms/sms_empty/Mess_quest_vide_rd9.php'; ?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_rd"><?php include 'cycleRecette/Recetted/sms/mess_vid_aud_rd.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************MESSAGE QUESTIONNAIRE NON REMPLI POUR SYNTHESE********************-->
<div id="mess_vide_obj_rd"><?php include 'cycleRecette/Recetted/sms/mess_vid_aud_rd.php'; ?></div>
<!--*******************************************************************************************************-->

</div>