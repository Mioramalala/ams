<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script>


$(function(){

	// Bouton retour menu achat
	$('#int_stb_Retour').click(function(){
		$('#message_fermeture_stb').show();
		$('#fancybox_stb').show();
	});
	//Con$tinuer la question
	$('#Int_stb_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_stb").value;
		$.ajax({
			type:'POST',
			url:'cycleStock/Stockb/php/aff_quest_fin_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==69){
					$('#message_Terminer_question_stb').show();
				}
				else if(e==1){
					$('#Question_stb_55').fadeIn(500);
				}
				else{
					quetion_stb="#Question_stb_"+e;
					$(quetion_stb).fadeIn(500);
				}
				$('#dv_table_stb').show();
				$('#lb_veuillez_aff_stb').hide();
				$('#fancybox_stb').show();
			}
		});
	});
	//la synthèse de c
	$('#Int_stb_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_stb").value;
		$.ajax({
			type:'POST',
			url:'cycleStock/Stockb/php/cpt_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==15){
					$.ajax({
						type:'POST',
						url:'cycleStock/Stockb/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:11},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("txt_Synthese_stb").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_stb_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_stb_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_stb_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_stb').show();
					$('#fancybox_stb').show();
				}
				else{
					$('#fancybox_stb').show();
					$('#mess_vide_obj_stb').show();
				}
			}
		});
	});
});
</script>

<div id="int_stb"><label class="lb_veuillez" id="lb_veuillez_aff_stb"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_stb" style="display:none;" />
	<div id="Interface_Question_stb"><?php include 'cycleStock/Stockb/load/load_quest_stb.php'; ?></div>
	<div id="dv_table_stb" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_stb">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_stb"></div>
	<div id="Int_Droite_stb">
		<input type="button" class="bouton" value="Retour" id="int_stb_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_stb_Continuer" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_stb_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_stb"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_stb_117" data-options="handle:'#dragg_117'" align="center">
<div id="dragg_117" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/18
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_stb_1.php';?></div>
	<div id="Question_stb_118" data-options="handle:'#dragg_118'" align="center">
<div id="dragg_118" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/18
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_stb_2.php';?></div>
	<div id="Question_stb_119" data-options="handle:'#dragg_119'" align="center">
<div id="dragg_119" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/18
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stb_3.php';?></div>
	<div id="Question_stb_120" data-options="handle:'#dragg_120'" align="center">
<div id="dragg_120" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/18
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stb_4.php';?></div>
	<div id="Question_stb_121" data-options="handle:'#dragg_121'" align="center">
<div id="dragg_121" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/18
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stb_5.php';?></div>
	<div id="Question_stb_122" data-options="handle:'#dragg_122'" align="center">
<div id="dragg_122" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/18
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stb_6.php';?></div>
	<div id="Question_stb_123" data-options="handle:'#dragg_123'" align="center">
<div id="dragg_123" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/18
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stb_7.php';?></div>
	<div id="Question_stb_124" data-options="handle:'#dragg_124'" align="center">
<div id="dragg_124" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/18
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stb_8.php';?></div>
	<div id="Question_stb_125" data-options="handle:'#dragg_125'" align="center">
<div id="dragg_125" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/18
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stb_9.php';?></div>
	<div id="Question_stb_126" data-options="handle:'#dragg_126'" align="center">
<div id="dragg_126" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/18
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stb_10.php';?></div>
	<div id="Question_stb_127" data-options="handle:'#dragg_127'" align="center">
<div id="dragg_127" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/18
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stb_11.php';?></div>
	<div id="Question_stb_128" data-options="handle:'#dragg_128'" align="center">
<div id="dragg_128" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/18
				<input type="button" style="width:120px;height:15px;background-color:#ccc" />
				<input type="button" style="width:110px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stb_12.php';?></div>
	<div id="Question_stb_129" data-options="handle:'#dragg_129'" align="center">
<div id="dragg_129" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°13/18
				<input type="button" style="width:130px;height:15px;background-color:#ccc" />
				<input type="button" style="width:100px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stb_13.php';?></div>
	<div id="Question_stb_130" data-options="handle:'#dragg_130'" align="center">
<div id="dragg_130" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°14/18
				<input type="button" style="width:140px;height:15px;background-color:#ccc" />
				<input type="button" style="width:90px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stb_14.php';?></div>
	<div id="Question_stb_131" data-options="handle:'#dragg_131'" align="center">
<div id="dragg_131" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°15/18
				<input type="button" style="width:150px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stb_15.php';?></div>
		<div id="Question_stb_132" data-options="handle:'#dragg_132'" align="center">
<div id="dragg_132" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°16/18
				<input type="button" style="width:160px;height:15px;background-color:#ccc" />
				<input type="button" style="width:70px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stb_16.php';?></div>
	<div id="Question_stb_133" data-options="handle:'#dragg_133'" align="center">
<div id="dragg_133" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°17/18
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stb_17.php';?></div>
	<div id="Question_stb_134" data-options="handle:'#dragg_134'" align="center">
<div id="dragg_134" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°18/18
				<input type="button" style="width:180px;height:15px;background-color:#ccc" />
				<input type="button" style="width:50px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_stb_18.php';?></div>

<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_stb" data-options="handle:'#dragg_stb'" align="center">
<div id="dragg_stb" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleStock/Stockb/form/Interface_f_Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_stb"><?php include 'cycleStock/Stockb/sms/Message slide question terminer stb.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_stb"><?php include 'cycleStock/Stockb/sms/messRetstb.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_stb"><?php include 'cycleStock/Stockb/sms/Message terminer question stb.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_stb"><?php include 'cycleStock/Stockb/sms/Message terminer synthese stb.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_stb"><?php include 'cycleStock/Stockb/sms/Message slide stb Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_stb"><?php include 'cycleStock/Stockb/sms/sms_empty/Mess_vide_synth_stb.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_stb"><?php include 'cycleStock/Stockb/sms/Message donnees perdues stb.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stb"><?php include 'cycleStock/Stockb/sms/Message annulation question stb.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stb2"><?php include 'cycleStock/Stockb/sms/Message_enregistre_question_stb2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stb3"><?php include 'cycleStock/Stockb/sms/Message_enregistre_question_stb3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stb4"><?php include 'cycleStock/Stockb/sms/Message_enregistre_question_stb4.php';?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stb6"><?php include 'cycleStock/Stockb/sms/Message_enregistre_question_stb6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stb7"><?php include 'cycleStock/Stockb/sms/Message_enregistre_question_stb7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stb8"><?php include 'cycleStock/Stockb/sms/Message_enregistre_question_stb8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stb9"><?php include 'cycleStock/Stockb/sms/Message_enregistre_question_stb9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stb10"><?php include 'cycleStock/Stockb/sms/Message_enregistre_question_stb10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stb11"><?php include 'cycleStock/Stockb/sms/Message_enregistre_question_stb11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stb12"><?php include 'cycleStock/Stockb/sms/Message_enregistre_question_stb12.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stb13"><?php include 'cycleStock/Stockb/sms/Message_enregistre_question_stb13.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stb14"><?php include 'cycleStock/Stockb/sms/Message_enregistre_question_stb14.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stb15"><?php include 'cycleStock/Stockb/sms/Message_enregistre_question_stb15.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stb16"><?php include 'cycleStock/Stockb/sms/Message_enregistre_question_stb16.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stb17"><?php include 'cycleStock/Stockb/sms/Message_enregistre_question_stb17.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stb18"><?php include 'cycleStock/Stockb/sms/Message_enregistre_question_stb18.php';?></div>
<!--*******************************************************************************************************-->

<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_stb1"><?php include 'cycleStock/Stockb/sms/new 12.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_stb"><?php include 'cycleStock/Stockb/sms/mess_vid_aud_stb.php'; ?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_stb5"><?php include 'cycleStock/Stockb/sms/Message_enregistre_question_stb5.php';?></div>
<!--*******************************************************************************************************-->



</div>

