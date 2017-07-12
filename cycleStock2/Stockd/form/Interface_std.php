<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script>


$(function(){

	// Bouton retour menu achat
	$('#int_std_Retour').click(function(){
		$('#message_fermeture_std').show();
		$('#fancybox_std').show();
	});
	//Con$tinuer la question
	$('#Int_std_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_std").value;
		$.ajax({
			type:'POST',
			url:'cycleStock/Stockd/php/aff_quest_fin_std.php',
			data:{mission_id:mission_id},
			success:function(e){
				// if(e==1){
					// $('#Question_std_70').fadeIn(500);					
					// $.ajax({
						// type:'POST',
						// url:'cycleStock/Stockd/php/getRepContinuer.php',
						// data:{mission_id:mission_id, questId:70, cycleId:7},
						// success:function(e1){
							// eo=""+e1+"";
							// alert(e1);
							// doc=eo.split(',');
							// afficheReponseQuest("std_1","std1");
						// }
					// });
				// }
				// else{
					quetion_std="#Question_std_"+e;
					$(quetion_std).fadeIn(500);
					std=e;
					$.ajax({
						type:'POST',
						url:'cycleStock/Stockd/php/getRepContinuer.php',
						data:{mission_id:mission_id, questId:e, cycleId:13},
						success:function(e1){
							eo=""+e1+"";
							doc=eo.split(',');
							cpt=1;
							for(i=152; i<180; i++){ 
								if(i==std){
									stdId="std_"+cpt;
									stdIdCom="std"+cpt;
									afficheReponseQuest(stdId,stdIdCom);
									break;
								}
								cpt++;
							}
							
						}
					});
				// }
				$('#dv_table_std').show();
				$('#lb_veuillez_aff_std').hide();
				$('#fancybox_std').show();
			}
		});
	});
	//la synthèse de c
	$('#Int_std_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_std").value;
		$.ajax({
			type:'POST',
			url:'cycleStock/Stockd/php/cpt_std.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==29){
					$.ajax({
						type:'POST',
						url:'cycleStock/Stockd/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:13},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("rd_Synthese_std_Faible").checked=false;
							document.getElementById("rd_Synthese_std_Moyen").checked=false;
							document.getElementById("rd_Synthese_std_Eleve").checked=false;
							document.getElementById("txt_Synthese_std").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_std_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_std_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_std_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_std').show();
					$('#fancybox_std').show();
				}
				else{
					$('#fancybox_std').show();
					$('#mess_vide_obj_std').show();
				}
			}
		});
	});
});
function afficheReponseQuest(stdId,stdIdCom){
	document.getElementById("rad_Question_Oui_"+stdId).checked=false;
	document.getElementById("rad_Question_NA_"+stdId).checked=false;
	document.getElementById("rad_Question_Non_"+stdId).checked=false;
	if(doc[0]==0){
		document.getElementById("commentaire_Question_"+stdIdCom).value="";
	}
	else
		document.getElementById("commentaire_Question_"+stdIdCom).value=doc[0];
	if(doc[1]=='OUI'){
		document.getElementById("rad_Question_Oui_"+stdId).checked=true;
	}
	else if(doc[1]=='N/A'){
		document.getElementById("rad_Question_NA_"+stdId).checked=true;
	}
	else if(doc[1]=='NON'){
		document.getElementById("rad_Question_Non_"+stdId).checked=true;
	}
}
</script>

<div id="int_std"><label class="lb_veuillez" id="lb_veuillez_aff_std"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_std" style="display:none;" />
	<div id="Interface_Question_std"><?php include 'cycleStock/Stockd/load/load_quest_std.php'; ?></div>
	<div id="dv_table_std" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_std">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_std"></div>
	<div id="Int_Droite_std">
		<input type="button" class="bouton" value="Retour" id="int_std_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_std_Continuer" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_std_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_std"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_std_152" data-options="handle:'#dragg_152'" align="center">
<div id="dragg_152" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/29
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_std_1.php';?></div>
	<div id="Question_std_153" data-options="handle:'#dragg_153'" align="center">
<div id="dragg_153" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/29
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_std_2.php';?></div>
	<div id="Question_std_154" data-options="handle:'#dragg_154'" align="center">
<div id="dragg_154" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/29
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_3.php';?></div>
	<div id="Question_std_155" data-options="handle:'#dragg_155'" align="center">
<div id="dragg_155" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/29
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_4.php';?></div>
	<div id="Question_std_156" data-options="handle:'#dragg_156'" align="center">
<div id="dragg_156" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/29
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_5.php';?></div>
	<div id="Question_std_157" data-options="handle:'#dragg_157'" align="center">
<div id="dragg_157" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/29
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_6.php';?></div>
	<div id="Question_std_158" data-options="handle:'#dragg_158'" align="center">
<div id="dragg_158" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/29
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_7.php';?></div>
	<div id="Question_std_159" data-options="handle:'#dragg_159'" align="center">
<div id="dragg_159" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/29
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_8.php';?></div>
	<div id="Question_std_160" data-options="handle:'#dragg_160'" align="center">
<div id="dragg_160" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/29
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_9.php';?></div>
	<div id="Question_std_161" data-options="handle:'#dragg_161'" align="center">
<div id="dragg_161" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/29
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_10.php';?></div>
	<div id="Question_std_162" data-options="handle:'#dragg_162'" align="center">
<div id="dragg_162" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/29
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_11.php';?></div>
	<div id="Question_std_163" data-options="handle:'#dragg_163'" align="center">
<div id="dragg_163" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/29
				<input type="button" style="width:120px;height:15px;background-color:#ccc" />
				<input type="button" style="width:110px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_12.php';?></div>
	<div id="Question_std_164" data-options="handle:'#dragg_164'" align="center">
<div id="dragg_164" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°13/29
				<input type="button" style="width:165px;height:15px;background-color:#ccc" />
				<input type="button" style="width:100px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_13.php';?></div>
	<div id="Question_std_165" data-options="handle:'#dragg_165'" align="center">
<div id="dragg_165" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°14/29
				<input type="button" style="width:140px;height:15px;background-color:#ccc" />
				<input type="button" style="width:90px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_14.php';?></div>
	<div id="Question_std_166" data-options="handle:'#dragg_166'" align="center">
<div id="dragg_166" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°15/29
				<input type="button" style="width:167px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_15.php';?></div>
		<div id="Question_std_167" data-options="handle:'#dragg_167'" align="center">
<div id="dragg_167" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°16/29
				<input type="button" style="width:160px;height:15px;background-color:#ccc" />
				<input type="button" style="width:70px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_16.php';?></div>
	<div id="Question_std_168" data-options="handle:'#dragg_168'" align="center">
<div id="dragg_168" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°17/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_17.php';?></div>
		<div id="Question_std_169" data-options="handle:'#dragg_169'" align="center">
<div id="dragg_169" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°18/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_18.php';?></div>
		<div id="Question_std_170" data-options="handle:'#dragg_170'" align="center">
<div id="dragg_170" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°19/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_19.php';?></div>
		<div id="Question_std_171" data-options="handle:'#dragg_171'" align="center">
<div id="dragg_171" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°20/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_20.php';?></div>
		<div id="Question_std_172" data-options="handle:'#dragg_172'" align="center">
<div id="dragg_172" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°21/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_21.php';?></div>
		<div id="Question_std_173" data-options="handle:'#dragg_173'" align="center">
<div id="dragg_173" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°22/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_22.php';?></div>
		<div id="Question_std_174" data-options="handle:'#dragg_174'" align="center">
<div id="dragg_174" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°23/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_23.php';?></div>
		<div id="Question_std_175" data-options="handle:'#dragg_175'" align="center">
<div id="dragg_175" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°24/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_24.php';?></div>
		<div id="Question_std_176" data-options="handle:'#dragg_176'" align="center">
<div id="dragg_176" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°25/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_25.php';?></div>
		<div id="Question_std_177" data-options="handle:'#dragg_177'" align="center">
<div id="dragg_177" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°26/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_26.php';?></div>
		<div id="Question_std_178" data-options="handle:'#dragg_178'" align="center">
<div id="dragg_178" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°27/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_27.php';?></div>
		<div id="Question_std_179" data-options="handle:'#dragg_179'" align="center">
<div id="dragg_179" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°28/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_28.php';?></div>
		<div id="Question_std_180" data-options="handle:'#dragg_180'" align="center">
<div id="dragg_180" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°29/29
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_std_29.php';?></div>


<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_std" data-options="handle:'#dragg_std'" align="center">
<div id="dragg_std" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleStock/Stockd/form/Interface_std_Synthese.php';?></div>
<!--*******************************************************************************************************-->

<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_std"><?php include 'cycleStock/Stockd/sms/Message slide question terminer std.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_std"><?php include 'cycleStock/Stockd/sms/messRetstd.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_std"><?php include 'cycleStock/Stockd/sms/Message terminer question std.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_std"><?php include 'cycleStock/Stockd/sms/Message terminer synthese std.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_std"><?php include 'cycleStock/Stockd/sms/Message slide std Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_std"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_vide_synth_std.php'; ?></div>
<!--*******************************************************************************************************-->














<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_std"><?php include 'cycleStock/Stockd/sms/Message donnees perdues std.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std" style="display:none"><?php include 'cycleStock/Stockd/sms/Message annulation question std.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std2" style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std3"style="display:none" ><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std4" style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std4.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std5" style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std5.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std6" style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std7" style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std8" style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std9" style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std10" style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std11"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std12"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std12.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std13"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std13.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std14"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std14.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std15"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std15.php';?></div>
<!--*******************************************************************************************************-->
<div id="message_fermeture_question_std16"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std16.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std17"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std17.php';?></div>
<!--*******************************************************************************************************-->

<div id="message_fermeture_question_std18"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std18.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std19"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std19.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std20"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std20.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std21"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std21.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std22"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std22.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std23"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std23.php';?></div>
<!--*******************************************************************************************************-->
<div id="message_fermeture_question_std24"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std24.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std25"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std25.php';?></div>
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std26"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std26.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std27"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std27.php';?></div>
<!--*******************************************************************************************************-->
<div id="message_fermeture_question_std28"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std28.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_std29"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_enregistre_question_std29.php';?></div>

<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_std1"style="display:none"><?php include 'cycleStock/Stockd/sms/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std2"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std3"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std4"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std5"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std6"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std6.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std7"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std7.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std8"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std8.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std9"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std9.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std10"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std10.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std11"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std11.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std12"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std12.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std13"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std13.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std14"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std14.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std15"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std15.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std16"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std16.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std17"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std17.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std18"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std18.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std19"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std19.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std20"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std20.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std21"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std21.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std22"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std22.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std23"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std23.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std24"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std24.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std25"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std25.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std26"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std26.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std27"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std27.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std28"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std28.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_std29"style="display:none"><?php include 'cycleStock/Stockd/sms/sms_empty/Mess_quest_vide_std29.php'; ?></div>


<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_std"style="display:none"><?php include 'cycleStock/Stockd/sms/mess_vid_aud_std.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************MESSAGE QUESTIONNAIRE NON REMPLI POUR SYNTHESE********************-->
<div id="mess_vide_obj_std"style="display:none"><?php include 'cycleStock/Stockd/sms/mess_vid_aud_std.php'; ?></div>
<!--*******************************************************************************************************-->








</div>