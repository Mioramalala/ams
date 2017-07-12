<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';



$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=24 AND MISSION_ID='.$mission_id;
//print ($sql);
$verif=$bdd->query($sql);
$res_=$verif->fetch();
$validDepenseD=$res_["nb"];

?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script language="javascript">
var StDDID="";
// Droit cycle by Tolotra
// Page : RSCI -> Cycle Trésorerie
// Tâche : Revue Cotrôles Trésorerie, numéro 26
$.ajax({
    type: 'POST',
    url: 'droitCycle.php',
    data: {task_id: 26},
    success: function (e) {
        var result = 0 === Number(e);
        $("#Int_dd_Continuer").attr('disabled', result);
        $("#Int_dd_Synthese").attr('disabled', result);
    }
});
$(function()
{
	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($validDepenseD==1)
	{

	?>
	$('#contdd textarea').attr('disabled',true);
	$('#contdd :input[type=radio]').attr('disabled',true);
	$('#contdd #Synthese_dd_Terminer').attr('disabled',true);
	<?php
	}
	//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	?>


	// Bouton retour menu achat
	$('#int_dd_Retour').click(function(){
		$('#message_fermeture_dd').show();
		$('#fancybox_dd').show();
	});
	//Con$tinuer la question
	$('#Int_dd_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_dd").value;
		$.ajax({
			type:'POST',
			url:'cycleDepense/Depensed/php/aff_quest_fin_dd.php',
			data:{mission_id:mission_id},
			success:function(e){
				    StDDID=e;
					quetion_dd="#Question_dd_"+e;
					$(quetion_dd).fadeIn(500);
					dd=e;
					$.ajax({
						type:'POST',
						url:'cycleDepense/Depensed/php/getRepContinuer.php',
						data:{mission_id:mission_id, questId:e, cycleId:24},
						success:function(e1){
							eo=""+e1+"";
							doc=eo.split(',');
							cpt=1;
							for(i=304; i<311; i++){ 
								if(i==dd){
									ddId="dd_"+cpt;
									ddIdCom="dd"+cpt;
									afficheReponseQuest(ddId,ddIdCom);
									break;
								}
								cpt++;
							}
							
						}
					});
				// }
				$('#dv_table_dd').show();
				$('#lb_veuillez_aff_dd').hide();
				$('#fancybox_dd').show();
			}
		});
	});
	//la synthèse de dd
	$('#Int_dd_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_dd").value;
		
		// se rediriger vers calcul score
		$.ajax({
			type:'POST',
			url:'cycleDepense/Depensed/php/select_score_dd.php',
			data:{mission_id:mission_id},
			success:function(e){
			    $("#echo_score_dd").html(e);
			}			
		});
		
		$.ajax({
			type:'POST',
			url:'cycleDepense/Depensed/php/cpt_dd.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==8){
					$.ajax({
						type:'POST',
						url:'cycleDepense/Depensed/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:24},
						success:function(e){
							eo=""+e+"";
							doc=eo.split('*');
							document.getElementById("rd_Synthese_dd_Faible").checked=false;
							document.getElementById("rd_Synthese_dd_Moyen").checked=false;
							document.getElementById("rd_Synthese_dd_Eleve").checked=false;
							document.getElementById("txt_Synthese_dd").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_dd_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_dd_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_dd_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_dd').show();
					$('#fancybox_dd').show();
				}
				else{
					$('#fancybox_dd').show();
					$('#mess_vide_obj_dd').show();
				}
			}
		});
	});
});
function afficheReponseQuest(ddId,ddIdCom){
	document.getElementById("rad_Question_Oui_"+ddId).checked=false;
	document.getElementById("rad_Question_NA_"+ddId).checked=false;
	document.getElementById("rad_Question_Non_"+ddId).checked=false;
	if(doc[0]==0){
		document.getElementById("commentaire_Question_"+ddIdCom).value="";
	}
	else
		document.getElementById("commentaire_Question_"+ddIdCom).value=doc[0];
	if(doc[1]=='OUI'){
		document.getElementById("rad_Question_Oui_"+ddId).checked=true;
	}
	else if(doc[1]=='N/A'){
		document.getElementById("rad_Question_NA_"+ddId).checked=true;
	}
	else if(doc[1]=='NON'){
		document.getElementById("rad_Question_Non_"+ddId).checked=true;
	}
}
</script>

<div id="int_dd"><label class="lb_veuillez" id="lb_veuillez_aff_dd"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_dd" style="display:none;" />
	<div id="Interface_Question_dd"><?php include 'cycleDepense/Depensed/load/load_quest_dd.php'; ?></div>
	<div id="dv_table_dd" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_dd">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_dd"></div>
	<div id="Int_Droite_dd">
		<input type="button" class="bouton" value="Retour" id="int_dd_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_dd_Continuer" /><br />
		<input type="button" class="bouton" value="Synthèse" id="Int_dd_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_dd"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_dd_304" data-options="handle:'#dragg_304'" align="center">
<div id="dragg_304" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/08
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_dd_1.php';?></div>
	<div id="Question_dd_305" data-options="handle:'#dragg_305'" align="center">
<div id="dragg_305" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/08
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_dd_2.php';?></div>
	<div id="Question_dd_306" data-options="handle:'#dragg_306'" align="center">
<div id="dragg_306" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/08
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dd_3.php';?></div>
	<div id="Question_dd_307" data-options="handle:'#dragg_307'" align="center">
<div id="dragg_307" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/08
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dd_4.php';?></div>
	<div id="Question_dd_308" data-options="handle:'#dragg_308'" align="center">
<div id="dragg_308" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/08
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dd_5.php';?></div>
	<div id="Question_dd_309" data-options="handle:'#dragg_309'" align="center">
<div id="dragg_309" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/08
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dd_6.php';?></div>
	<div id="Question_dd_310" data-options="handle:'#dragg_310'" align="center">
<div id="dragg_310" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/08
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dd_7.php';?></div>
	<div id="Question_dd_311" data-options="handle:'#dragg_311'" align="center">
<div id="dragg_311" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°08/08
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dd_8.php';?></div>


<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_dd" data-options="handle:'#dragg_dd'" align="center">
<div id="dragg_dd" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleDepense/Depensed/form/Interface_dd_Synthese.php';?></div>
<!--*******************************************************************************************************-->

<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_dd"><?php include 'cycleDepense/Depensed/sms/Message slide question terminer dd.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_dd"><?php include 'cycleDepense/Depensed/sms/messRetdd.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_dd"><?php include 'cycleDepense/Depensed/sms/Message terminer question dd.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_dd"><?php include 'cycleDepense/Depensed/sms/Message terminer synthese dd.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_dd"><?php include 'cycleDepense/Depensed/sms/Message slide dd Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_dd"><?php include 'cycleDepense/Depensed/sms/sms_empty/Mess_vide_synth_dd.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_dd"><?php include 'cycleDepense/Depensed/sms/Message donnees perdues dd.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dd"><?php include 'cycleDepense/Depensed/sms/Message annulation question dd.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dd2"><?php include 'cycleDepense/Depensed/sms/Message_enregistre_question_dd2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dd3"><?php include 'cycleDepense/Depensed/sms/Message_enregistre_question_dd3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dd4"><?php include 'cycleDepense/Depensed/sms/Message_enregistre_question_dd4.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dd5"><?php include 'cycleDepense/Depensed/sms/Message_enregistre_question_dd5.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dd6"><?php include 'cycleDepense/Depensed/sms/Message_enregistre_question_dd6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dd7"><?php include 'cycleDepense/Depensed/sms/Message_enregistre_question_dd7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dd8"><?php include 'cycleDepense/Depensed/sms/Message_enregistre_question_dd8.php';?></div>
<!--*******************************************************************************************************-->

<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_dd1"><?php include 'cycleDepense/Depensed/sms/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_dd2"><?php include 'cycleDepense/Depensed/sms/sms_empty/Mess_quest_vide_dd2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_dd3"><?php include 'cycleDepense/Depensed/sms/sms_empty/Mess_quest_vide_dd3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_dd4"><?php include 'cycleDepense/Depensed/sms/sms_empty/Mess_quest_vide_dd4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_dd5"><?php include 'cycleDepense/Depensed/sms/sms_empty/Mess_quest_vide_dd5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_dd6"><?php include 'cycleDepense/Depensed/sms/sms_empty/Mess_quest_vide_dd6.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_dd7"><?php include 'cycleDepense/Depensed/sms/sms_empty/Mess_quest_vide_dd7.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_dd8"><?php include 'cycleDepense/Depensed/sms/sms_empty/Mess_quest_vide_dd8.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*******************************************************************************************************-->


<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_dd"><?php include 'cycleDepense/Depensed/sms/mess_vid_aud_dd.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************MESSAGE QUESTIONNAIRE NON REMPLI POUR SYNTHESE********************-->
<div id="mess_vide_obj_dd"><?php include 'cycleDepense/Depensed/sms/mess_vid_aud_dd.php'; ?></div>
<!--*******************************************************************************************************-->

</div>