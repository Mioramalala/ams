<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script>


$(function(){

	// Bouton retour menu achat
	$('#int_dd_Retour').click(function(){
		$('#message_fermeture_dd').show();
		$('#fancybox_dd').show();
	});
	//Con$tinuer la question
	$('#Int_dd_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_dd").value;
		$.ajax({
			type:'POST',
			url:'cycleDepense/Depensed/php/aff_quest_fin_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==69){
					$('#message_Terminer_question_dd').show();
				}
				else if(e==1){
					$('#Question_dd_55').fadeIn(500);
				}
				else{
					quetion_dd="#Question_dd_"+e;
					$(quetion_dd).fadeIn(500);
				}
				$('#dv_table_dd').show();
				$('#lb_veuillez_aff_dd').hide();
				$('#fancybox_dd').show();
			}
		});
	});
	//la synthèse de c
	$('#Int_dd_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_dd").value;
		$.ajax({
			type:'POST',
			url:'cycleDepense/Depensed/php/cpt_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==8){
					$.ajax({
						type:'POST',
						url:'cycleDepense/Depensed/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:24},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("txt_Synthese_dd").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_dd_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_dd_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_dd_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_dd').show();
					$('#fancybox_dd').show();
				}
				else{
					$('#fancybox_dd').show();
					$('#mess_vide_obj_dd').show();
				}
			}
		});
	});
});
</script>

<div id="int_dd"><label class="lb_veuillez" id="lb_veuillez_aff_dd"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_dd" style="display:none;" />
	<div id="Interface_Question_dd"><?php include 'cycleDepense/Depensed/load/load_quest_dd.php'; ?></div>
	<div id="dv_table_dd" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_dd">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_dd"></div>
	<div id="Int_Droite_dd">
		<input type="button" class="bouton" value="Retour" id="int_dd_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_dd_Continuer" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_dd_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_dd"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_dd_304" data-options="handle:'#dragg_304'" align="center">
<div id="dragg_304" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/08
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_dd_1.php';?></div>
	<div id="Question_dd_305" data-options="handle:'#dragg_305'" align="center">
<div id="dragg_305" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/08
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_dd_2.php';?></div>
	<div id="Question_dd_306" data-options="handle:'#dragg_306'" align="center">
<div id="dragg_306" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/08
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dd_3.php';?></div>
	<div id="Question_dd_307" data-options="handle:'#dragg_307'" align="center">
<div id="dragg_307" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/08
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dd_4.php';?></div>
	<div id="Question_dd_308" data-options="handle:'#dragg_308'" align="center">
<div id="dragg_308" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/08
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dd_5.php';?></div>
	<div id="Question_dd_309" data-options="handle:'#dragg_309'" align="center">
<div id="dragg_309" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/08
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dd_6.php';?></div>
	<div id="Question_dd_310" data-options="handle:'#dragg_310'" align="center">
<div id="dragg_310" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/08
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dd_7.php';?></div>
	<div id="Question_dd_311" data-options="handle:'#dragg_311'" align="center">
<div id="dragg_311" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°08/08
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_dd_8.php';?></div>
<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_dd" data-options="handle:'#dragg_dd'" align="center">
<div id="dragg_dd" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleDepense/Depensed/form/Interface_f_Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_dd"><?php include 'cycleDepense/Depensed/sms/Message slide question terminer dd.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_dd"><?php include 'cycleDepense/Depensed/sms/messRetdd.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_dd"><?php include 'cycleDepense/Depensed/sms/Message terminer question dd.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_dd"><?php include 'cycleDepense/Depensed/sms/Message terminer synthese dd.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_dd"><?php include 'cycleDepense/Depensed/sms/Message slide dd Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_dd"><?php include 'cycleDepense/Depensed/sms/sms_empty/Mess_vide_synth_dd.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_dd"><?php include 'cycleDepense/Depensed/sms/Message donnees perdues dd.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dd"><?php include 'cycleDepense/Depensed/sms/Message annulation question dd.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dd2"><?php include 'cycleDepense/Depensed/sms/Message_enregistre_question_dd2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dd3"><?php include 'cycleDepense/Depensed/sms/Message_enregistre_question_dd3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dd4"><?php include 'cycleDepense/Depensed/sms/Message_enregistre_question_dd4.php';?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dd6"><?php include 'cycleDepense/Depensed/sms/Message_enregistre_question_dd6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dd7"><?php include 'cycleDepense/Depensed/sms/Message_enregistre_question_dd7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dd8"><?php include 'cycleDepense/Depensed/sms/Message_enregistre_question_dd8.php';?></div>
<!--*******************************************************************************************************-->

<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_dd1"><?php include 'cycleDepense/Depensed/sms/new 12.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_dd"><?php include 'cycleDepense/Depensed/sms/mess_vid_aud_dd.php'; ?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_dd5"><?php include 'cycleDepense/Depensed/sms/Message_enregistre_question_dd5.php';?></div>
<!--*******************************************************************************************************-->



</div>

