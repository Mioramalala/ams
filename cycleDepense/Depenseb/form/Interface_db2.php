<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script>


$(function(){

	// Bouton retour menu achat
	$('#int_db_Retour').click(function(){
		$('#message_fermeture_db').show();
		$('#fancybox_db').show();
	});
	//Con$tinuer la question
	$('#Int_db_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_db").value;
		$.ajax({
			type:'POST',
			url:'cycleDepense/Depenseb/php/aff_quest_fin_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==69){
					$('#message_Terminer_question_db').show();
				}
				else if(e==1){
					$('#Question_db_55').fadeIn(500);
				}
				else{
					quetion_db="#Question_db_"+e;
					$(quetion_db).fadeIn(500);
				}
				$('#dv_table_db').show();
				$('#lb_veuillez_aff_db').hide();
				$('#fancybox_db').show();
			}
		});
	});
	//la synthèse de c
	$('#Int_db_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_db").value;
		$.ajax({
			type:'POST',
			url:'cycleDepense/Depenseb/php/cpt_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==15){
					$.ajax({
						type:'POST',
						url:'cycleDepense/Depenseb/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:22},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("txt_Synthese_db").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_db_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_db_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_db_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_db').show();
					$('#fancybox_db').show();
				}
				else{
					$('#fancybox_db').show();
					$('#mess_vide_obj_db').show();
				}
			}
		});
	});
});
</script>

<div id="int_db"><label class="lb_veuillez" id="lb_veuillez_aff_db"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_db" style="display:none;" />
	<div id="Interface_Question_db"><?php include 'cycleDepense/Depenseb/load/load_quest_db.php'; ?></div>
	<div id="dv_table_db" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_db">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_db"></div>
	<div id="Int_Droite_db">
		<input type="button" class="bouton" value="Retour" id="int_db_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_db_Continuer" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_db_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_db"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_db_280" data-options="handle:'#dragg_280'" align="center">
<div id="dragg_280" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/15
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_db_1.php';?></div>
	<div id="Question_db_281" data-options="handle:'#dragg_281'" align="center">
<div id="dragg_281" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/15
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_db_2.php';?></div>
	<div id="Question_db_282" data-options="handle:'#dragg_282'" align="center">
<div id="dragg_282" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/15
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_db_3.php';?></div>
	<div id="Question_db_283" data-options="handle:'#dragg_283'" align="center">
<div id="dragg_283" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/15
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_db_4.php';?></div>
	<div id="Question_db_284" data-options="handle:'#dragg_284'" align="center">
<div id="dragg_284" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/15
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_db_5.php';?></div>
	<div id="Question_db_285" data-options="handle:'#dragg_285'" align="center">
<div id="dragg_285" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/15
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_db_6.php';?></div>
	<div id="Question_db_286" data-options="handle:'#dragg_286'" align="center">
<div id="dragg_286" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/15
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_db_7.php';?></div>
	<div id="Question_db_287" data-options="handle:'#dragg_287'" align="center">
<div id="dragg_287" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/15
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_db_8.php';?></div>
	<div id="Question_db_288" data-options="handle:'#dragg_288'" align="center">
<div id="dragg_288" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/15
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_db_9.php';?></div>
	<div id="Question_db_289" data-options="handle:'#dragg_289'" align="center">
<div id="dragg_289" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/15
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_db_10.php';?></div>
	<div id="Question_db_290" data-options="handle:'#dragg_290'" align="center">
<div id="dragg_290" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/15
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_db_11.php';?></div>
	<div id="Question_db_291" data-options="handle:'#dragg_291'" align="center">
<div id="dragg_291" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/15
				<input type="button" style="width:120px;height:15px;background-color:#ccc" />
				<input type="button" style="width:110px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_db_12.php';?></div>
	<div id="Question_db_292" data-options="handle:'#dragg_292'" align="center">
<div id="dragg_292" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°13/15
				<input type="button" style="width:165px;height:15px;background-color:#ccc" />
				<input type="button" style="width:100px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_db_13.php';?></div>
	<div id="Question_db_293" data-options="handle:'#dragg_293'" align="center">
<div id="dragg_293" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°14/15
				<input type="button" style="width:140px;height:15px;background-color:#ccc" />
				<input type="button" style="width:90px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_db_14.php';?></div>
	
			<div id="Question_db_294" data-options="handle:'#dragg_294'" align="center">
<div id="dragg_294" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°15/15
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_db_15.php';?></div>
<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_db" data-options="handle:'#dragg_db'" align="center">
<div id="dragg_db" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleDepense/Depenseb/form/Interface_f_Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_db"><?php include 'cycleDepense/Depenseb/sms/Message slide question terminer db.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_db"><?php include 'cycleDepense/Depenseb/sms/messRetdb.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_db"><?php include 'cycleDepense/Depenseb/sms/Message terminer question db.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_db"><?php include 'cycleDepense/Depenseb/sms/Message terminer synthese db.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_db"><?php include 'cycleDepense/Depenseb/sms/Message slide db Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_db"><?php include 'cycleDepense/Depenseb/sms/sms_empty/Mess_vide_synth_db.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_db"><?php include 'cycleDepense/Depenseb/sms/Message donnees perdues db.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_db"><?php include 'cycleDepense/Depenseb/sms/Message annulation question db.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_db2"><?php include 'cycleDepense/Depenseb/sms/Message_enregistre_question_db2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_db3"><?php include 'cycleDepense/Depenseb/sms/Message_enregistre_question_db3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_db4"><?php include 'cycleDepense/Depenseb/sms/Message_enregistre_question_db4.php';?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_db6"><?php include 'cycleDepense/Depenseb/sms/Message_enregistre_question_db6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_db7"><?php include 'cycleDepense/Depenseb/sms/Message_enregistre_question_db7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_db8"><?php include 'cycleDepense/Depenseb/sms/Message_enregistre_question_db8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_db9"><?php include 'cycleDepense/Depenseb/sms/Message_enregistre_question_db9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_db10"><?php include 'cycleDepense/Depenseb/sms/Message_enregistre_question_db10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_db11"><?php include 'cycleDepense/Depenseb/sms/Message_enregistre_question_db11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_db12"><?php include 'cycleDepense/Depenseb/sms/Message_enregistre_question_db12.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_db13"><?php include 'cycleDepense/Depenseb/sms/Message_enregistre_question_db13.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_db14"><?php include 'cycleDepense/Depenseb/sms/Message_enregistre_question_db14.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_db15"><?php include 'cycleDepense/Depenseb/sms/Message_enregistre_question_db15.php';?></div>
<!--*******************************************************************************************************-->


<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_db1"><?php include 'cycleDepense/Depenseb/sms/new 12.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_db"><?php include 'cycleDepense/Depenseb/sms/mess_vid_aud_db.php'; ?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_db5"><?php include 'cycleDepense/Depenseb/sms/Message_enregistre_question_db5.php';?></div>
<!--*******************************************************************************************************-->



</div>

