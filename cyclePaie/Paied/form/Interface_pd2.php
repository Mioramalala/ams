<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script>


$(function(){

	// Bouton retour menu achat
	$('#int_pd_Retour').click(function(){
		$('#message_fermeture_pd').show();
		$('#fancybox_pd').show();
	});
	//Con$tinuer la question
	$('#Int_pd_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_pd").value;
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paied/php/aff_quest_fin_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==69){
					$('#message_Terminer_question_pd').show();
				}
				else if(e==1){
					$('#Question_pd_55').fadeIn(500);
				}
				else{
					quetion_pd="#Question_pd_"+e;
					$(quetion_pd).fadeIn(500);
				}
				$('#dv_table_pd').show();
				$('#lb_veuillez_aff_pd').hide();
				$('#fancybox_pd').show();
			}
		});
	});
	//la synthèse de c
	$('#Int_pd_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_pd").value;
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paied/php/cpt_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==5){
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paied/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:16},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("txt_Synthese_pd").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_pd_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_pd_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_pd_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_pd').show();
					$('#fancybox_pd').show();
				}
				else{
					$('#fancybox_pd').show();
					$('#mess_vide_obj_pd').show();
				}
			}
		});
	});
});
</script>

<div id="int_pd"><label class="lb_veuillez" id="lb_veuillez_aff_pd"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_pd" style="display:none;" />
	<div id="Interface_Question_pd"><?php include 'cyclePaie/Paied/load/load_quest_pd.php'; ?></div>
	<div id="dv_table_pd" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_pd">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_pd"></div>
	<div id="Int_Droite_pd">
		<input type="button" class="bouton" value="Retour" id="int_pd_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_pd_Continuer" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_pd_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_pd"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_pd_222" data-options="handle:'#dragg_222'" align="center">
<div id="dragg_222" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/15
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_pd_1.php';?></div>
	<div id="Question_pd_223" data-options="handle:'#dragg_223'" align="center">
<div id="dragg_223" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/15
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_pd_2.php';?></div>
	<div id="Question_pd_224" data-options="handle:'#dragg_224'" align="center">
<div id="dragg_224" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/15
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pd_3.php';?></div>
	<div id="Question_pd_225" data-options="handle:'#dragg_225'" align="center">
<div id="dragg_225" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/15
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pd_4.php';?></div>
	<div id="Question_pd_226" data-options="handle:'#dragg_226'" align="center">
<div id="dragg_226" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/15
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pd_5.php';?></div>
	<div id="Question_pd_186" data-options="handle:'#dragg_186'" align="center">
<div id="dragg_186" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/15
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pd_6.php';?></div>
	<div id="Question_pd_187" data-options="handle:'#dragg_187'" align="center">
<div id="dragg_187" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/15
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pd_7.php';?></div>
	<div id="Question_pd_188" data-options="handle:'#dragg_188'" align="center">
<div id="dragg_188" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/15
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pd_8.php';?></div>
	<div id="Question_pd_189" data-options="handle:'#dragg_189'" align="center">
<div id="dragg_189" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/15
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pd_9.php';?></div>
	<div id="Question_pd_190" data-options="handle:'#dragg_190'" align="center">
<div id="dragg_190" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/15
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pd_10.php';?></div>
	<div id="Question_pd_191" data-options="handle:'#dragg_191'" align="center">
<div id="dragg_191" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/15
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pd_11.php';?></div>
	<div id="Question_pd_192" data-options="handle:'#dragg_192'" align="center">
<div id="dragg_192" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/15
				<input type="button" style="width:120px;height:15px;background-color:#ccc" />
				<input type="button" style="width:110px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pd_12.php';?></div>
	<div id="Question_pd_193" data-options="handle:'#dragg_193'" align="center">
<div id="dragg_193" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°13/15
				<input type="button" style="width:130px;height:15px;background-color:#ccc" />
				<input type="button" style="width:100px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pd_13.php';?></div>
	<div id="Question_pd_194" data-options="handle:'#dragg_194'" align="center">
<div id="dragg_194" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°14/15
				<input type="button" style="width:140px;height:15px;background-color:#ccc" />
				<input type="button" style="width:90px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pd_14.php';?></div>
	<div id="Question_pd_195" data-options="handle:'#dragg_195'" align="center">
<div id="dragg_195" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°15/15
				<input type="button" style="width:150px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pd_15.php';?></div>


<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_pd" data-options="handle:'#dragg_pd'" align="center">
<div id="dragg_pd" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cyclePaie/Paied/form/Interface_f_Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_pd"><?php include 'cyclePaie/Paied/sms/Message slide question terminer pd.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_pd"><?php include 'cyclePaie/Paied/sms/messRetpd.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_pd"><?php include 'cyclePaie/Paied/sms/Message terminer question pd.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_pd"><?php include 'cyclePaie/Paied/sms/Message terminer synthese pd.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_pd"><?php include 'cyclePaie/Paied/sms/Message slide pd Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_pd"><?php include 'cyclePaie/Paied/sms/sms_empty/Mess_vide_synth_pd.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_pd"><?php include 'cyclePaie/Paied/sms/Message donnees perdues pd.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pd"><?php include 'cyclePaie/Paied/sms/Message annulation question pd.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pd2"><?php include 'cyclePaie/Paied/sms/Message_enregistre_question_pd2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pd3"><?php include 'cyclePaie/Paied/sms/Message_enregistre_question_pd3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pd4"><?php include 'cyclePaie/Paied/sms/Message_enregistre_question_pd4.php';?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pd6"><?php include 'cyclePaie/Paied/sms/Message_enregistre_question_pd6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pd7"><?php include 'cyclePaie/Paied/sms/Message_enregistre_question_pd7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pd8"><?php include 'cyclePaie/Paied/sms/Message_enregistre_question_pd8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pd9"><?php include 'cyclePaie/Paied/sms/Message_enregistre_question_pd9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pd10"><?php include 'cyclePaie/Paied/sms/Message_enregistre_question_pd10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pd11"><?php include 'cyclePaie/Paied/sms/Message_enregistre_question_pd11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pd12"><?php include 'cyclePaie/Paied/sms/Message_enregistre_question_pd12.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pd13"><?php include 'cyclePaie/Paied/sms/Message_enregistre_question_pd13.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pd14"><?php include 'cyclePaie/Paied/sms/Message_enregistre_question_pd14.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pd15"><?php include 'cyclePaie/Paied/sms/Message_enregistre_question_pd15.php';?></div>
<!--*******************************************************************************************************-->
<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_pd1"><?php include 'cyclePaie/Paied/sms/new 12.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_pd"><?php include 'cyclePaie/Paied/sms/mess_vid_aud_pd.php'; ?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pd5"><?php include 'cyclePaie/Paied/sms/Message_enregistre_question_pd5.php';?></div>
<!--*******************************************************************************************************-->



</div>

