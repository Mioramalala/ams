<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script>


$(function(){

	// Bouton retour menu achat
	$('#int_re_Retour').click(function(){
		$('#message_fermeture_re').show();
		$('#fancybox_re').show();
	});
	//Con$tinuer la question
	$('#Int_re_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_re").value;
		$.ajax({
			type:'POST',
			url:'cycleRecette/Recettee/php/aff_quest_fin_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==69){
					$('#message_Terminer_question_re').show();
				}
				else if(e==1){
					$('#Question_re_55').fadeIn(500);
				}
				else{
					quetion_re="#Question_re_"+e;
					$(quetion_re).fadeIn(500);
				}
				$('#dv_table_re').show();
				$('#lb_veuillez_aff_re').hide();
				$('#fancybox_re').show();
			}
		});
	});
	//la synthèse de c
	$('#Int_re_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_re").value;
		$.ajax({
			type:'POST',
			url:'cycleRecette/Recettee/php/cpt_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==9){
					$.ajax({
						type:'POST',
						url:'cycleRecette/Recettee/php/getSynth.php',
						data:{mission_id:mission_id, cycle_achat_id:21},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("txt_Synthese_re").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("re_Synthese_re_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("re_Synthese_re_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("re_Synthese_re_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_re').show();
					$('#fancybox_re').show();
				}
				else{
					$('#fancybox_re').show();
					$('#mess_vide_obj_re').show();
				}
			}
		});
	});
});
</script>

<div id="int_re"><label class="lb_veuillez" id="lb_veuillez_aff_re"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_re" style="display:none;" />
	<div id="Interface_Question_re"><?php include 'cycleRecette/Recettee/load/load_quest_re.php'; ?></div>
	<div id="dv_table_re" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_re">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_re"></div>
	<div id="Int_Droite_re">
		<input type="button" class="bouton" value="Retour" id="int_re_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_re_Continuer" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_re_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_re"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_re_273" data-options="handle:'#dragg_273'" align="center">
<div id="dragg_273" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/07
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_re_1.php';?></div>
	<div id="Question_re_274" data-options="handle:'#dragg_274'" align="center">
<div id="dragg_274" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/07
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_re_2.php';?></div>
	<div id="Question_re_275" data-options="handle:'#dragg_275'" align="center">
<div id="dragg_275" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/07
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_re_3.php';?></div>
	<div id="Question_re_276" data-options="handle:'#dragg_276'" align="center">
<div id="dragg_276" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/07
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_re_4.php';?></div>
	<div id="Question_re_277" data-options="handle:'#dragg_277'" align="center">
<div id="dragg_277" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/07
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_re_5.php';?></div>
	<div id="Question_re_278" data-options="handle:'#dragg_278'" align="center">
<div id="dragg_278" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/07
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_re_6.php';?></div>
	<div id="Question_re_279" data-options="handle:'#dragg_279'" align="center">
<div id="dragg_279" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/07
				<input type="button" style="width:150px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_re_7.php';?></div>


<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_re" data-options="handle:'#dragg_re'" align="center">
<div id="dragg_re" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleRecette/Recettee/form/Interface_f_Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_re"><?php include 'cycleRecette/Recettee/sms/Message slide question terminer re.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_re"><?php include 'cycleRecette/Recettee/sms/messrctre.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_re"><?php include 'cycleRecette/Recettee/sms/Message terminer question re.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_re"><?php include 'cycleRecette/Recettee/sms/Message terminer synthese re.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_re"><?php include 'cycleRecette/Recettee/sms/Message slide re Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_re"><?php include 'cycleRecette/Recettee/sms/sms_empty/Mess_vide_synth_re.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Pereu_re"><?php include 'cycleRecette/Recettee/sms/Message donnees perdues re.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_re"><?php include 'cycleRecette/Recettee/sms/Message annulation question re.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_re2"><?php include 'cycleRecette/Recettee/sms/Message_enregistre_question_re2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_re3"><?php include 'cycleRecette/Recettee/sms/Message_enregistre_question_re3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_re4"><?php include 'cycleRecette/Recettee/sms/Message_enregistre_question_re4.php';?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_re6"><?php include 'cycleRecette/Recettee/sms/Message_enregistre_question_re6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_re7"><?php include 'cycleRecette/Recettee/sms/Message_enregistre_question_re7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_re8"><?php include 'cycleRecette/Recettee/sms/Message_enregistre_question_re8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_re7"><?php include 'cycleRecette/Recettee/sms/Message_enregistre_question_re7.php';?></div>
<!--*******************************************************************************************************-->

<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_re1"><?php include 'cycleRecette/Recettee/sms/new 12.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_re"><?php include 'cycleRecette/Recettee/sms/mess_vid_aud_re.php'; ?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_re5"><?php include 'cycleRecette/Recettee/sms/Message_enregistre_question_re5.php';?></div>
<!--*******************************************************************************************************-->



</div>

