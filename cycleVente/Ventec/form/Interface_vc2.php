<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script>


$(function(){

	// Bouton retour menu achat
	$('#int_vc_Retour').click(function(){
		$('#message_fermeture_vc').show();
		$('#fancybox_vc').show();
	});
	//Con$tinuer la question
	$('#Int_vc_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_vc").value;
		$.ajax({
			type:'POST',
			url:'cycleVente/Ventec/php/aff_quest_fin_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==69){
					$('#message_Terminer_question_vc').show();
				}
				else if(e==1){
					$('#Question_vc_55').fadeIn(500);
				}
				else{
					quetion_vc="#Question_vc_"+e;
					$(quetion_vc).fadeIn(500);
				}
				$('#dv_table_vc').show();
				$('#lb_veuillez_aff_vc').hide();
				$('#fancybox_vc').show();
			}
		});
	});
	//la synthèse de c
	$('#Int_vc_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_vc").value;
		$.ajax({
			type:'POST',
			url:'cycleVente/Ventec/php/cpt_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==16){
					$.ajax({
						type:'POST',
						url:'cycleVente/Ventec/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:27},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("txt_Synthese_vc").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_vc_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_vc_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_vc_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_vc').show();
					$('#fancybox_vc').show();
				}
				else{
					$('#fancybox_vc').show();
					$('#mess_vide_obj_vc').show();
				}
			}
		});
	});
});
</script>

<div id="int_vc"><label class="lb_veuillez" id="lb_veuillez_aff_vc"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_vc" style="display:none;" />
	<div id="Interface_Question_vc"><?php include 'cycleVente/Ventec/load/load_quest_vc.php'; ?></div>
	<div id="dv_table_vc" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_vc">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_vc"></div>
	<div id="Int_Droite_vc">
		<input type="button" class="bouton" value="Retour" id="int_vc_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_vc_Continuer" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_vc_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_vc"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_vc_335" data-options="handle:'#dragg_335'" align="center">
<div id="dragg_335" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/16
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_vc_1.php';?></div>
	<div id="Question_vc_336" data-options="handle:'#dragg_336'" align="center">
<div id="dragg_336" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/16
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_vc_2.php';?></div>
	<div id="Question_vc_337" data-options="handle:'#dragg_337'" align="center">
<div id="dragg_337" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/16
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_3.php';?></div>
	<div id="Question_vc_338" data-options="handle:'#dragg_338'" align="center">
<div id="dragg_338" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/16
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_4.php';?></div>
	<div id="Question_vc_339" data-options="handle:'#dragg_339'" align="center">
<div id="dragg_339" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/16
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_5.php';?></div>
	<div id="Question_vc_340" data-options="handle:'#dragg_340'" align="center">
<div id="dragg_340" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/16
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_6.php';?></div>
	<div id="Question_vc_341" data-options="handle:'#dragg_341'" align="center">
<div id="dragg_341" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/16
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_7.php';?></div>
	<div id="Question_vc_342" data-options="handle:'#dragg_342'" align="center">
<div id="dragg_342" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/16
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_8.php';?></div>
	<div id="Question_vc_343" data-options="handle:'#dragg_343'" align="center">
<div id="dragg_343" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/16
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_9.php';?></div>
	<div id="Question_vc_344" data-options="handle:'#dragg_344'" align="center">
<div id="dragg_344" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/16
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_10.php';?></div>
	<div id="Question_vc_345" data-options="handle:'#dragg_345'" align="center">
<div id="dragg_345" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/16
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_11.php';?></div>
	<div id="Question_vc_346" data-options="handle:'#dragg_346'" align="center">
<div id="dragg_346" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/16
				<input type="button" style="width:120px;height:15px;background-color:#ccc" />
				<input type="button" style="width:110px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_12.php';?></div>
	<div id="Question_vc_347" data-options="handle:'#dragg_347'" align="center">
<div id="dragg_347" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°13/16
				<input type="button" style="width:130px;height:15px;background-color:#ccc" />
				<input type="button" style="width:100px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_13.php';?></div>
	<div id="Question_vc_348" data-options="handle:'#dragg_348'" align="center">
<div id="dragg_348" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°14/16
				<input type="button" style="width:140px;height:15px;background-color:#ccc" />
				<input type="button" style="width:90px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_14.php';?></div>
	<div id="Question_vc_349" data-options="handle:'#dragg_349'" align="center">
<div id="dragg_349" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°15/16
				<input type="button" style="width:150px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_15.php';?></div>

	<div id="Question_vc_350" data-options="handle:'#dragg_350'" align="center">
<div id="dragg_350" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°16/16
				<input type="button" style="width:180px;height:15px;background-color:#ccc" />
				<input type="button" style="width:50px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_16.php';?></div>

<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_vc" data-options="handle:'#dragg_vc'" align="center">
<div id="dragg_vc" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleVente/Ventec/form/Interface_f_Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_vc"><?php include 'cycleVente/Ventec/sms/Message slide question terminer vc.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_vc"><?php include 'cycleVente/Ventec/sms/messRetvc.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_vc"><?php include 'cycleVente/Ventec/sms/Message terminer question vc.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_vc"><?php include 'cycleVente/Ventec/sms/Message terminer synthese vc.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_vc"><?php include 'cycleVente/Ventec/sms/Message slide vc Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_vc"><?php include 'cycleVente/Ventec/sms/sms_empty/Mess_vide_synth_vc.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_vc"><?php include 'cycleVente/Ventec/sms/Message donnees perdues vc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc"><?php include 'cycleVente/Ventec/sms/Message annulation question vc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc2"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc3"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc4"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc4.php';?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc6"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc7"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc8"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc9"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc10"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc11"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc12"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc12.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc13"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc13.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc14"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc14.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc15"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc15.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc16"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc16.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<!--*******************************************************************************************************-->

<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_vc1"><?php include 'cycleVente/Ventec/sms/new 12.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_vc"><?php include 'cycleVente/Ventec/sms/mess_vid_aud_vc.php'; ?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc5"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc5.php';?></div>
<!--*******************************************************************************************************-->



</div>

