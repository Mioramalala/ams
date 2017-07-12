<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script>


$(function(){

	// Bouton retour menu achat
	$('#int_pc_Retour').click(function(){
		$('#message_fermeture_pc').show();
		$('#fancybox_pc').show();
	});
	//Con$tinuer la question
	$('#Int_pc_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_pc").value;
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paiec/php/aff_quest_fin_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==69){
					$('#message_Terminer_question_pc').show();
				}
				else if(e==1){
					$('#Question_pc_55').fadeIn(500);
				}
				else{
					quetion_pc="#Question_pc_"+e;
					$(quetion_pc).fadeIn(500);
				}
				$('#dv_table_pc').show();
				$('#lb_veuillez_aff_pc').hide();
				$('#fancybox_pc').show();
			}
		});
	});
	//la synthèse de c
	$('#Int_pc_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_pc").value;
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paiec/php/cpt_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==26){
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paiec/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:15},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("txt_Synthese_pc").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_pc_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_pc_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_pc_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_pc').show();
					$('#fancybox_pc').show();
				}
				else{
					$('#fancybox_pc').show();
					$('#mess_vide_obj_pc').show();
				}
			}
		});
	});
});
</script>

<div id="int_pc"><label class="lb_veuillez" id="lb_veuillez_aff_pc"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_pc" style="display:none;" />
	<div id="Interface_Question_pc"><?php include 'cyclePaie/Paiec/load/load_quest_pc.php'; ?></div>
	<div id="dv_table_pc" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_pc">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_pc"></div>
	<div id="Int_Droite_pc">
		<input type="button" class="bouton" value="Retour" id="int_pc_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_pc_Continuer" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_pc_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_pc"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_pc_196" data-options="handle:'#dragg_196'" align="center">
<div id="dragg_196" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/29
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_pc_1.php';?></div>
	<div id="Question_pc_197" data-options="handle:'#dragg_197'" align="center">
<div id="dragg_197" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/29
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_pc_2.php';?></div>
	<div id="Question_pc_198" data-options="handle:'#dragg_198'" align="center">
<div id="dragg_198" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/29
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_3.php';?></div>
	<div id="Question_pc_199" data-options="handle:'#dragg_199'" align="center">
<div id="dragg_199" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/29
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_4.php';?></div>
	<div id="Question_pc_200" data-options="handle:'#dragg_200'" align="center">
<div id="dragg_200" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/29
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_5.php';?></div>
	<div id="Question_pc_201" data-options="handle:'#dragg_201'" align="center">
<div id="dragg_201" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/29
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_6.php';?></div>
	<div id="Question_pc_202" data-options="handle:'#dragg_202'" align="center">
<div id="dragg_202" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/29
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_7.php';?></div>
	<div id="Question_pc_203" data-options="handle:'#dragg_203'" align="center">
<div id="dragg_203" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/29
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_8.php';?></div>
	<div id="Question_pc_204" data-options="handle:'#dragg_204'" align="center">
<div id="dragg_204" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/29
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_9.php';?></div>
	<div id="Question_pc_205" data-options="handle:'#dragg_205'" align="center">
<div id="dragg_205" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/29
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_10.php';?></div>
	<div id="Question_pc_206" data-options="handle:'#dragg_206'" align="center">
<div id="dragg_206" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/29
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_11.php';?></div>
	<div id="Question_pc_207" data-options="handle:'#dragg_207'" align="center">
<div id="dragg_207" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/29
				<input type="button" style="width:120px;height:15px;background-color:#ccc" />
				<input type="button" style="width:110px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_12.php';?></div>
	<div id="Question_pc_208" data-options="handle:'#dragg_208'" align="center">
<div id="dragg_208" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°13/29
				<input type="button" style="width:165px;height:15px;background-color:#ccc" />
				<input type="button" style="width:100px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_13.php';?></div>
	<div id="Question_pc_209" data-options="handle:'#dragg_209'" align="center">
<div id="dragg_209" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°14/29
				<input type="button" style="width:140px;height:15px;background-color:#ccc" />
				<input type="button" style="width:90px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_14.php';?></div>
	<div id="Question_pc_210" data-options="handle:'#dragg_210'" align="center">
<div id="dragg_210" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°15/29
				<input type="button" style="width:167px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_15.php';?></div>
		<div id="Question_pc_211" data-options="handle:'#dragg_211'" align="center">
<div id="dragg_211" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°16/29
				<input type="button" style="width:160px;height:15px;background-color:#ccc" />
				<input type="button" style="width:70px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_16.php';?></div>
	<div id="Question_pc_212" data-options="handle:'#dragg_212'" align="center">
<div id="dragg_212" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°17/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_17.php';?></div>
		<div id="Question_pc_213" data-options="handle:'#dragg_213'" align="center">
<div id="dragg_213" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°18/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_18.php';?></div>
		<div id="Question_pc_214" data-options="handle:'#dragg_214'" align="center">
<div id="dragg_214" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°19/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_19.php';?></div>
		<div id="Question_pc_215" data-options="handle:'#dragg_215'" align="center">
<div id="dragg_215" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°20/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_20.php';?></div>
		<div id="Question_pc_216" data-options="handle:'#dragg_216'" align="center">
<div id="dragg_216" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°21/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_21.php';?></div>
		<div id="Question_pc_217" data-options="handle:'#dragg_217'" align="center">
<div id="dragg_217" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°22/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_22.php';?></div>
		<div id="Question_pc_218" data-options="handle:'#dragg_218'" align="center">
<div id="dragg_218" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°23/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_23.php';?></div>
		<div id="Question_pc_219" data-options="handle:'#dragg_219'" align="center">
<div id="dragg_219" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°24/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_24.php';?></div>
		<div id="Question_pc_220" data-options="handle:'#dragg_220'" align="center">
<div id="dragg_220" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°25/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_25.php';?></div>
			<div id="Question_pc_221" data-options="handle:'#dragg_221'" align="center">
<div id="dragg_221" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°25/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_26.php';?></div>
<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_pc" data-options="handle:'#dragg_pc'" align="center">
<div id="dragg_pc" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cyclePaie/Paiec/form/Interface_f_Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_pc"><?php include 'cyclePaie/Paiec/sms/Message slide question terminer pc.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_pc"><?php include 'cyclePaie/Paiec/sms/messRetpc.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_pc"><?php include 'cyclePaie/Paiec/sms/Message terminer question pc.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_pc"><?php include 'cyclePaie/Paiec/sms/Message terminer synthese pc.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_pc"><?php include 'cyclePaie/Paiec/sms/Message slide pc Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_pc"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_vide_synth_pc.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_pc"><?php include 'cyclePaie/Paiec/sms/Message donnees perdues pc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc"><?php include 'cyclePaie/Paiec/sms/Message annulation question pc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc2"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc3"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc4"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc4.php';?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc6"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc7"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc8"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc9"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc10"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc11"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc12"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc12.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc13"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc13.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc14"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc14.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc15"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc15.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc16"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc16.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc17"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc17.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc18"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc18.php';?></div>
<!--*******************************************************************************************************-->

<div id="message_fermeture_question_pc10"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc18.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc11"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc19.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc12"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc20.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc13"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc21.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc14"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc22.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc15"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc23.php';?></div>
<!--*******************************************************************************************************-->
<div id="message_fermeture_question_pc16"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc24.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc17"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc25.php';?></div>
<!--***********************************Message de fermeture de toutes les question*************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_pc1"><?php include 'cyclePaie/Paiec/sms/new 12.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_pc"><?php include 'cyclePaie/Paiec/sms/mess_vid_aud_pc.php'; ?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc5"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc5.php';?></div>
<!--*******************************************************************************************************-->



</div>

