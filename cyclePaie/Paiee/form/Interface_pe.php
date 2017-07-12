<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';

// tinay editer: 16 pour paie E.
//$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=16 AND MISSION_ID='.$mission_id;
$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=17 AND MISSION_ID='.$mission_id;

$verif=$bdd->query($sql);
$res_=$verif->fetch();
$validPaieE=$res_["nb"];

?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script language="javascript">
var StPEID="";

// Droit cycle by Tolotra
// Page : RSCI -> Cycle paie
// Tâche : Revue Cotrôles Paie, numéro 21
$.ajax({
    type: 'POST',
    url: 'droitCycle.php',
    data: {task_id: 21},
    success: function (e) {
        var result = 0 === Number(e);
        $("#Int_pe_Continuer").attr('disabled', result);
        $("#Int_pe_Synthese").attr('disabled', result);
    }
});

$(function()
{


	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($validPaieE==1)
	{

	?>
	$('#contpe textarea').attr('disabled',true);
	$('#contpe:input[type=radio]').attr('disabled',true);
	$('#contpe #Synthese_pe_Terminer').attr('disabled',true);
	<?php
	}
	//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	?>
	// Bouton retour menu achat
	$('#int_pe_Retour').click(function(){
		$('#message_fermeture_pe').show();
		$('#fancybox_pe').show();
	});
	//Con$tinuer la question
	$('#Int_pe_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_pe").value;
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paiee/php/aff_quest_fin_pe.php',
			data:{mission_id:mission_id},
			success:function(e){
				    StPEID=e;
					quetion_pe="#Question_pe_"+e;
					$(quetion_pe).fadeIn(500);
					pe=e;
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paiee/php/getRepContinuer.php',
						data:{mission_id:mission_id, questId:e, cycleId:17},
						success:function(e1){
							eo=""+e1+"";
							doc=eo.split(',');
							cpt=1;
							for(i=227; i<234; i++){ 
								if(i==pe){
									peId="pe_"+cpt;
									peIdCom="pe"+cpt;
									afficheReponseQuest(peId,peIdCom);
									break;
								}
								cpt++;
							}
							
						}
					});
				// }
				$('#dv_table_pe').show();
				$('#lb_veuillez_aff_pe').hide();
				$('#fancybox_pe').show();
			}
		});
	});
	//la synthèse de pe
	$('#Int_pe_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_pe").value;
		
		// se rediriger vers calcul score
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paiee/php/select_score_pe.php',
			data:{mission_id:mission_id},
			success:function(e){
			    $("#echo_score_pe").html(e);
			}			
		});
		
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paiee/php/cpt_pe.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==17){
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paiee/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:17},
						success:function(e){
							eo=""+e+"";
							doc=eo.split('*');
							document.getElementById("rd_Synthese_pe_Faible").checked=false;
							document.getElementById("rd_Synthese_pe_Moyen").checked=false;
							document.getElementById("rd_Synthese_pe_Eleve").checked=false;
							document.getElementById("txt_Synthese_pe").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_pe_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_pe_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_pe_Eleve").checked=true;
							}						
						}
					});
					$('#fancybox_pe').show();
					$('#mess_vide_obj_pe').show();
					
				}
				else{
					$('#Int_Synthese_pe').show();
					$('#fancybox_pe').show();
					
				}
			}
		});
	});
});
function afficheReponseQuest(peId,peIdCom){
	document.getElementById("rad_Question_Oui_"+peId).checked=false;
	document.getElementById("rad_Question_NA_"+peId).checked=false;
	document.getElementById("rad_Question_Non_"+peId).checked=false;
	if(doc[0]==0){
		document.getElementById("commentaire_Question_"+peIdCom).value="";
	}
	else
		document.getElementById("commentaire_Question_"+peIdCom).value=doc[0];
	if(doc[1]=='OUI'){
		document.getElementById("rad_Question_Oui_"+peId).checked=true;
	}
	else if(doc[1]=='N/A'){
		document.getElementById("rad_Question_NA_"+peId).checked=true;
	}
	else if(doc[1]=='NON'){
		document.getElementById("rad_Question_Non_"+peId).checked=true;
	}
}
</script>

<div id="int_pe"><label class="lb_veuillez" id="lb_veuillez_aff_pe"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_pe" style="display:none;" />
	<div id="Interface_Question_pe"><?php include 'cyclePaie/Paiee/load/load_quest_pe.php'; ?></div>
	<div id="dv_table_pe" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_pe">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_pe"></div>
	<div id="Int_Droite_pe">
		<input type="button" class="bouton" value="Retour" id="int_pe_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_pe_Continuer" /><br />
		<input type="button" class="bouton" value="Synthèse" id="Int_pe_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_pe"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">
	
	</div-->
	<div id="Question_pe_227" data-options="handle:'#dragg_227'" align="center">
<div id="dragg_227" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/08
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_pe_1.php';?></div>
	<div id="Question_pe_228" data-options="handle:'#dragg_228'" align="center">
<div id="dragg_228" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/08
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_pe_2.php';?></div>
	<div id="Question_pe_229" data-options="handle:'#dragg_229'" align="center">
<div id="dragg_229" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/08
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pe_3.php';?></div>
	<div id="Question_pe_230" data-options="handle:'#dragg_230'" align="center">
<div id="dragg_230" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/08
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pe_4.php';?></div>
	<div id="Question_pe_231" data-options="handle:'#dragg_231'" align="center">
<div id="dragg_231" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/08
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pe_5.php';?></div>
	<div id="Question_pe_232" data-options="handle:'#dragg_232'" align="center">
<div id="dragg_232" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/08
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pe_6.php';?></div>
	<div id="Question_pe_233" data-options="handle:'#dragg_233'" align="center">
<div id="dragg_233" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/08
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pe_7.php';?></div>
	<div id="Question_pe_234" data-options="handle:'#dragg_234'" align="center">
<div id="dragg_234" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°08/08
				<input type="button" style="width:150px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pe_8.php';?></div>


<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_pe" data-options="handle:'#dragg_pe'" align="center">
<div id="dragg_pe" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cyclePaie/Paiee/form/Interface_pe_Synthese.php';?></div>
<!--*******************************************************************************************************-->

<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_pe"><?php include 'cyclePaie/Paiee/sms/Message slide question terminer pe.php'?></div>

<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_pe"><?php include 'cyclePaie/Paiee/sms/messRetpe.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_pe"><?php include 'cyclePaie/Paiee/sms/Message terminer question pe.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_pe"><?php include 'cyclePaie/Paiee/sms/Message terminer synthese pe.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_pe"><?php include 'cyclePaie/Paiee/sms/Message slide pe Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_pe"><?php include 'cyclePaie/Paiee/sms/sms_empty/Mess_vide_synth_pe.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_pe"><?php include 'cyclePaie/Paiee/sms/Message donnees perdues pe.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pe"><?php include 'cyclePaie/Paiee/sms/Message annulation question pe.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pe2"><?php include 'cyclePaie/Paiee/sms/Message_enregistre_question_pe2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pe3"><?php include 'cyclePaie/Paiee/sms/Message_enregistre_question_pe3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pe4"><?php include 'cyclePaie/Paiee/sms/Message_enregistre_question_pe4.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pe5"><?php include 'cyclePaie/Paiee/sms/Message_enregistre_question_pe5.php';?></div>
<!--*******************************************************************************************************-->


<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pe6"><?php include 'cyclePaie/Paiee/sms/Message_enregistre_question_pe6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pe7"><?php include 'cyclePaie/Paiee/sms/Message_enregistre_question_pe7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pe8"><?php include 'cyclePaie/Paiee/sms/Message_enregistre_question_pe8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pe9"><?php include 'cyclePaie/Paiee/sms/Message_enregistre_question_pe9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pe10"><?php include 'cyclePaie/Paiee/sms/Message_enregistre_question_pe10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pe11"><?php include 'cyclePaie/Paiee/sms/Message_enregistre_question_pe11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pe12"><?php include 'cyclePaie/Paiee/sms/Message_enregistre_question_pe12.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pe13"><?php include 'cyclePaie/Paiee/sms/Message_enregistre_question_pe13.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pe14"><?php include 'cyclePaie/Paiee/sms/Message_enregistre_question_pe14.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pe8"><?php include 'cyclePaie/Paiee/sms/Message_enregistre_question_pe8.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************************************************************************************-->

<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_pe1"><?php include 'cyclePaie/Paiee/sms/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pe2"><?php include 'cyclePaie/Paiee/sms/sms_empty/Mess_quest_vide_pe2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pe3"><?php include 'cyclePaie/Paiee/sms/sms_empty/Mess_quest_vide_pe3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pe4"><?php include 'cyclePaie/Paiee/sms/sms_empty/Mess_quest_vide_pe4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pe5"><?php include 'cyclePaie/Paiee/sms/sms_empty/Mess_quest_vide_pe5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pe6"><?php include 'cyclePaie/Paiee/sms/sms_empty/Mess_quest_vide_pe6.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pe7"><?php include 'cyclePaie/Paiee/sms/sms_empty/Mess_quest_vide_pe7.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pe8"><?php include 'cyclePaie/Paiee/sms/sms_empty/Mess_quest_vide_pe8.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pe9"><?php include 'cyclePaie/Paiee/sms/sms_empty/Mess_quest_vide_pe9.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pe10"><?php include 'cyclePaie/Paiee/sms/sms_empty/Mess_quest_vide_pe10.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pe11"><?php include 'cyclePaie/Paiee/sms/sms_empty/Mess_quest_vide_pe11.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pe12"><?php include 'cyclePaie/Paiee/sms/sms_empty/Mess_quest_vide_pe12.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pe13"><?php include 'cyclePaie/Paiee/sms/sms_empty/Mess_quest_vide_pe13.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pe14"><?php include 'cyclePaie/Paiee/sms/sms_empty/Mess_quest_vide_pe14.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pe8"><?php include 'cyclePaie/Paiee/sms/sms_empty/Mess_quest_vide_pe8.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_pe"><?php include 'cyclePaie/Paiee/sms/mess_vid_aud_pe.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************MESSAGE QUESTIONNAIRE NON REMPLI POUR SYNTHESE********************-->
<div id="mess_vide_obj_pe"><?php include 'cyclePaie/Paiee/sms/mess_vid_aud_pe.php'; ?></div>
<!--*******************************************************************************************************-->

</div>