<?php

include '../../../connexion.php';

$reponse=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=3');

$donnees=$reponse->fetch();

$nb=$donnees['nb'];

?>


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link href="cycleAchat/cycle_achat_c/css/div.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_c/css/div_c.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_c/css/class.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_c/css/div_fermer_quest_objectif_c.css" rel="stylesheet" type="text/css" />

<script>


	$(function(){

		// Droit cycle by Tolotra
		// Page : RSCI -> Cycle achat
		// Tâche : Revue Contrôles Achats, numéro 1
		$.ajax({
		    type: 'POST',
		    url: 'droitCycle.php',
		    data: {task_id: 1},
		    success: function (e) {
		        $("#Int_c_Continuer").attr('disabled', 0 === Number(e));
		        $("#Int_c_Synthese").attr('disabled', 0 === Number(e));
		    }
		});

		var nb=parseInt(<?php echo $nb;?>);
		if(nb!=0){
			$('textarea').attr('disabled',true);
			$(':input[type=radio]').attr('disabled',true);
		}
		
		// Bouton retour menu achat
		$('#int_c_Retour').click(function(){
			//console.log('dqsdqsdqs');
			$('#message_fermeture_c').show();
			$('#fancybox_c').show();
		});

		//Con$tinuer la question
		$('#Int_c_Continuer').click(function(){
			mission_id=document.getElementById("txt_mission_id_c").value;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_c/php/aff_quest_fin_c.php',
				data:{mission_id:mission_id},
				success:function(e){
					if(e==33){
						quetion_c="#Question_c_"+e;
						$(quetion_c).fadeIn(500);
					}
					else if(e==1){
						$('#Question_c_23').fadeIn(500);
					}
					else{
						quetion_c="#Question_c_"+e;
						$(quetion_c).fadeIn(500);
					}
					$('#dv_table_c').show();
					$('#lb_veuillez_aff_c').hide();
					$('#fancybox_c').show();
				}
			});
		});

		//la synthèse de c
		$('#Int_c_Synthese').click(function(){	
			mission_id=document.getElementById("txt_mission_id_c").value;
			// se rediriger vers calcul score
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_c/php/select_score_c.php',
				data:{mission_id:mission_id},
				success:function(e){
				    $("#echo_score_c").html(e);
				}			
			});

			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_c/php/cpt_c.php',
				data:{mission_id:mission_id},
				success:function(e){
					if(e==11){
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_c/php/getSynth.php',
							data:{mission_id:mission_id, cycleId:3},
							success:function(e){
								eo=""+e+"";
								doc=eo.split('*');
								document.getElementById("txt_Synthese_c").value=doc[0];
								if(doc[1]=='faible'){
									document.getElementById("rd_Synthese_c_Faible").checked=true;
								}
								else if(doc[1]=='moyen'){
									document.getElementById("rd_Synthese_c_Moyen").checked=true;
								}
								else if(doc[1]=='eleve'){
									document.getElementById("rd_Synthese_c_Eleve").checked=true;
								}						
							}
						});
						$('#Int_Synthese_c').show();
						$('#fancybox_c').show();
					}
					else{
						$('#fancybox_c').show();
						$('#mess_vide_obj_c').show();
					}
				}
			});
		});

	});
	
	function afficheReponseQuestacc(imbId,imbIdCom){

		document.getElementById("rad_Question_Oui_"+imbId).checked=false;
		document.getElementById("rad_Question_NA_"+imbId).checked=false;
		document.getElementById("rad_Question_Non_"+imbId).checked=false;
		if(doc[0]==0){
			document.getElementById("commentaire_Question_"+imbIdCom).value="";
		}
		else
			document.getElementById("commentaire_Question_"+imbIdCom).value=doc[0];
		if(doc[1]=='OUI'){
			document.getElementById("rad_Question_Oui_"+imbId).checked=true;
		}
		else if(doc[1]=='N/A'){
			document.getElementById("rad_Question_NA_"+imbId).checked=true;
		}
		else if(doc[1]=='NON'){
			document.getElementById("rad_Question_Non_"+imbId).checked=true;
		}
	}

</script>

<!-- tinay editer -->
<div id="int_c"><label class="lb_veuillez" id="lb_veuillez_aff_c"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_c" style="display:none;" />
	<div id="Interface_Question_c"><?php include '../../../cycleAchat/cycle_achat_c/load/load_quest_c.php'; ?></div>
	<div id="dv_table_c" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_c">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_c"><?php include '../../../cycleAchat/cycle_achat_c/load/load_rep_c.php'; ?></div>
	<div id="Int_Droite_c">
		<input type="button" class="bouton" value="Retour" id="int_c_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_c_Continuer" /><br />
		<input type="button" class="bouton" value="Synthèse" id="Int_c_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_c"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->

	<div id="Question_c_23" data-options="handle:'#dragg_23'" align="center">
		<div id="dragg_23" >
			<table width="500">
				<tr style="height:10px">
					<td class="td_Titre_Question" align="center">QUESTION N°01/11
						<input type="button" style="width:10px;height:15px;background-color:#ccc" />
						<input type="button" style="width:100px;height:15px;background-color:#efefef" />
					</td>
				</tr>
			</table>
		</div>
		<?php include 'Interface_Question_c_1.php';?>
	</div>

	<div id="Question_c_24" data-options="handle:'#dragg_24'" align="center">
<div id="dragg_24" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/11
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:90px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_c_2.php';?></div>
	<div id="Question_c_25" data-options="handle:'#dragg_25'" align="center">
<div id="dragg_25" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/11
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_c_3.php';?></div>
	<div id="Question_c_26" data-options="handle:'#dragg_26'" align="center">
<div id="dragg_26" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/11
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:70px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_c_4.php';?></div>
	<div id="Question_c_27" data-options="handle:'#dragg_27'" align="center">
<div id="dragg_27" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/11
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_c_5.php';?></div>
	<div id="Question_c_28" data-options="handle:'#dragg_28'" align="center">
<div id="dragg_28" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/11
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:50px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_c_6.php';?></div>
	<div id="Question_c_29" data-options="handle:'#dragg_29'" align="center">
<div id="dragg_29" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/11
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:40px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_c_7.php';?></div>
	<div id="Question_c_30" data-options="handle:'#dragg_30'" align="center">
<div id="dragg_30" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/11
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:30px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_c_8.php';?></div>
	<div id="Question_c_31" data-options="handle:'#dragg_31'" align="center">
<div id="dragg_31" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/11
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:20px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_c_9.php';?></div>
	<div id="Question_c_32" data-options="handle:'#dragg_32'" align="center">
<div id="dragg_32" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/11
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:10px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_c_10.php';?></div>
	<div id="Question_c_33" data-options="handle:'#dragg_32'" align="center">
<div id="dragg_32" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/11
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<!--input type="button" style="width:110px;height:15px;background-color:#efefef" /-->
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_c_11.php';?></div>

<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_c" data-options="handle:'#dragg_c'" align="center">
<div id="dragg_c" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include '../../../cycleAchat/cycle_achat_c/form/Interface_c_Synthese.php';?></div>
<!--*******************************************************************************************************-->





<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_c"><?php include '../../../cycleAchat/cycle_achat_c/sms/Message slide question terminer c.php' ?> </div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_c"><?php include '../../../cycleAchat/cycle_achat_c/sms/messRetc.php' ?> </div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_c"><?php include '../../../cycleAchat/cycle_achat_c/sms/Message terminer question c.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_c"><?php include '../../../cycleAchat/cycle_achat_c/sms/Message terminer synthese c.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_c"><?php include '../../../cycleAchat/cycle_achat_c/sms/Message slide c Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_c"><?php include '../../../cycleAchat/cycle_achat_c/sms/sms_empty/Mess_vide_synth_c.php'; ?></div>
<!--*******************************************************************************************************-->



<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_c"><?php include '../../../cycleAchat/cycle_achat_c/sms/Message donnees perdues c.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_c"><?php include '../../../cycleAchat/cycle_achat_c/sms/Message annulation question c.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_c2"><?php include '../../../cycleAchat/cycle_achat_c/sms/Message_enregistre_question_c2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_c3"><?php include '../../../cycleAchat/cycle_achat_c/sms/Message_enregistre_question_c3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_c4"><?php include '../../../cycleAchat/cycle_achat_c/sms/Message_enregistre_question_c4.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_c5"><?php include '../../../cycleAchat/cycle_achat_c/sms/Message_enregistre_question_c5.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_c6"><?php include '../../../cycleAchat/cycle_achat_c/sms/Message_enregistre_question_c6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_c7"><?php include '../../../cycleAchat/cycle_achat_c/sms/Message_enregistre_question_c7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_c8"><?php include '../../../cycleAchat/cycle_achat_c/sms/Message_enregistre_question_c8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_c9"><?php include '../../../cycleAchat/cycle_achat_c/sms/Message_enregistre_question_c9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_c10"><?php include '../../../cycleAchat/cycle_achat_c/sms/Message_enregistre_question_c10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_c11"><?php include '../../../cycleAchat/cycle_achat_c/sms/Message_enregistre_question_c11.php';?></div>
<!--*******************************************************************************************************-->


<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_c1"><?php include '../../../cycleAchat/cycle_achat_c/sms/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_c2"><?php include '../../../cycleAchat/cycle_achat_c/sms/sms_empty/Mess_quest_vide_c2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_c3"><?php include '../../../cycleAchat/cycle_achat_c/sms/sms_empty/Mess_quest_vide_c3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_c4"><?php include '../../../cycleAchat/cycle_achat_c/sms/sms_empty/Mess_quest_vide_c4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_c5"><?php include '../../../cycleAchat/cycle_achat_c/sms/sms_empty/Mess_quest_vide_c5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_c6"><?php include '../../../cycleAchat/cycle_achat_c/sms/sms_empty/Mess_quest_vide_c6.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_c7"><?php include '../../../cycleAchat/cycle_achat_c/sms/sms_empty/Mess_quest_vide_c7.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_c8"><?php include '../../../cycleAchat/cycle_achat_c/sms/sms_empty/Mess_quest_vide_c8.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_c9"><?php include '../../../cycleAchat/cycle_achat_c/sms/sms_empty/Mess_quest_vide_c9.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_c10"><?php include '../../../cycleAchat/cycle_achat_c/sms/sms_empty/Mess_quest_vide_c10.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_c11"><?php include '../../../cycleAchat/cycle_achat_c/sms/sms_empty/Mess_quest_vide_c11.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_c"><?php include '../../../cycleAchat/cycle_achat_c/sms/mess_vid_aud_c.php'; ?></div>
<!--*******************************************************************************************************-->
</div>

