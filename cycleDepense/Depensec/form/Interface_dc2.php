<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script>


$(function(){

	// Bouton retour menu achat
	$('#int_dc_Retour').click(function(){
		$('#message_fermeture_dc').show();
		$('#fancybox_dc').show();
	});
	//Con$tinuer la question
	$('#Int_dc_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_dc").value;
		$.ajax({
			type:'POST',
			url:'cycleDepense/Depensec/php/aff_quest_fin_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==69){
					$('#message_Terminer_question_dc').show();
				}
				else if(e==1){
					$('#Question_dc_55').fadeIn(500);
				}
				else{
					quetion_dc="#Question_dc_"+e;
					$(quetion_dc).fadeIn(500);
				}
				$('#dv_table_dc').show();
				$('#lb_veuillez_aff_dc').hide();
				$('#fancybox_dc').show();
			}
		});
	});
	//la synthèse de c
	$('#Int_dc_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_dc").value;
		$.ajax({
			type:'POST',
			url:'cycleDepense/Depensec/php/cpt_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==9){
					$.ajax({
						type:'POST',
						url:'cycleDepense/Depensec/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:23},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("txt_Synthese_dc").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_dc_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_dc_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_dc_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_dc').show();
					$('#fancybox_dc').show();
				}
				else{
					$('#fancybox_dc').show();
					$('#mess_vide_obj_dc').show();
				}
			}
		});
	});
});
</script>

<div id="int_dc"><label class="lb_veuillez" id="lb_veuillez_aff_dc"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_dc" style="display:none;" />
	<div id="Interface_Question_dc"><?php include 'cycleDepense/Depensec/load/load_quest_dc.php'; ?></div>
	<div id="dv_table_dc" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_dc">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_dc"></div>
	<div id="Int_Droite_dc">
		<input type="button" class="bouton" value="Retour" id="int_dc_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_dc_Continuer" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_dc_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_dc"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_dc_295" data-options="handle:'#dragg_295'" align="center">
<div id="dragg_295" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/09
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_dc_1.php';?></div>
	<div id="Question_dc_296" data-options="handle:'#dragg_296'" align="center">
<div id="dragg_296" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/09
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_dc_2.php';?></div>
	<div id="Question_dc_297" data-options="handle:'#dragg_297'" align="center">
<div id="dragg_297" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/09
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dc_3.php';?></div>
	<div id="Question_dc_298" data-options="handle:'#dragg_298'" align="center">
<div id="dragg_298" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/09
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dc_4.php';?></div>
	<div id="Question_dc_299" data-options="handle:'#dragg_299'" align="center">
<div id="dragg_299" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/09
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dc_5.php';?></div>
	<div id="Question_dc_300" data-options="handle:'#dragg_300'" align="center">
<div id="dragg_300" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/09
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dc_6.php';?></div>
	<div id="Question_dc_301" data-options="handle:'#dragg_301'" align="center">
<div id="dragg_301" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/09
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dc_7.php';?></div>
	<div id="Question_dc_302" data-options="handle:'#dragg_302'" align="center">
<div id="dragg_302" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/09
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dc_8.php';?></div>
	<div id="Question_dc_303" data-options="handle:'#dragg_303'" align="center">
<div id="dragg_303" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/09
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dc_9.php';?></div>
<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_dc" data-options="handle:'#dragg_dc'" align="center">
<div id="dragg_dc" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleDepense/Depensec/form/Interface_f_Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_dc"><?php include 'cycleDepense/Depensec/sms/Message slide question terminer dc.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_dc"><?php include 'cycleDepense/Depensec/sms/messRetdc.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_dc"><?php include 'cycleDepense/Depensec/sms/Message terminer question dc.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_dc"><?php include 'cycleDepense/Depensec/sms/Message terminer synthese dc.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_dc"><?php include 'cycleDepense/Depensec/sms/Message slide dc Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_dc"><?php include 'cycleDepense/Depensec/sms/sms_empty/Mess_vide_synth_dc.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_dc"><?php include 'cycleDepense/Depensec/sms/Message donnees perdues dc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dc"><?php include 'cycleDepense/Depensec/sms/Message annulation question dc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dc2"><?php include 'cycleDepense/Depensec/sms/Message_enregistre_question_dc2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dc3"><?php include 'cycleDepense/Depensec/sms/Message_enregistre_question_dc3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dc4"><?php include 'cycleDepense/Depensec/sms/Message_enregistre_question_dc4.php';?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dc6"><?php include 'cycleDepense/Depensec/sms/Message_enregistre_question_dc6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dc7"><?php include 'cycleDepense/Depensec/sms/Message_enregistre_question_dc7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dc8"><?php include 'cycleDepense/Depensec/sms/Message_enregistre_question_dc8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dc9"><?php include 'cycleDepense/Depensec/sms/Message_enregistre_question_dc9.php';?></div>
<!--*******************************************************************************************************-->


<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_dc1"><?php include 'cycleDepense/Depensec/sms/new 12.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_dc"><?php include 'cycleDepense/Depensec/sms/mess_vid_aud_dc.php'; ?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dc5"><?php include 'cycleDepense/Depensec/sms/Message_enregistre_question_dc5.php';?></div>
<!--*******************************************************************************************************-->



</div>

