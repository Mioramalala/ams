<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';



$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=14 AND MISSION_ID='.$mission_id;
//print ($sql);
$verif=$bdd->query($sql);
$res_=$verif->fetch();
$validPaieB=$res_["nb"];

?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script language="javascript">
var stPID_="";

// Droit cycle by Tolotra
// Page : RSCI -> Cycle paie
// Tâche : Revue Cotrôles Paie, numéro 21
$.ajax({
    type: 'POST',
    url: 'droitCycle.php',
    data: {task_id: 21},
    success: function (e) {
        var result = 0 === Number(e);
        $("#Int_pb_Continuer").attr('disabled', result);
        $("#Int_pb_Synthese").attr('disabled', result);
    }
});

$(function()
{
	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($validPaieB==1)
	{

	?>
	$('#contpb textarea').attr('disabled',true);
	$('#contpb:input[type=radio]').attr('disabled',true);
	$('#Synthese_pb_Terminer').attr('disabled',true);
	<?php
	}
	//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	?>
	// Bouton retour menu achat
	$('#int_pb_Retour').click(function(){
		$('#message_fermeture_pb').show();
		$('#fancybox_pb').show();
	});
	//Con$tinuer la question
	$('#Int_pb_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_pb").value;
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paieb/php/aff_quest_fin_pb.php',
			data:{mission_id:mission_id},
			success:function(e){
				
					stPID_=e;
					quetion_pb="#Question_pb_"+e;
					$(quetion_pb).fadeIn(500);
					pb=e;
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paieb/php/getRepContinuer.php',
						data:{mission_id:mission_id, questId:e, cycleId:14},
						success:function(e1){
							eo=""+e1+"";
							doc=eo.split(',');
							cpt=1;
							for(i=181; i<195; i++){ 
								if(i==pb){
									pbId="pb_"+cpt;
									pbIdCom="pb"+cpt;
									afficheReponseQuest(pbId,pbIdCom);
									break;
								}
								cpt++;
							}
							
						}
					});
				// }
				$('#dv_table_pb').show();
				$('#lb_veuillez_aff_pb').hide();
				$('#fancybox_pb').show();
			}
		});
	});
	//la synthèse de pb
	$('#Int_pb_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_pb").value;
		
		// se rediriger vers calcul score
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paieb/php/select_score_pb.php',
			data:{mission_id:mission_id},
			success:function(e){
			    $("#echo_score_pb").html(e);
			}			
		});
		
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paieb/php/cpt_pb.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==16){
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paieb/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:14},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("rd_Synthese_pb_Faible").checked=false;
							document.getElementById("rd_Synthese_pb_Moyen").checked=false;
							document.getElementById("rd_Synthese_pb_Eleve").checked=false;
							document.getElementById("txt_Synthese_pb").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_pb_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_pb_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_pb_Eleve").checked=true;
							}						
						}
					});
					$('#fancybox_pb').show();
					$('#mess_vide_obj_pb').show();
					
				}
				else{
					$('#Int_Synthese_pb').show();
					$('#fancybox_pb').show();
				}
			}
		});
	});
});
function afficheReponseQuest(pbId,pbIdCom){
	document.getElementById("rad_Question_Oui_"+pbId).checked=false;
	document.getElementById("rad_Question_NA_"+pbId).checked=false;
	document.getElementById("rad_Question_Non_"+pbId).checked=false;
	if(doc[0]==0){
		document.getElementById("commentaire_Question_"+pbIdCom).value="";
	}
	else
		document.getElementById("commentaire_Question_"+pbIdCom).value=doc[0];
	if(doc[1]=='OUI'){
		document.getElementById("rad_Question_Oui_"+pbId).checked=true;
	}
	else if(doc[1]=='N/A'){
		document.getElementById("rad_Question_NA_"+pbId).checked=true;
	}
	else if(doc[1]=='NON'){
		document.getElementById("rad_Question_Non_"+pbId).checked=true;
	}
	document.getElementById('t_pb_1').style.backgroundColor='grey';
}
</script>

<div id="int_pb"><label class="lb_veuillez" id="lb_veuillez_aff_pb"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_pb" style="display:none;" />
	<div id="Interface_Question_pb"><?php include 'cyclePaie/Paieb/load/load_quest_pb.php'; ?></div>
	<div id="dv_table_pb" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_pb">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_pb"></div>
	<div id="Int_Droite_pb">
		<input type="button" class="bouton" value="Retour" id="int_pb_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_pb_Continuer" /><br />
		<input type="button" class="bouton" value="Synthèse" id="Int_pb_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_pb"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">
	
	</div-->
	<div id="Question_pb_181" data-options="handle:'#dragg_181'" align="center">
<div id="dragg_181" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/15
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_pb_1.php';?></div>
	<div id="Question_pb_182" data-options="handle:'#dragg_182'" align="center">
<div id="dragg_182" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/15
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_pb_2.php';?></div>
	<div id="Question_pb_183" data-options="handle:'#dragg_183'" align="center">
<div id="dragg_183" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/15
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pb_3.php';?></div>
	<div id="Question_pb_184" data-options="handle:'#dragg_184'" align="center">
<div id="dragg_184" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/15
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pb_4.php';?></div>
	<div id="Question_pb_185" data-options="handle:'#dragg_185'" align="center">
<div id="dragg_185" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/15
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pb_5.php';?></div>
	<div id="Question_pb_186" data-options="handle:'#dragg_186'" align="center">
<div id="dragg_186" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/15
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pb_6.php';?></div>
	<div id="Question_pb_187" data-options="handle:'#dragg_187'" align="center">
<div id="dragg_187" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/15
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pb_7.php';?></div>
	<div id="Question_pb_188" data-options="handle:'#dragg_188'" align="center">
<div id="dragg_188" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/15
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pb_8.php';?></div>
	<div id="Question_pb_189" data-options="handle:'#dragg_189'" align="center">
<div id="dragg_189" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/15
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pb_9.php';?></div>
	<div id="Question_pb_190" data-options="handle:'#dragg_190'" align="center">
<div id="dragg_190" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/15
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pb_10.php';?></div>
	<div id="Question_pb_191" data-options="handle:'#dragg_191'" align="center">
<div id="dragg_191" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/15
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pb_11.php';?></div>
	<div id="Question_pb_192" data-options="handle:'#dragg_192'" align="center">
<div id="dragg_192" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/15
				<input type="button" style="width:120px;height:15px;background-color:#ccc" />
				<input type="button" style="width:110px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pb_12.php';?></div>
	<div id="Question_pb_193" data-options="handle:'#dragg_193'" align="center">
<div id="dragg_193" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°13/15
				<input type="button" style="width:130px;height:15px;background-color:#ccc" />
				<input type="button" style="width:100px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pb_13.php';?></div>
	<div id="Question_pb_194" data-options="handle:'#dragg_194'" align="center">
<div id="dragg_194" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°14/15
				<input type="button" style="width:140px;height:15px;background-color:#ccc" />
				<input type="button" style="width:90px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pb_14.php';?></div>
	<div id="Question_pb_195" data-options="handle:'#dragg_195'" align="center">
<div id="dragg_195" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°15/15
				<input type="button" style="width:150px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pb_15.php';?></div>


<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_pb" data-options="handle:'#dragg_pb'" align="center">
<div id="dragg_pb" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cyclePaie/Paieb/form/Interface_pb_Synthese.php';?></div>
<!--*******************************************************************************************************-->

<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_pb"><?php include 'cyclePaie/Paieb/sms/Message slide question terminer pb.php'?></div>

<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_pb"><?php include 'cyclePaie/Paieb/sms/messRetpb.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_pb"><?php include 'cyclePaie/Paieb/sms/Message terminer question pb.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_pb"><?php include 'cyclePaie/Paieb/sms/Message terminer synthese pb.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_pb"><?php include 'cyclePaie/Paieb/sms/Message slide pb Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_pb"><?php include 'cyclePaie/Paieb/sms/sms_empty/Mess_vide_synth_pb.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_pb"><?php include 'cyclePaie/Paieb/sms/Message donnees perdues pb.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pb"><?php include 'cyclePaie/Paieb/sms/Message annulation question pb.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pb2"><?php include 'cyclePaie/Paieb/sms/Message_enregistre_question_pb2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pb3"><?php include 'cyclePaie/Paieb/sms/Message_enregistre_question_pb3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pb4"><?php include 'cyclePaie/Paieb/sms/Message_enregistre_question_pb4.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pb5"><?php include 'cyclePaie/Paieb/sms/Message_enregistre_question_pb5.php';?></div>
<!--*******************************************************************************************************-->


<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pb6"><?php include 'cyclePaie/Paieb/sms/Message_enregistre_question_pb6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pb7"><?php include 'cyclePaie/Paieb/sms/Message_enregistre_question_pb7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pb8"><?php include 'cyclePaie/Paieb/sms/Message_enregistre_question_pb8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pb9"><?php include 'cyclePaie/Paieb/sms/Message_enregistre_question_pb9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pb10"><?php include 'cyclePaie/Paieb/sms/Message_enregistre_question_pb10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pb11"><?php include 'cyclePaie/Paieb/sms/Message_enregistre_question_pb11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pb12"><?php include 'cyclePaie/Paieb/sms/Message_enregistre_question_pb12.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pb13"><?php include 'cyclePaie/Paieb/sms/Message_enregistre_question_pb13.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pb14"><?php include 'cyclePaie/Paieb/sms/Message_enregistre_question_pb14.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pb15"><?php include 'cyclePaie/Paieb/sms/Message_enregistre_question_pb15.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************************************************************************************-->

<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_pb1"><?php include 'cyclePaie/Paieb/sms/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pb2"><?php include 'cyclePaie/Paieb/sms/sms_empty/Mess_quest_vide_pb2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pb3"><?php include 'cyclePaie/Paieb/sms/sms_empty/Mess_quest_vide_pb3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pb4"><?php include 'cyclePaie/Paieb/sms/sms_empty/Mess_quest_vide_pb4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pb5"><?php include 'cyclePaie/Paieb/sms/sms_empty/Mess_quest_vide_pb5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pb6"><?php include 'cyclePaie/Paieb/sms/sms_empty/Mess_quest_vide_pb6.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pb7"><?php include 'cyclePaie/Paieb/sms/sms_empty/Mess_quest_vide_pb7.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pb8"><?php include 'cyclePaie/Paieb/sms/sms_empty/Mess_quest_vide_pb8.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pb9"><?php include 'cyclePaie/Paieb/sms/sms_empty/Mess_quest_vide_pb9.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pb10"><?php include 'cyclePaie/Paieb/sms/sms_empty/Mess_quest_vide_pb10.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pb11"><?php include 'cyclePaie/Paieb/sms/sms_empty/Mess_quest_vide_pb11.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pb12"><?php include 'cyclePaie/Paieb/sms/sms_empty/Mess_quest_vide_pb12.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pb13"><?php include 'cyclePaie/Paieb/sms/sms_empty/Mess_quest_vide_pb13.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pb14"><?php include 'cyclePaie/Paieb/sms/sms_empty/Mess_quest_vide_pb14.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pb15"><?php include 'cyclePaie/Paieb/sms/sms_empty/Mess_quest_vide_pb15.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_pb"><?php include 'cyclePaie/Paieb/sms/mess_vid_aud_pb.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************MESSAGE QUESTIONNAIRE NON REMPLI POUR SYNTHESE********************-->
<div id="mess_vide_obj_pb"><?php include 'cyclePaie/Paieb/sms/mess_vid_aud_pb.php'; ?></div>
<!--*******************************************************************************************************-->

</div>