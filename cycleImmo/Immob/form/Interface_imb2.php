<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script>


$(function(){

	// Bouton retour menu achat
	$('#int_imb_Retour').click(function(){

		$('#message_fermeture_imb').show();
		$('#fancybox_imb').show();
	});
	//Con$tinuer la question
	$('#Int_imb_Continuer').click(function(){

		alert("cc");
		mission_id=document.getElementById("txt_mission_id_imb").value;
		$.ajax({
			type:'POST',
			url:'cycleImmo/Immob/php/aff_quest_fin_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==69){
					$('#message_Terminer_question_imb').show();
				}
				else if(e==1){
					$('#Question_imb_55').fadeIn(500);
				}
				else{
					quetion_imb="#Question_imb_"+e;
					$(quetion_imb).fadeIn(500);
				}
				$('#dv_table_imb').show();
				$('#lb_veuillez_aff_imb').hide();
				$('#fancybox_imb').show();
			}
		});
	});
	//la synthèse de c
	$('#Int_imb_Synthese').click(function(){

//	alert("Syntese 2");	
		mission_id=document.getElementById("txt_mission_id_imb").value;
		$.ajax({
			type:'POST',
			url:'cycleImmo/Immob/php/cpt_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==15){
					$.ajax({
						type:'POST',
						url:'cycleImmo/Immob/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:6},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("txt_Synthese_imb").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_imb_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_imb_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_imb_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_imb').show();
					$('#fancybox_imb').show();
				}
				else{
					$('#fancybox_imb').show();
					$('#mess_vide_obj_imb').show();
				}
			}
		});
	});
	

	

	



	
});
</script>

<div id="int_imb"><label class="lb_veuillez" id="lb_veuillez_aff_imb"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_imb" style="display:none;" />
	<div id="Interface_Question_imb"><?php include 'cycleImmo/Immob/load/load_quest_imb.php'; ?></div>
	<div id="dv_table_imb" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_imb">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_imb"></div>
	<div id="Int_Droite_imb">
		<input type="button" class="bouton" value="Retour" id="int_imb_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_imb_Continuer" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_imb_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_imb"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_imb_70" data-options="handle:'#dragg_70'" align="center">
<div id="dragg_70" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/23
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_imb_1.php';?></div>
	<div id="Question_imb_71" data-options="handle:'#dragg_71'" align="center">
<div id="dragg_71" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/23
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_imb_2.php';?></div>
	<div id="Question_imb_72" data-options="handle:'#dragg_72'" align="center">
<div id="dragg_72" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/23
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_3.php';?></div>
	<div id="Question_imb_73" data-options="handle:'#dragg_73'" align="center">
<div id="dragg_73" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/23
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_4.php';?></div>
	<div id="Question_imb_74" data-options="handle:'#dragg_74'" align="center">
<div id="dragg_74" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/23
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_5.php';?></div>
	<div id="Question_imb_75" data-options="handle:'#dragg_75'" align="center">
<div id="dragg_75" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/23
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_6.php';?></div>
	<div id="Question_imb_76" data-options="handle:'#dragg_76'" align="center">
<div id="dragg_61" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/23
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_7.php';?></div>
	<div id="Question_imb_77" data-options="handle:'#dragg_77'" align="center">
<div id="dragg_77" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/23
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_8.php';?></div>
	<div id="Question_imb_78" data-options="handle:'#dragg_78'" align="center">
<div id="dragg_78" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/23
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_9.php';?></div>
	<div id="Question_imb_79" data-options="handle:'#dragg_79'" align="center">
<div id="dragg_79" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/23
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_10.php';?></div>
	<div id="Question_imb_80" data-options="handle:'#dragg_80'" align="center">
<div id="dragg_80" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/23
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_11.php';?></div>
	<div id="Question_imb_81" data-options="handle:'#dragg_81'" align="center">
<div id="dragg_81" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/23
				<input type="button" style="width:120px;height:15px;background-color:#ccc" />
				<input type="button" style="width:110px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_12.php';?></div>
	<div id="Question_imb_82" data-options="handle:'#dragg_82'" align="center">
<div id="dragg_82" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°13/23
				<input type="button" style="width:130px;height:15px;background-color:#ccc" />
				<input type="button" style="width:100px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_13.php';?></div>
	<div id="Question_imb_83" data-options="handle:'#dragg_83'" align="center">
<div id="dragg_83" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°14/23
				<input type="button" style="width:140px;height:15px;background-color:#ccc" />
				<input type="button" style="width:90px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_14.php';?></div>
	<div id="Question_imb_84" data-options="handle:'#dragg_84'" align="center">
<div id="dragg_84" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°15/23
				<input type="button" style="width:150px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_15.php';?></div>
		<div id="Question_imb_85" data-options="handle:'#dragg_85'" align="center">
<div id="dragg_85" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°16/23
				<input type="button" style="width:160px;height:15px;background-color:#ccc" />
				<input type="button" style="width:70px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_16.php';?></div>
	<div id="Question_imb_86" data-options="handle:'#dragg_86'" align="center">
<div id="dragg_86" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°17/23
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_17.php';?></div>
	<div id="Question_imb_87" data-options="handle:'#dragg_87'" align="center">
<div id="dragg_87" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°18/23
				<input type="button" style="width:180px;height:15px;background-color:#ccc" />
				<input type="button" style="width:50px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_18.php';?></div>
	<div id="Question_imb_88" data-options="handle:'#dragg_88'" align="center">
<div id="dragg_88" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°19/23
				<input type="button" style="width:190px;height:15px;background-color:#ccc" />
				<input type="button" style="width:40px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_19.php';?></div>
		<div id="Question_imb_89" data-options="handle:'#dragg_89'" align="center">
<div id="dragg_89" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°20/23
				<input type="button" style="width:200px;height:15px;background-color:#ccc" />
				<input type="button" style="width:30px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_20.php';?></div>
	<div id="Question_imb_90" data-options="handle:'#dragg_90'" align="center">
<div id="dragg_90" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°21/23
				<input type="button" style="width:210px;height:15px;background-color:#ccc" />
				<input type="button" style="width:20px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_21.php';?></div>
	<div id="Question_imb_91" data-options="handle:'#dragg_91'" align="center">
<div id="dragg_91" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°22/23
				<input type="button" style="width:220px;height:15px;background-color:#ccc" />
				<input type="button" style="width:10px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_22.php';?></div>
		<div id="Question_imb_92" data-options="handle:'#dragg_92'" align="center">
<div id="dragg_92" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°23/23
				<input type="button" style="width:230px;height:15px;background-color:#ccc" />
				<!--input type="button" style="width:10px;height:15px;background-color:#efefef" /-->
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imb_23.php';?></div>
<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_imb" data-options="handle:'#dragg_imb'" align="center">
<div id="dragg_imb" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleImmo/Immob/form/Interface_f_Synthese.php';?></div>
<!--*******************************************************************************************************-->





<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_imb"><?php include 'cycleImmo/Immob/sms/Message slide question terminer imb.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_imb"><?php include 'cycleImmo/Immob/sms/messRetimb.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_imb"><?php include 'cycleImmo/Immob/sms/Message terminer question imb.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_imb"><?php include 'cycleImmo/Immob/sms/Message terminer synthese imb.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_imb"><?php include 'cycleImmo/Immob/sms/Message slide imb Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_imb"><?php include 'cycleImmo/Immob/sms/sms_empty/Mess_vide_synth_imb.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_imb"><?php include 'cycleImmo/Immob/sms/Message donnees perdues imb.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb"><?php include 'cycleImmo/Immob/sms/Message annulation question imb.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb2"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb3"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb4"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb4.php';?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb6"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb7"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb8"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb9"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb10"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb11"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb12"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb12.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb13"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb13.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb14"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb14.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb15"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb15.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb16"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb16.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb17"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb17.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb18"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb18.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb19"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb19.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb20"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb20.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb21"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb21.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb22"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb22.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb23"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb23.php';?></div>
<!--*******************************************************************************************************-->


<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_imb1"><?php include 'cycleImmo/Immob/sms/new 12.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_imb"><?php include 'cycleImmo/Immob/sms/mess_vid_aud_imb.php'; ?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imb5"><?php include 'cycleImmo/Immob/sms/Message_enregistre_question_imb5.php';?></div>
<!--*******************************************************************************************************-->



</div>

