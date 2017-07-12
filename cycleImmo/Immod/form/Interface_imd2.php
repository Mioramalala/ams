<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script>

$(function(){

	// Bouton retour menu achat
	$('#int_imd_Retour').click(function(){
		$('#message_fermeture_imd').show();
		$('#fancybox_imd').show();
	});
	//Con$tinuer la question
	$('#Int_imd_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_imd").value;
		$.ajax({
			type:'POST',
			url:'cycleImmo/Immod/php/aff_quest_fin_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==69){
					$('#message_Terminer_question_imd').show();
				}
				else if(e==1){
					$('#Question_imd_55').fadeIn(500);
				}
				else{
					quetion_imd="#Question_imd_"+e;
					$(quetion_imd).fadeIn(500);
				}
				$('#dv_table_imd').show();
				$('#lb_veuillez_aff_imd').hide();
				$('#fancybox_imd').show();
			}
		});
	});
	//la synthèse de c
	$('#Int_imd_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_imd").value;
		$.ajax({
			type:'POST',
			url:'cycleImmo/Immod/php/cpt_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==15){
					$.ajax({
						type:'POST',
						url:'cycleImmo/Immod/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:9},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("txt_Synthese_imd").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_imd_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_imd_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_imd_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_imd').show();
					$('#fancybox_imd').show();
				}
				else{
					$('#fancybox_imd').show();
					$('#mess_vide_obj_imd').show();
				}
			}
		});
	});
	
});
</script>

<div id="int_imd"><label class="lb_veuillez" id="lb_veuillez_aff_imd"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_imd" style="display:none;" />
	<div id="Interface_Question_imd"><?php include 'cycleImmo/Immod/load/load_quest_imd.php'; ?></div>
	<div id="dv_table_imd" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_imd">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_imd"></div>
	<div id="Int_Droite_imd">
		<input type="button" class="bouton" value="Retour" id="int_imd_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_imd_Continuer" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_imd_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_imd"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_imd_106" data-options="handle:'#dragg_106'" align="center">
<div id="dragg_106" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/11
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_imd_1.php';?></div>
	<div id="Question_imd_107" data-options="handle:'#dragg_107'" align="center">
<div id="dragg_107" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/11
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_imd_2.php';?></div>
	<div id="Question_imd_108" data-options="handle:'#dragg_108'" align="center">
<div id="dragg_108" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/11
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imd_3.php';?></div>
	<div id="Question_imd_109" data-options="handle:'#dragg_109'" align="center">
<div id="dragg_109" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/11
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imd_4.php';?></div>
	<div id="Question_imd_110" data-options="handle:'#dragg_110'" align="center">
<div id="dragg_110" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/11
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imd_5.php';?></div>
	<div id="Question_imd_111" data-options="handle:'#dragg_111'" align="center">
<div id="dragg_111" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/11
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imd_6.php';?></div>
	<div id="Question_imd_112" data-options="handle:'#dragg_112'" align="center">
<div id="dragg_112" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/11
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imd_7.php';?></div>
	<div id="Question_imd_113" data-options="handle:'#dragg_113'" align="center">
<div id="dragg_113" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/11
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imd_8.php';?></div>
	<div id="Question_imd_114" data-options="handle:'#dragg_114'" align="center">
<div id="dragg_114" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/11
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imd_9.php';?></div>
	<div id="Question_imd_115" data-options="handle:'#dragg_115'" align="center">
<div id="dragg_115" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/11
				<input type="button" style="width:113px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imd_10.php';?></div>
	<div id="Question_imd_116" data-options="handle:'#dragg_116'" align="center">
<div id="dragg_116" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/11
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imd_11.php';?></div>
<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_imd" data-options="handle:'#dragg_imd'" align="center">
<div id="dragg_imd" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleImmo/Immod/form/Interface_f_Synthese.php';?></div>
<!--*******************************************************************************************************-->





<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_imd"><?php include 'cycleImmo/Immod/sms/Message slide question terminer imd.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_imd"><?php include 'cycleImmo/Immod/sms/messRetimd.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_imd"><?php include 'cycleImmo/Immod/sms/Message terminer question imd.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_imd"><?php include 'cycleImmo/Immod/sms/Message terminer synthese imd.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_imd"><?php include 'cycleImmo/Immod/sms/Message slide imd Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_imd"><?php include 'cycleImmo/Immod/sms/sms_empty/Mess_vide_synth_imd.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_imd"><?php include 'cycleImmo/Immod/sms/Message donnees perdues imd.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imd"><?php include 'cycleImmo/Immod/sms/Message annulation question imd.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imd2"><?php include 'cycleImmo/Immod/sms/Message_enregistre_question_imd2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imd3"><?php include 'cycleImmo/Immod/sms/Message_enregistre_question_imd3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imd4"><?php include 'cycleImmo/Immod/sms/Message_enregistre_question_imd4.php';?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imd6"><?php include 'cycleImmo/Immod/sms/Message_enregistre_question_imd6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imd7"><?php include 'cycleImmo/Immod/sms/Message_enregistre_question_imd7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imd8"><?php include 'cycleImmo/Immod/sms/Message_enregistre_question_imd8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imd9"><?php include 'cycleImmo/Immod/sms/Message_enregistre_question_imd9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imd10"><?php include 'cycleImmo/Immod/sms/Message_enregistre_question_imd10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imd11"><?php include 'cycleImmo/Immod/sms/Message_enregistre_question_imd11.php';?></div>
<!--*******************************************************************************************************-->

<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_imd1"><?php include 'cycleImmo/Immod/sms/new 12.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_imd"><?php include 'cycleImmo/Immod/sms/mess_vid_aud_imd.php'; ?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imd5"><?php include 'cycleImmo/Immod/sms/Message_enregistre_question_imd5.php';?></div>
<!--*******************************************************************************************************-->



</div>

