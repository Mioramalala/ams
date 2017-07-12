<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script>


$(function(){

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
			url:'cycleStock/Stockc/php/aff_quest_fin_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==69){
					$('#message_Terminer_question_stc').show();
				}
				else if(e==1){
					$('#Question_stc_55').fadeIn(500);
				}
				else{
					quetion_stc="#Question_stc_"+e;
					$(quetion_stc).fadeIn(500);
				}
				$('#dv_table_stc').show();
				$('#lb_veuillez_aff_stc').hide();
				$('#fancybox_stc').show();
			}
		});
	});
	//la synthèse de c
	$('#Int_stc_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_stc").value;
		$.ajax({
			type:'POST',
			url:'cycleStock/Stockc/php/cpt_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==15){
					$.ajax({
						type:'POST',
						url:'cycleStock/Stockc/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:12},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
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
		<input type="button" class="bouton" value="Synthese" id="Int_stc_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_stc"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_stc_117" data-options="handle:'#dragg_117'" align="center">
<div id="dragg_117" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/18
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_stc_1.php';?></div>
	<div id="Question_stc_118" data-options="handle:'#dragg_118'" align="center">
<div id="dragg_118" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/18
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_stc_2.php';?></div>
	<div id="Question_stc_119" data-options="handle:'#dragg_119'" align="center">
<div id="dragg_119" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/18
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_3.php';?></div>
	<div id="Question_stc_120" data-options="handle:'#dragg_120'" align="center">
<div id="dragg_120" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/18
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_4.php';?></div>
	<div id="Question_stc_121" data-options="handle:'#dragg_121'" align="center">
<div id="dragg_121" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/18
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_5.php';?></div>
	<div id="Question_stc_122" data-options="handle:'#dragg_122'" align="center">
<div id="dragg_122" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/18
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_6.php';?></div>
	<div id="Question_stc_123" data-options="handle:'#dragg_123'" align="center">
<div id="dragg_123" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/18
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_7.php';?></div>
	<div id="Question_stc_124" data-options="handle:'#dragg_124'" align="center">
<div id="dragg_124" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/18
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_8.php';?></div>
	<div id="Question_stc_125" data-options="handle:'#dragg_125'" align="center">
<div id="dragg_125" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/18
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_9.php';?></div>
	<div id="Question_stc_126" data-options="handle:'#dragg_126'" align="center">
<div id="dragg_126" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/18
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_10.php';?></div>
	<div id="Question_stc_127" data-options="handle:'#dragg_127'" align="center">
<div id="dragg_127" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/18
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_11.php';?></div>
	<div id="Question_stc_128" data-options="handle:'#dragg_128'" align="center">
<div id="dragg_128" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/18
				<input type="button" style="width:120px;height:15px;background-color:#ccc" />
				<input type="button" style="width:110px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_12.php';?></div>
	<div id="Question_stc_129" data-options="handle:'#dragg_129'" align="center">
<div id="dragg_129" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°13/18
				<input type="button" style="width:130px;height:15px;background-color:#ccc" />
				<input type="button" style="width:100px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_13.php';?></div>
	<div id="Question_stc_130" data-options="handle:'#dragg_130'" align="center">
<div id="dragg_130" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°14/18
				<input type="button" style="width:140px;height:15px;background-color:#ccc" />
				<input type="button" style="width:90px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_14.php';?></div>
	<div id="Question_stc_131" data-options="handle:'#dragg_131'" align="center">
<div id="dragg_131" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°15/18
				<input type="button" style="width:150px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_15.php';?></div>
		<div id="Question_stc_132" data-options="handle:'#dragg_132'" align="center">
<div id="dragg_132" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°16/18
				<input type="button" style="width:160px;height:15px;background-color:#ccc" />
				<input type="button" style="width:70px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_16.php';?></div>
	<div id="Question_stc_133" data-options="handle:'#dragg_133'" align="center">
<div id="dragg_133" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°17/18
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_17.php';?></div>
	<div id="Question_stc_134" data-options="handle:'#dragg_134'" align="center">
<div id="dragg_134" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°18/18
				<input type="button" style="width:180px;height:15px;background-color:#ccc" />
				<input type="button" style="width:50px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stc_18.php';?></div>

<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_stc" data-options="handle:'#dragg_stc'" align="center">
<div id="dragg_stc" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleStock/Stockc/form/Interface_f_Synthese.php';?></div>
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
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc16"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc16.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc17"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc17.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc18"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc18.php';?></div>
<!--*******************************************************************************************************-->

<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_stc1"><?php include 'cycleStock/Stockc/sms/new 12.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_stc"><?php include 'cycleStock/Stockc/sms/mess_vid_aud_stc.php'; ?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stc5"><?php include 'cycleStock/Stockc/sms/Message_enregistre_question_stc5.php';?></div>
<!--*******************************************************************************************************-->



</div>

