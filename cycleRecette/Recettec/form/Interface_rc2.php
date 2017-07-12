<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script>


$(function(){

	// Bouton retour menu achat
	$('#int_rc_Retour').click(function(){
		$('#message_fermeture_rc').show();
		$('#fancybox_rc').show();
	});
	//Con$tinuer la question
	$('#Int_rc_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_rc").value;
		$.ajax({
			type:'POST',
			url:'cycleRecette/Recettec/php/aff_quest_fin_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==69){
					$('#message_Terminer_question_rc').show();
				}
				else if(e==1){
					$('#Question_rc_55').fadeIn(500);
				}
				else{
					quetion_rc="#Question_rc_"+e;
					$(quetion_rc).fadeIn(500);
				}
				$('#dv_table_rc').show();
				$('#lb_veuillez_aff_rc').hide();
				$('#fancybox_rc').show();
			}
		});
	});
	//la synthèse de c
	$('#Int_rc_Synthese').click(function(){	

		mission_id=document.getElementById("txt_mission_id_rc").value;
		$.ajax({
			type:'POST',
			url:'cycleRecette/Recettec/php/cpt_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==9){
					$.ajax({
						type:'POST',
						url:'cycleRecette/Recettec/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:19},
						success:function(e){
							eo=""+e+"";
							
							doc=eo.split('*');
							document.getElementById("txt_Synthese_rc").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rc_Synthese_rc_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rc_Synthese_rc_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rc_Synthese_rc_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_rc').show();
					$('#fancybox_rc').show();
				}
				else{
					$('#fancybox_rc').show();
					$('#mess_vide_obj_rc').show();
				}
			}
		});
	});
});
</script>

<div id="int_rc"><label class="lb_veuillez" id="lb_veuillez_aff_rc"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_rc" style="display:none;" />
	<div id="Interface_Question_rc"><?php include 'cycleRecette/Recettec/load/load_quest_rc.php'; ?></div>
	<div id="dv_table_rc" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_rc">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_rc"></div>
	<div id="Int_Droite_rc">
		<input type="button" class="bouton" value="Retour" id="int_rc_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_rc_Continuer" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_rc_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_rc"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_rc_255" data-options="handle:'#dragg_255'" align="center">
<div id="dragg_255" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/09
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_rc_1.php';?></div>
	<div id="Question_rc_256" data-options="handle:'#dragg_256'" align="center">
<div id="dragg_256" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/09
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_rc_2.php';?></div>
	<div id="Question_rc_257" data-options="handle:'#dragg_257'" align="center">
<div id="dragg_257" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/09
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rc_3.php';?></div>
	<div id="Question_rc_258" data-options="handle:'#dragg_258'" align="center">
<div id="dragg_258" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/09
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rc_4.php';?></div>
	<div id="Question_rc_259" data-options="handle:'#dragg_259'" align="center">
<div id="dragg_259" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/09
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rc_5.php';?></div>
	<div id="Question_rc_260" data-options="handle:'#dragg_260'" align="center">
<div id="dragg_260" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/09
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rc_6.php';?></div>
	<div id="Question_rc_261" data-options="handle:'#dragg_261'" align="center">
<div id="dragg_261" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/09
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rc_7.php';?></div>
	<div id="Question_rc_262" data-options="handle:'#dragg_262'" align="center">
<div id="dragg_262" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/09
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rc_8.php';?></div>
	<div id="Question_rc_263" data-options="handle:'#dragg_263'" align="center">
<div id="dragg_263" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/09
				<input type="button" style="width:150px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rc_9.php';?></div>


<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_rc" data-options="handle:'#dragg_rc'" align="center">
<div id="dragg_rc" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleRecette/Recettec/form/Interface_f_Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_rc"><?php include 'cycleRecette/Recettec/sms/Message slide question terminer rc.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_rc"><?php include 'cycleRecette/Recettec/sms/messRetrc.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_rc"><?php include 'cycleRecette/Recettec/sms/Message terminer question rc.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_rc"><?php include 'cycleRecette/Recettec/sms/Message terminer synthese rc.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_rc"><?php include 'cycleRecette/Recettec/sms/Message slide rc Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_rc"><?php include 'cycleRecette/Recettec/sms/sms_empty/Mess_vide_synth_rc.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Percu_rc"><?php include 'cycleRecette/Recettec/sms/Message donnees perdues rc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rc"><?php include 'cycleRecette/Recettec/sms/Message annulation question rc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rc2"><?php include 'cycleRecette/Recettec/sms/Message_enregistre_question_rc2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rc3"><?php include 'cycleRecette/Recettec/sms/Message_enregistre_question_rc3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rc4"><?php include 'cycleRecette/Recettec/sms/Message_enregistre_question_rc4.php';?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rc6"><?php include 'cycleRecette/Recettec/sms/Message_enregistre_question_rc6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rc7"><?php include 'cycleRecette/Recettec/sms/Message_enregistre_question_rc7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rc8"><?php include 'cycleRecette/Recettec/sms/Message_enregistre_question_rc8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rc9"><?php include 'cycleRecette/Recettec/sms/Message_enregistre_question_rc9.php';?></div>
<!--*******************************************************************************************************-->

<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_rc1"><?php include 'cycleRecette/Recettec/sms/new 12.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_rc"><?php include 'cycleRecette/Recettec/sms/mess_vid_aud_rc.php'; ?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rc5"><?php include 'cycleRecette/Recettec/sms/Message_enregistre_question_rc5.php';?></div>
<!--*******************************************************************************************************-->



</div>

