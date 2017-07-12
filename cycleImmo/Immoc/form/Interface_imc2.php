<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script>

$(function(){

	// Bouton retour menu achat
	$('#int_imc_Retour').click(function(){
		$('#message_fermeture_imc').show();
		$('#fancybox_imc').show();
	});
	//Con$tinuer la question
	$('#Int_imc_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_imc").value;
		$.ajax({
			type:'POST',
			url:'cycleImmo/Immoc/php/aff_quest_fin_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==69){
					$('#message_Terminer_question_imc').show();
				}
				else if(e==1){
					$('#Question_imc_55').fadeIn(500);
				}
				else{
					quetion_imc="#Question_imc_"+e;
					$(quetion_imc).fadeIn(500);
				}
				$('#dv_table_imc').show();
				$('#lb_veuillez_aff_imc').hide();
				$('#fancybox_imc').show();
			}
		});
	});
	//la synthèse de c
	$('#Int_imc_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_imc").value;
		$.ajax({
			type:'POST',
			url:'cycleImmo/Immoc/php/cpt_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==15){
					$.ajax({
						type:'POST',
						url:'cycleImmo/Immoc/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:8},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("txt_Synthese_imc").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_imc_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_imc_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_imc_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_imc').show();
					$('#fancybox_imc').show();
				}
				else{
					$('#fancybox_imc').show();
					$('#mess_vide_obj_imc').show();
				}
			}
		});
	});
	
});
</script>

<div id="int_imc"><label class="lb_veuillez" id="lb_veuillez_aff_imc"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_imc" style="display:none;" />
	<div id="Interface_Question_imc"><?php include 'cycleImmo/Immoc/load/load_quest_imc.php'; ?></div>
	<div id="dv_table_imc" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_imc">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_imc"></div>
	<div id="Int_Droite_imc">
		<input type="button" class="bouton" value="Retour" id="int_imc_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_imc_Continuer" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_imc_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_imc"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_imc_93" data-options="handle:'#dragg_93'" align="center">
<div id="dragg_93" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/13
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_imc_1.php';?></div>
	<div id="Question_imc_94" data-options="handle:'#dragg_94'" align="center">
<div id="dragg_94" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/13
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_imc_2.php';?></div>
	<div id="Question_imc_95" data-options="handle:'#dragg_95'" align="center">
<div id="dragg_95" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/13
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imc_3.php';?></div>
	<div id="Question_imc_96" data-options="handle:'#dragg_96'" align="center">
<div id="dragg_96" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/13
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imc_4.php';?></div>
	<div id="Question_imc_97" data-options="handle:'#dragg_97'" align="center">
<div id="dragg_97" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/13
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imc_5.php';?></div>
	<div id="Question_imc_98" data-options="handle:'#dragg_98'" align="center">
<div id="dragg_98" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/13
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imc_6.php';?></div>
	<div id="Question_imc_99" data-options="handle:'#dragg_99'" align="center">
<div id="dragg_99" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/13
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imc_7.php';?></div>
	<div id="Question_imc_100" data-options="handle:'#dragg_100'" align="center">
<div id="dragg_100" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/13
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imc_8.php';?></div>
	<div id="Question_imc_101" data-options="handle:'#dragg_101'" align="center">
<div id="dragg_101" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/13
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imc_9.php';?></div>
	<div id="Question_imc_102" data-options="handle:'#dragg_102'" align="center">
<div id="dragg_102" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/13
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imc_10.php';?></div>
	<div id="Question_imc_103" data-options="handle:'#dragg_103'" align="center">
<div id="dragg_103" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/13
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imc_11.php';?></div>
	<div id="Question_imc_104" data-options="handle:'#dragg_104'" align="center">
<div id="dragg_104" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/13
				<input type="button" style="width:120px;height:15px;background-color:#ccc" />
				<input type="button" style="width:110px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imc_12.php';?></div>
	<div id="Question_imc_105" data-options="handle:'#dragg_105'" align="center">
<div id="dragg_105" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°13/13
				<input type="button" style="width:130px;height:15px;background-color:#ccc" />
				<!--<input type="button" style="width:100px;height:15px;background-color:#efefef" />-->
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_imc_13.php';?></div>
<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_imc" data-options="handle:'#dragg_imc'" align="center">
<div id="dragg_imc" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleImmo/Immoc/form/Interface_f_Synthese.php';?></div>
<!--*******************************************************************************************************-->





<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_imc"><?php include 'cycleImmo/Immoc/sms/Message slide question terminer imc.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_imc"><?php include 'cycleImmo/Immoc/sms/messRetimc.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_imc"><?php include 'cycleImmo/Immoc/sms/Message terminer question imc.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_imc"><?php include 'cycleImmo/Immoc/sms/Message terminer synthese imc.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_imc"><?php include 'cycleImmo/Immoc/sms/Message slide imc Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_imc"><?php include 'cycleImmo/Immoc/sms/sms_empty/Mess_vide_synth_imc.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_imc"><?php include 'cycleImmo/Immoc/sms/Message donnees perdues imc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imc"><?php include 'cycleImmo/Immoc/sms/Message annulation question imc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imc2"><?php include 'cycleImmo/Immoc/sms/Message_enregistre_question_imc2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imc3"><?php include 'cycleImmo/Immoc/sms/Message_enregistre_question_imc3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imc4"><?php include 'cycleImmo/Immoc/sms/Message_enregistre_question_imc4.php';?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imc6"><?php include 'cycleImmo/Immoc/sms/Message_enregistre_question_imc6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imc7"><?php include 'cycleImmo/Immoc/sms/Message_enregistre_question_imc7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imc8"><?php include 'cycleImmo/Immoc/sms/Message_enregistre_question_imc8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imc9"><?php include 'cycleImmo/Immoc/sms/Message_enregistre_question_imc9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imc10"><?php include 'cycleImmo/Immoc/sms/Message_enregistre_question_imc10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imc11"><?php include 'cycleImmo/Immoc/sms/Message_enregistre_question_imc11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imc12"><?php include 'cycleImmo/Immoc/sms/Message_enregistre_question_imc12.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imc13"><?php include 'cycleImmo/Immoc/sms/Message_enregistre_question_imc13.php';?></div>
<!--*******************************************************************************************************-->


<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_imc1"><?php include 'cycleImmo/Immoc/sms/new 12.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_imc"><?php include 'cycleImmo/Immoc/sms/mess_vid_aud_imc.php'; ?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_imc5"><?php include 'cycleImmo/Immoc/sms/Message_enregistre_question_imc5.php';?></div>
<!--*******************************************************************************************************-->



</div>

