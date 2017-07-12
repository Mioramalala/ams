<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script>


$(function(){

	// Bouton retour menu achat
	$('#int_ve_Retour').click(function(){
		$('#message_fermeture_ve').show();
		$('#fancybox_ve').show();
	});
	//Con$tinuer la question
	$('#Int_ve_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_ve").value;
		$.ajax({
			type:'POST',
			url:'cycleVente/Ventee/php/aff_quest_fin_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==69){
					$('#message_Terminer_question_ve').show();
				}
				else if(e==1){
					$('#Question_ve_55').fadeIn(500);
				}
				else{
					quetion_ve="#Question_ve_"+e;
					$(quetion_ve).fadeIn(500);
				}
				$('#dv_table_ve').show();
				$('#lb_veuillez_aff_ve').hide();
				$('#fancybox_ve').show();
			}
		});
	});
	//la synthèse de c
	$('#Int_ve_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_ve").value;
		$.ajax({
			type:'POST',
			url:'cycleVente/Ventee/php/cpt_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==7){
					$.ajax({
						type:'POST',
						url:'cycleVente/Ventee/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:29},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("txt_Synthese_ve").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_ve_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_ve_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_ve_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_ve').show();
					$('#fancybox_ve').show();
				}
				else{
					$('#fancybox_ve').show();
					$('#mess_vide_obj_ve').show();
				}
			}
		});
	});
});
</script>

<div id="int_ve"><label class="lb_veuillez" id="lb_veuillez_aff_ve"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_ve" style="display:none;" />
	<div id="Interface_Question_ve"><?php include 'cycleVente/Ventee/load/load_quest_ve.php'; ?></div>
	<div id="dv_table_ve" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_ve">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_ve"></div>
	<div id="Int_Droite_ve">
		<input type="button" class="bouton" value="Retour" id="int_ve_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_ve_Continuer" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_ve_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_ve"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_ve_386" data-options="handle:'#dragg_386'" align="center">
<div id="dragg_386" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/7
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_ve_1.php';?></div>
	<div id="Question_ve_387" data-options="handle:'#dragg_387'" align="center">
<div id="dragg_387" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/7
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_ve_2.php';?></div>
	<div id="Question_ve_388" data-options="handle:'#dragg_388'" align="center">
<div id="dragg_388" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/7
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ve_3.php';?></div>
	<div id="Question_ve_389" data-options="handle:'#dragg_389'" align="center">
<div id="dragg_389" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/7
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ve_4.php';?></div>
	<div id="Question_ve_390" data-options="handle:'#dragg_390'" align="center">
<div id="dragg_390" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/7
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ve_5.php';?></div>
	<div id="Question_ve_391" data-options="handle:'#dragg_391'" align="center">
<div id="dragg_391" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/7
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ve_6.php';?></div>
	<div id="Question_ve_392" data-options="handle:'#dragg_392'" align="center">
<div id="dragg_392" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/7
				<input type="button" style="width:180px;height:15px;background-color:#ccc" />
				<input type="button" style="width:50px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ve_7.php';?></div>

<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_ve" data-options="handle:'#dragg_ve'" align="center">
<div id="dragg_ve" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleVente/Ventee/form/Interface_f_Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_ve"><?php include 'cycleVente/Ventee/sms/Message slide question terminer ve.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_ve"><?php include 'cycleVente/Ventee/sms/messRetve.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_ve"><?php include 'cycleVente/Ventee/sms/Message terminer question ve.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_ve"><?php include 'cycleVente/Ventee/sms/Message terminer synthese ve.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_ve"><?php include 'cycleVente/Ventee/sms/Message slide ve Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_ve"><?php include 'cycleVente/Ventee/sms/sms_empty/Mess_vide_synth_ve.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_ve"><?php include 'cycleVente/Ventee/sms/Message donnees perdues ve.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ve"><?php include 'cycleVente/Ventee/sms/Message annulation question ve.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ve2"><?php include 'cycleVente/Ventee/sms/Message_enregistre_question_ve2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ve3"><?php include 'cycleVente/Ventee/sms/Message_enregistre_question_ve3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ve4"><?php include 'cycleVente/Ventee/sms/Message_enregistre_question_ve4.php';?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ve6"><?php include 'cycleVente/Ventee/sms/Message_enregistre_question_ve6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ve7"><?php include 'cycleVente/Ventee/sms/Message_enregistre_question_ve7.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************************************************************************************-->
<!--*******************************************************************************************************-->

<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_ve1"><?php include 'cycleVente/Ventee/sms/new 12.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_ve"><?php include 'cycleVente/Ventee/sms/mess_vid_aud_ve.php'; ?></div>
<!--*******************************************************************************************************-->



<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ve5"><?php include 'cycleVente/Ventee/sms/Message_enregistre_question_ve5.php';?></div>
<!--*******************************************************************************************************-->



</div>

