<?php
include $_SERVER["DOCUMENT_ROOT"]."/connexion.php";
@session_start();
$mission_id=$_SESSION['idMission'];

$verif_=$bdd->query("SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID='18' AND MISSION_ID='$mission_id'");

$resultat=$verif_->fetch();
$validRecetteB=$resultat['nb'];

?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script>

	// Droit cycle by Tolotra
	// Page : RSCI -> Cycle Trésorerie
	// Tâche : Revue Cotrôles Trésorerie, numéro 26
	$.ajax({
	    type: 'POST',
	    url: 'droitCycle.php',
	    data: {task_id: 26},
	    success: function (e) {
	        var result = 0 === Number(e);
	        $("#Int_rb_Continuer").attr('disabled', result);
	        $("#Int_rb_Synthese").attr('disabled', result);
	    }
	});

	$(function() {

		<?php
			//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
			if($validRecetteB==1){
		?>
				$('#contrb textarea').attr('disabled',true);
				$('#contrb #Synthese_rb_Terminer').attr('disabled',true);
				$('#contrb :input[type=radio]').attr('disabled',true); // tinay editer
		<?php
			}
			//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
		?>

		// Bouton retour menu achat
		$('#int_rb_Retour').click(function(){
			$('#message_fermeture_rb').show();
			$('#fancybox_rb').show();
		});

		//Con$tinuer la question
		$('#Int_rb_Continuer').click(function(){
			mission_id=document.getElementById("txt_mission_id_rb").value;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recetteb/php/aff_quest_fin_rb.php',
				data:{mission_id:mission_id},
				success:function(e){
			
						quetion_rb="#Question_rb_"+e;
						$(quetion_rb).fadeIn(500);
						rb=e;
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recetteb/php/getRepContinuer.php',
							data:{mission_id:mission_id, questId:e, cycleId:18},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								cpt=1;
								for(i=235; i<254; i++){ 
									if(i==rb){
										rbId="rb_"+cpt;
										rbIdCom="rb"+cpt;
										afficheReponseQuest(rbId,rbIdCom);
										break;
									}
									cpt++;
								}
								
							}
						});
					// }
					$('#dv_table_rb').show();
					$('#lb_veuillez_aff_rb').hide();
					$('#fancybox_rb').show();
				}
			});
		});
		//la synthèse de rb
		$('#Int_rb_Synthese').click(function(){	
			mission_id=document.getElementById("txt_mission_id_rb").value;
			var scoreRb= 0;
			
			// tinay editer
			// se rediriger vers calcul score
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recetteb/php/select_score_rb.php',
				data:{mission_id:mission_id},
				success:function(e){
				    $("#echo_score_rb").html(e);
				    
				    // à prendre les score RB.
				}			
			});
			
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recetteb/php/cpt_rb.php',
				data:{mission_id:mission_id},
				success:function(e){
					if(e==20){
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recetteb/php/getSynth.php',
							data:{mission_id:mission_id, cycleId:18},
							success:function(e){
								eo=""+e+"";
								doc=eo.split('*');
								document.getElementById("rd_Synthese_rb_Faible").checked=false;
								document.getElementById("rd_Synthese_rb_Moyen").checked=false;
								document.getElementById("rd_Synthese_rb_Eleve").checked=false;
								document.getElementById("txt_Synthese_rb").value=doc[0];
								if(doc[1]=='faible'){
									document.getElementById("rd_Synthese_rb_Faible").checked=true;
								}
								else if(doc[1]=='moyen'){
									document.getElementById("rd_Synthese_rb_Moyen").checked=true;
								}
								else if(doc[1]=='eleve'){
									document.getElementById("rd_Synthese_rb_Eleve").checked=true;
								}						
							}
						});
						$('#Int_Synthese_rb').show();
						$('#fancybox_rb').show();
					}
					else{
						$('#fancybox_rb').show();
						$('#mess_vide_obj_rb').show();
					}
				}
			});
		});
	});
	function afficheReponseQuest(rbId,rbIdCom){
		document.getElementById("rad_Question_Oui_"+rbId).checked=false;
		document.getElementById("rad_Question_NA_"+rbId).checked=false;
		document.getElementById("rad_Question_Non_"+rbId).checked=false;
		if(doc[0]==0){
			document.getElementById("commentaire_Question_"+rbIdCom).value="";
		}
		else
			document.getElementById("commentaire_Question_"+rbIdCom).value=doc[0];
		if(doc[1]=='OUI'){
			document.getElementById("rad_Question_Oui_"+rbId).checked=true;
		}
		else if(doc[1]=='N/A'){
			document.getElementById("rad_Question_NA_"+rbId).checked=true;
		}
		else if(doc[1]=='NON'){
			document.getElementById("rad_Question_Non_"+rbId).checked=true;
		}
	}
</script>

<div id="int_rb"><label class="lb_veuillez" id="lb_veuillez_aff_rb"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_rb" style="display:none;" />
	<div id="Interface_Question_rb"><?php include 'cycleRecette/Recetteb/load/load_quest_rb.php'; ?></div>
	<div id="dv_table_rb" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_rb">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_rb"></div>
	<div id="Int_Droite_rb">
		<input type="button" class="bouton" value="Retour" id="int_rb_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_rb_Continuer" /><br />
		<input type="button" class="bouton" value="Synthèse" id="Int_rb_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_rb"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_rb_235" data-options="handle:'#dragg_235'" align="center">
<div id="dragg_235" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/20
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_rb_1.php';?></div>
	<div id="Question_rb_236" data-options="handle:'#dragg_236'" align="center">
<div id="dragg_236" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/20
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_rb_2.php';?></div>
	<div id="Question_rb_237" data-options="handle:'#dragg_237'" align="center">
<div id="dragg_237" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/20
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rb_3.php';?></div>
	<div id="Question_rb_238" data-options="handle:'#dragg_238'" align="center">
<div id="dragg_238" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/20
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rb_4.php';?></div>
	<div id="Question_rb_239" data-options="handle:'#dragg_239'" align="center">
<div id="dragg_239" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/20
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rb_5.php';?></div>
	<div id="Question_rb_240" data-options="handle:'#dragg_240'" align="center">
<div id="dragg_240" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/20
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rb_6.php';?></div>
	<div id="Question_rb_241" data-options="handle:'#dragg_241'" align="center">
<div id="dragg_241" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/20
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rb_7.php';?></div>
	<div id="Question_rb_242" data-options="handle:'#dragg_242'" align="center">
<div id="dragg_242" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/20
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rb_8.php';?></div>
	<div id="Question_rb_243" data-options="handle:'#dragg_243'" align="center">
<div id="dragg_243" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/20
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rb_9.php';?></div>
	<div id="Question_rb_244" data-options="handle:'#dragg_244'" align="center">
<div id="dragg_244" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/20
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rb_10.php';?></div>
	<div id="Question_rb_245" data-options="handle:'#dragg_245'" align="center">
<div id="dragg_245" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/20
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rb_11.php';?></div>
	<div id="Question_rb_246" data-options="handle:'#dragg_246'" align="center">
<div id="dragg_246" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/20
				<input type="button" style="width:120px;height:15px;background-color:#ccc" />
				<input type="button" style="width:110px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rb_12.php';?></div>
	<div id="Question_rb_247" data-options="handle:'#dragg_247'" align="center">
<div id="dragg_247" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°13/20
				<input type="button" style="width:165px;height:15px;background-color:#ccc" />
				<input type="button" style="width:100px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rb_13.php';?></div>
	<div id="Question_rb_248" data-options="handle:'#dragg_248'" align="center">
<div id="dragg_248" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°14/20
				<input type="button" style="width:140px;height:15px;background-color:#ccc" />
				<input type="button" style="width:90px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rb_14.php';?></div>
	<div id="Question_rb_249" data-options="handle:'#dragg_249'" align="center">
<div id="dragg_249" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°15/20
				<input type="button" style="width:167px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rb_15.php';?></div>
		<div id="Question_rb_250" data-options="handle:'#dragg_250'" align="center">
<div id="dragg_250" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°16/20
				<input type="button" style="width:160px;height:15px;background-color:#ccc" />
				<input type="button" style="width:70px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rb_16.php';?></div>
	<div id="Question_rb_251" data-options="handle:'#dragg_251'" align="center">
<div id="dragg_251" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°17/20
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rb_17.php';?></div>
		<div id="Question_rb_252" data-options="handle:'#dragg_252'" align="center">
<div id="dragg_252" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°18/20
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rb_18.php';?></div>
		<div id="Question_rb_253" data-options="handle:'#dragg_253'" align="center">
<div id="dragg_253" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°19/20
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rb_19.php';?></div>
	<div id="Question_rb_254" data-options="handle:'#dragg_254'" align="center">
<div id="dragg_254" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°20/20
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_rb_20.php';?></div>


<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_rb" data-options="handle:'#dragg_rb'" align="center">
<div id="dragg_rb" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleRecette/Recetteb/form/Interface_rb_Synthese.php';?></div>
<!--*******************************************************************************************************-->

<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_rb"><?php include 'cycleRecette/Recetteb/sms/Message slide question terminer rb.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_rb"><?php include 'cycleRecette/Recetteb/sms/messRetrb.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_rb"><?php include 'cycleRecette/Recetteb/sms/Message terminer question rb.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_rb"><?php include 'cycleRecette/Recetteb/sms/Message terminer synthese rb.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_rb"><?php include 'cycleRecette/Recetteb/sms/Message slide rb Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_rb"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_vide_synth_rb.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_rb"><?php include 'cycleRecette/Recetteb/sms/Message donnees perdues rb.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rb"><?php include 'cycleRecette/Recetteb/sms/Message annulation question rb.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rb2"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rb3"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rb4"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb4.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rb5"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb5.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rb6"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rb7"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rb8"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rb9"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rb10"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rb11"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rb12"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb12.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rb13"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb13.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rb14"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb14.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rb15"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb15.php';?></div>
<!--*******************************************************************************************************-->
<div id="message_fermeture_question_rb16"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb16.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rb17"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb17.php';?></div>
<!--*******************************************************************************************************-->

<div id="message_fermeture_question_rb18"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb18.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rb19"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb19.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_rb20"><?php include 'cycleRecette/Recetteb/sms/Message_enregistre_question_rb20.php';?></div>
<!--***********************************Message de fermeture de toutes les question*************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_rb1"><?php include 'cycleRecette/Recetteb/sms/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb2"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb3"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb4"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb5"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb6"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb6.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb7"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb7.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb8"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb8.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb9"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb9.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb10"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb10.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb11"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb11.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb12"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb12.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb13"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb13.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb14"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb14.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb15"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb15.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb16"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb16.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb17"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb17.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb18"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb18.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb19"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb19.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_rb20"><?php include 'cycleRecette/Recetteb/sms/sms_empty/Mess_quest_vide_rb20.php'; ?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_rb"><?php include 'cycleRecette/Recetteb/sms/mess_vid_aud_rb.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************MESSAGE QUESTIONNAIRE NON REMPLI POUR SYNTHESE********************-->
<div id="mess_vide_obj_rb"><?php include 'cycleRecette/Recetteb/sms/mess_vid_aud_rb.php'; ?></div>
<!--*******************************************************************************************************-->

</div>