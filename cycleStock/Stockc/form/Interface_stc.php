<?php
	// include $_SERVER["DOCUMENT_ROOT"]."/Connexion.php";
	// @session_start();
	// $mission_id=$_SESSION['idMission'];
	// $verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=12 AND MISSION_ID='.$mission_id);
	// $resultat=$verif->fetch();
	// $validStockC=$resultat['nb'];
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script language="javascript">

var stcID_="";

 // Droit cycle by Tolotra
    // Page : RSCI -> Cycle stocks
    // Tâche : Revue Cotrôles stocks, numéro 16
    $.ajax({
        type: 'POST',
        url: 'droitCycle.php',
        data: {task_id: 16},
        success: function (e) {
            var result = 0 === Number(e);
            $("#Int_stc_Continuer").attr('disabled', result);
            $("#Int_stc_Synthese").attr('disabled', result);
        }
    });

$(function()
{


	// Bouton retour menu achat
	$('#int_stc_Retour').click(function(){
		$('#message_fermeture_stc').show();
		$('#fancybox_stc').show();
	});
	//Con$tinuer la question
	$('#Int_stc_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_stc").value;
		$.ajax({
			type:'POST',
			url:'cycleStock/Stockc/php/aff_quest_fin_stc.php',
			data:{mission_id:mission_id},
			success:function(e){
				stcID_=e;
					quetion_stc="#Question_stc_"+e;
					$(quetion_stc).fadeIn(500);
					stc=e;
					$.ajax({
						type:'POST',
						url:'cycleStock/Stockc/php/getRepContinuer.php',
						data:{mission_id:mission_id, questId:e, cycleId:12},
						success:function(e1){
							eo=""+e1+"";
							doc=eo.split(',');
							cpt=1;
							for(i=135; i<151; i++){ 
								if(i==stc){
									stcId="stc_"+cpt;
									stcIdCom="stc"+cpt;
									afficheReponseQuest(stcId,stcIdCom);
									break;
								}
								cpt++;
							}
							
						}
					});
				// }
				$('#dv_table_stc').show();
				$('#lb_veuillez_aff_stc').hide();
				$('#fancybox_stc').show();
			}
		});
	});
	//la synthèse de stc
	$('#Int_stc_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_stc").value;
		
		// se rediriger vers calcul score
		$.ajax({
			type:'POST',
			url:'cycleStock/Stockc/php/select_score_stc.php',
			data:{mission_id:mission_id},
			success:function(e){
			    $("#echo_score_stc").html(e);
			}			
		});
		
		
		$.ajax({
			type:'POST',
			url:'cycleStock/Stockc/php/cpt_stc.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==17){
					$.ajax({
						type:'POST',
						url:'cycleStock/Stockc/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:12},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("rd_Synthese_stc_Faible").checked=false;
							document.getElementById("rd_Synthese_stc_Moyen").checked=false;
							document.getElementById("rd_Synthese_stc_Eleve").checked=false;
							document.getElementById("txt_Synthese_stc").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_stc_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_stc_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_stc_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_stc').show();
					$('#fancybox_stc').show();
				}
				else{
					$('#fancybox_stc').show();
					$('#mess_vide_obj_stc').show();
				}
			}
		});
	});
});
function afficheReponseQuest(stcId,stcIdCom){
	document.getElementById("rad_Question_Oui_"+stcId).checked=false;
	document.getElementById("rad_Question_NA_"+stcId).checked=false;
	document.getElementById("rad_Question_Non_"+stcId).checked=false;
	if(doc[0]==0){
		document.getElementById("commentaire_Question_"+stcIdCom).value="";
	}
	else
		document.getElementById("commentaire_Question_"+stcIdCom).value=doc[0];
	if(doc[1]==="OUI"){
		document.getElementById("rad_Question_Oui_"+stcId).checked=true;
	}
	else if(doc[1]==="N/A"){
		document.getElementById("rad_Question_NA_"+stcId).checked=true;
	}
	else if(doc[1]==="NON"){
		document.getElementById("rad_Question_Non_"+stcId).checked=true;
	}
}
</script>

<div id="int_stc"><label class="lb_veuillez" id="lb_veuillez_aff_stc"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_stc" style="display:none;" />
	<div id="Interface_Question_stc"><?php include 'cycleStock/Stockc/load/load_quest_stc.php'; ?></div>
	<div id="dv_table_stc" style="float:left;display:none;width:80%;">
		<table class="label" id="lb_stc">
			<tr>
				<td width="60%">Question</td>
				<td width="10%">Commentaire</td>
			</tr>
		</table>
	</div>

	<div id="frm_tab_res_stc"></div>
	
	<div id="Int_Droite_stc">
		<input type="button" class="bouton" value="Retour" id="int_stc_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_stc_Continuer" /><br />
		<input type="button" class="bouton" value="Synthèse" id="Int_stc_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_stc"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_stc_135" data-options="handle:'#dragg_135'" align="center">
<div id="dragg_135" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/17
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_stc_1.php';?></div>
	<div id="Question_stc_136" data-options="handle:'#dragg_136'" align="center">
<div id="dragg_136" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/17
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_stc_2.php';?></div>
	<div id="Question_stc_137" data-options="handle:'#dragg_137'" align="center">
<div id="dragg_137" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/17
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_3.php';?></div>
	<div id="Question_stc_138" data-options="handle:'#dragg_138'" align="center">
<div id="dragg_138" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/17
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_4.php';?></div>
	<div id="Question_stc_139" data-options="handle:'#dragg_139'" align="center">
<div id="dragg_139" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/17
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_5.php';?></div>
	<div id="Question_stc_140" data-options="handle:'#dragg_140'" align="center">
<div id="dragg_140" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/17
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_6.php';?></div>
	<div id="Question_stc_141" data-options="handle:'#dragg_141'" align="center">
<div id="dragg_141" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/17
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_7.php';?></div>
	<div id="Question_stc_142" data-options="handle:'#dragg_142'" align="center">
<div id="dragg_142" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/17
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_8.php';?></div>
	<div id="Question_stc_143" data-options="handle:'#dragg_143'" align="center">
<div id="dragg_143" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/17
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_9.php';?></div>
	<div id="Question_stc_144" data-options="handle:'#dragg_144'" align="center">
<div id="dragg_144" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/17
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_10.php';?></div>
	<div id="Question_stc_145" data-options="handle:'#dragg_145'" align="center">
<div id="dragg_145" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/17
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_11.php';?></div>
	<div id="Question_stc_146" data-options="handle:'#dragg_146'" align="center">
<div id="dragg_146" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/17
				<input type="button" style="width:120px;height:15px;background-color:#ccc" />
				<input type="button" style="width:110px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_12.php';?></div>
	<div id="Question_stc_147" data-options="handle:'#dragg_147'" align="center">
<div id="dragg_147" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°13/17
				<input type="button" style="width:148px;height:15px;background-color:#ccc" />
				<input type="button" style="width:100px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_13.php';?></div>
	<div id="Question_stc_148" data-options="handle:'#dragg_148'" align="center">
<div id="dragg_148" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°14/17
				<input type="button" style="width:140px;height:15px;background-color:#ccc" />
				<input type="button" style="width:90px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_14.php';?></div>
	<div id="Question_stc_149" data-options="handle:'#dragg_149'" align="center">
<div id="dragg_149" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°15/17
				<input type="button" style="width:150px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_15.php';?></div>
		<div id="Question_stc_150" data-options="handle:'#dragg_150'" align="center">
<div id="dragg_150" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°16/17
				<input type="button" style="width:160px;height:15px;background-color:#ccc" />
				<input type="button" style="width:70px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_16.php';?></div>
	<div id="Question_stc_151" data-options="handle:'#dragg_151'" align="center">
<div id="dragg_151" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°17/17
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_17.php';?></div>


<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_stc" data-options="handle:'#dragg_stc'" align="center">
<div id="dragg_stc" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleStock/Stockc/form/Interface_stc_Synthese.php';?></div>
<!--*******************************************************************************************************-->

<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_stc"><?php include 'cycleStock/Stockc/sms/Message slide question terminer stc.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_stc"><?php include 'cycleStock/Stockc/sms/messRetstc.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_stc"><?php include 'cycleStock/Stockc/sms/Message terminer question stc.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_stc"><?php include 'cycleStock/Stockc/sms/Message terminer synthese stc.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_stc"><?php include 'cycleStock/Stockc/sms/Message slide stc Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_stc"><?php include 'cycleStock/Stockc/sms/sms_empty/Mess_vide_synth_stc.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_stc"><?php include 'cycleStock/Stockc/sms/Message donnees perdues stc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc"><?php include 'cycleStock/Stockc/sms/Message annulation question stc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc2"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc3"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc4"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc4.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc5"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc5.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc6"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc7"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc8"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc9"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc10"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc11"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc12"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc12.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc13"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc13.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc14"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc14.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc15"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc15.php';?></div>
<!--*******************************************************************************************************-->
<div id="message_fermeture_question_stc16"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc16.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc17"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc17.php';?></div>
<!--*******************************************************************************************************-->

<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_stc1"><?php include 'cycleStock/Stockc/sms/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_stc2"><?php include 'cycleStock/Stockc/sms/sms_empty/Mess_quest_vide_stc2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_stc3"><?php include 'cycleStock/Stockc/sms/sms_empty/Mess_quest_vide_stc3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_stc4"><?php include 'cycleStock/Stockc/sms/sms_empty/Mess_quest_vide_stc4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_stc5"><?php include 'cycleStock/Stockc/sms/sms_empty/Mess_quest_vide_stc5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_stc6"><?php include 'cycleStock/Stockc/sms/sms_empty/Mess_quest_vide_stc6.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_stc7"><?php include 'cycleStock/Stockc/sms/sms_empty/Mess_quest_vide_stc7.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_stc8"><?php include 'cycleStock/Stockc/sms/sms_empty/Mess_quest_vide_stc8.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_stc9"><?php include 'cycleStock/Stockc/sms/sms_empty/Mess_quest_vide_stc9.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_stc10"><?php include 'cycleStock/Stockc/sms/sms_empty/Mess_quest_vide_stc10.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_stc11"><?php include 'cycleStock/Stockc/sms/sms_empty/Mess_quest_vide_stc11.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_stc12"><?php include 'cycleStock/Stockc/sms/sms_empty/Mess_quest_vide_stc12.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_stc13"><?php include 'cycleStock/Stockc/sms/sms_empty/Mess_quest_vide_stc13.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_stc14"><?php include 'cycleStock/Stockc/sms/sms_empty/Mess_quest_vide_stc14.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_stc15"><?php include 'cycleStock/Stockc/sms/sms_empty/Mess_quest_vide_stc15.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_stc16"><?php include 'cycleStock/Stockc/sms/sms_empty/Mess_quest_vide_stc16.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_stc17"><?php include 'cycleStock/Stockc/sms/sms_empty/Mess_quest_vide_stc17.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_stc"><?php include 'cycleStock/Stockc/sms/mess_vid_aud_stc.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************MESSAGE QUESTIONNAIRE NON REMPLI POUR SYNTHESE********************-->
<div id="mess_vide_obj_stc"><?php include 'cycleStock/Stockc/sms/mess_vid_aud_stc.php'; ?></div>
<!--*******************************************************************************************************-->

</div>