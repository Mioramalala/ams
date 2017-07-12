<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';



$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=27 AND MISSION_ID='.$mission_id;
//print ($sql);
$verif=$bdd->query($sql);
$res_=$verif->fetch();
$valideVenteC=$res_["nb"];

?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/cssSousmenueCycle.css" rel="stylesheet" type="text/css" />
<script language="javascript">
$(function()
{


	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($valideVenteC==1)
	{

	?>
	$('#contvc textarea').attr('disabled',true);
	$('#contvc  :input[type=radio]').attr('disabled',true);
	$('#contvc  #Synthese_vc_Terminer').attr('disabled',true);
	<?php
	}
	//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	?>
	// $("#boo").draggable({
                // containment: "#contenant",
                // scroll: false
       // });
	// Bouton retour menu achat
	$('#int_vc_Retour').click(function(){
		$('#message_fermeture_vc').show();
		//$('#fancybox_vc').show();
	});

	// Droit cycle by Tolotra
	// Page : RSCI -> Cycle ventes
	// Tâche : Revue Cotrôles ventes, numéro 37
	$.ajax({
		type: 'POST',
		url: 'droitCycle.php',
		data: {task_id: 37},
		success: function (e) {
			var result = 0 === Number(e);
			$("#Int_vc_Continuer").attr('disabled', result);
			$("#Int_vc_Synthese").attr('disabled', result);
		}
	});

	//Con$tinuer la question
	$('#Int_vc_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_vc").value;
		$.ajax({
			type:'POST',
			url:'cycleVente/Ventec/php/aff_quest_fin_vc.php',
			data:{mission_id:mission_id},
			success:function(e){
				
					quetion_vc="#Question_vc_"+e;
					$(quetion_vc).fadeIn(500);
					vc=e;
					$.ajax({
						type:'POST',
						url:'cycleVente/Ventec/php/getRepContinuer.php',
						data:{mission_id:mission_id, questId:e, cycleId:27},
						success:function(e1){
							eo=""+e1+"";
							doc=eo.split(',');
							cpt=1;
							for(i=335; i<350; i++){ 
								if(i==vc){
									vcId="vc_"+cpt;
									vcIdCom="vc"+cpt;
									afficheReponseQuest(vcId,vcIdCom);
									break;
								}
								cpt++;
							}
							
						}
					});
				// }
				$('#dv_table_vc').show();
				$('#lb_veuillez_aff_vc').hide();
				$('#fancybox_vc').show();
			}
		});
	});
	//la synthèse de vc
	$('#Int_vc_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_vc").value;
		
		// se rediriger vers calcul score
		$.ajax({
			type:'POST',
			url:'cycleVente/Ventec/php/select_score_vc.php',
			data:{mission_id:mission_id},
			success:function(e){
			    $("#echo_score_vc").html(e);
			}			
		});
		
		$.ajax({
			type:'POST',
			url:'cycleVente/Ventec/php/cpt_vc.php',
			data:{mission_id:mission_id},
			success:function(e){

				if(e==16){
					$.ajax({
						type:'POST',
						url:'cycleVente/Ventec/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:27},
						success:function(e){
							eo=""+e+"";
							doc=eo.split('*');
							document.getElementById("rd_Synthese_vc_Faible").checked=false;
							document.getElementById("rd_Synthese_vc_Moyen").checked=false;
							document.getElementById("rd_Synthese_vc_Eleve").checked=false;
							document.getElementById("txt_Synthese_vc").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_vc_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_vc_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_vc_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_vc').show();
					$('#fancybox_vc').show();
					$('#message_Slide_terminer_Question_vc').hide();

				}
				else{
					$('#fancybox_vc').show();
					$('#mess_vide_obj_vc').show();
				}
			}
		});
	});
});


function afficheReponseQuest(vcId,vcIdCom){
	document.getElementById("rad_Question_Oui_"+vcId).checked=false;
	document.getElementById("rad_Question_NA_"+vcId).checked=false;
	document.getElementById("rad_Question_Non_"+vcId).checked=false;
	if(doc[0]==0){
		document.getElementById("commentaire_Question_"+vcIdCom).value="";
	}
	else
		document.getElementById("commentaire_Question_"+vcIdCom).value=doc[0];
	if(doc[1]=='OUI'){
		document.getElementById("rad_Question_Oui_"+vcId).checked=true;
	}
	else if(doc[1]=='N/A'){
		document.getElementById("rad_Question_NA_"+vcId).checked=true;
	}
	else if(doc[1]=='NON'){
		document.getElementById("rad_Question_Non_"+vcId).checked=true;
	}
}
</script>

<div id="int_vc">

	


<label class="lb_veuillez" id="lb_veuillez_aff_vc"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_vc" style="display:none;" />
	<div id="Interface_Question_vc"><?php include 'cycleVente/Ventec/load/load_quest_vc.php'; ?></div>
	<div id="dv_table_vc" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_vc">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_vc"></div>
	<div id="Int_Droite_vc">
		<input type="button" class="bouton" value="Retour" id="int_vc_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_vc_Continuer" /><br />
		<input type="button" class="bouton" value="Synthèse" id="Int_vc_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_vc"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">
	
	</div-->
	<div id="Question_vc_335" data-options="handle:'#dragg_335'" align="center">
<div id="dragg_335" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/16
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_vc_1.php';?></div>
	<div id="Question_vc_336" data-options="handle:'#dragg_336'" align="center">
<div id="dragg_336" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/16
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_vc_2.php';?></div>
	<div id="Question_vc_337" data-options="handle:'#dragg_337'" align="center">
<div id="dragg_337" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/16
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_3.php';?></div>
	<div id="Question_vc_338" data-options="handle:'#dragg_338'" align="center">
<div id="dragg_338" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/16
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_4.php';?></div>
	<div id="Question_vc_339" data-options="handle:'#dragg_339'" align="center">
<div id="dragg_339" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/16
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_5.php';?></div>
	<div id="Question_vc_340" data-options="handle:'#dragg_340'" align="center">
<div id="dragg_340" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/16
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_6.php';?></div>
	<div id="Question_vc_341" data-options="handle:'#dragg_341'" align="center">
<div id="dragg_341" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/16
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_7.php';?></div>
	<div id="Question_vc_342" data-options="handle:'#dragg_342'" align="center">
<div id="dragg_342" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/16
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_8.php';?></div>
	<div id="Question_vc_343" data-options="handle:'#dragg_343'" align="center">
<div id="dragg_343" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/16
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_9.php';?></div>
	<div id="Question_vc_344" data-options="handle:'#dragg_344'" align="center">
<div id="dragg_344" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/16
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_10.php';?></div>
	<div id="Question_vc_345" data-options="handle:'#dragg_345'" align="center">
<div id="dragg_345" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/16
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_11.php';?></div>
	<div id="Question_vc_346" data-options="handle:'#dragg_346'" align="center">
<div id="dragg_346" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/16
				<input type="button" style="width:120px;height:15px;background-color:#ccc" />
				<input type="button" style="width:110px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_12.php';?></div>
	<div id="Question_vc_347" data-options="handle:'#dragg_347'" align="center">
<div id="dragg_347" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°13/16
				<input type="button" style="width:130px;height:15px;background-color:#ccc" />
				<input type="button" style="width:100px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_13.php';?></div>
	<div id="Question_vc_348" data-options="handle:'#dragg_348'" align="center">
<div id="dragg_348" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°14/16
				<input type="button" style="width:140px;height:15px;background-color:#ccc" />
				<input type="button" style="width:90px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_14.php';?></div>
	<div id="Question_vc_349" data-options="handle:'#dragg_349'" align="center">
<div id="dragg_349" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°15/16
				<input type="button" style="width:150px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_15.php';?></div>
	<div id="Question_vc_350" data-options="handle:'#dragg_350'" align="center">
<div id="dragg_350" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°16/16
				<input type="button" style="width:180px;height:15px;background-color:#ccc" />
				<input type="button" style="width:50px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vc_16.php';?></div>

<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_vc" data-options="handle:'#dragg_vc'" align="center">
<div id="dragg_vc" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleVente/Ventec/form/Interface_vc_Synthese.php';?></div>
<!--*******************************************************************************************************-->

<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_vc"><?php include 'cycleVente/Ventec/sms/Message slide question terminer vc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_vc"><?php include 'cycleVente/Ventec/sms/messRetvc.php';?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_vc"><?php include 'cycleVente/Ventec/sms/Message terminer question vc.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_vc"><?php include 'cycleVente/Ventec/sms/Message terminer synthese vc.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_vc"><?php include 'cycleVente/Ventec/sms/Message slide vc Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_vc"><?php include 'cycleVente/Ventec/sms/sms_empty/Mess_vide_synth_vc.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_vc"><?php include 'cycleVente/Ventec/sms/Message donnees perdues vc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc"><?php include 'cycleVente/Ventec/sms/Message annulation question vc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc2"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc3"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc4"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc4.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc5"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc5.php';?></div>
<!--*******************************************************************************************************-->


<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc6"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc7"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc8"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc9"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc10"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc11"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc12"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc12.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc13"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc13.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc14"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc14.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vc15"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc15.php';?></div>
<!--*******************************************************************************************************-->
<div id="message_fermeture_question_vc16"><?php include 'cycleVente/Ventec/sms/Message_enregistre_question_vc16.php';?></div>
<!--*******************************************************************************************************-->
<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_vc1"><?php include 'cycleVente/Ventec/sms/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vc2"><?php include 'cycleVente/Ventec/sms/sms_empty/Mess_quest_vide_vc2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vc3"><?php include 'cycleVente/Ventec/sms/sms_empty/Mess_quest_vide_vc3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vc4"><?php include 'cycleVente/Ventec/sms/sms_empty/Mess_quest_vide_vc4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vc5"><?php include 'cycleVente/Ventec/sms/sms_empty/Mess_quest_vide_vc5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vc6"><?php include 'cycleVente/Ventec/sms/sms_empty/Mess_quest_vide_vc6.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vc7"><?php include 'cycleVente/Ventec/sms/sms_empty/Mess_quest_vide_vc7.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vc8"><?php include 'cycleVente/Ventec/sms/sms_empty/Mess_quest_vide_vc8.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vc9"><?php include 'cycleVente/Ventec/sms/sms_empty/Mess_quest_vide_vc9.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vc10"><?php include 'cycleVente/Ventec/sms/sms_empty/Mess_quest_vide_vc10.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vc11"><?php include 'cycleVente/Ventec/sms/sms_empty/Mess_quest_vide_vc11.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vc12"><?php include 'cycleVente/Ventec/sms/sms_empty/Mess_quest_vide_vc12.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vc13"><?php include 'cycleVente/Ventec/sms/sms_empty/Mess_quest_vide_vc13.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vc14"><?php include 'cycleVente/Ventec/sms/sms_empty/Mess_quest_vide_vc14.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vc15"><?php include 'cycleVente/Ventec/sms/sms_empty/Mess_quest_vide_vc15.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vc16"><?php include 'cycleVente/Ventec/sms/sms_empty/Mess_quest_vide_vc16.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_vc"><?php include 'cycleVente/Ventec/sms/mess_vid_aud_vc.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************MESSAGE QUESTIONNAIRE NON REMPLI POUR SYNTHESE********************-->
<div id="mess_vide_obj_vc"><?php include 'cycleVente/Ventec/sms/mess_vid_aud_vc.php'; ?></div>
<!--*******************************************************************************************************-->

</div>