<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';



$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=16 AND MISSION_ID='.$mission_id;
//print ($sql);
$verif=$bdd->query($sql);
$res_=$verif->fetch();
$validPaieD=$res_["nb"];

?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script language="javascript">
var StPDID="";

// Droit cycle by Tolotra
// Page : RSCI -> Cycle paie
// Tâche : Revue Cotrôles Paie, numéro 21
$.ajax({
    type: 'POST',
    url: 'droitCycle.php',
    data: {task_id: 21},
    success: function (e) {
        var result = 0 === Number(e);
        $("#Int_pd_Continuer").attr('disabled', result);
        $("#Int_pd_Synthese").attr('disabled', result);
    }
});

$(function()
{

	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($validPaieD==1)
	{

	?>
	$('#contpd textarea').attr('disabled',true);
	$('#contpd :input[type=radio]').attr('disabled',true);
	$('#contpd #Synthese_pd_Terminer').attr('disabled',true);
	<?php
	}
	//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	?>
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
			url:'cyclePaie/Paied/php/aff_quest_fin_pd.php',
			data:{mission_id:mission_id},
			success:function(e){
				    stPDID=e;
					quetion_pd="#Question_pd_"+e;
					$(quetion_pd).fadeIn(500);
					pd=e;
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paied/php/getRepContinuer.php',
						data:{mission_id:mission_id, questId:e, cycleId:16},
						success:function(e1){
							eo=""+e1+"";
							doc=eo.split(',');
							cpt=1;
							for(i=222; i<226; i++){ 
								if(i==pd){
									pdId="pd_"+cpt;
									pdIdCom="pd"+cpt;
									afficheReponseQuest(pdId,pdIdCom);
									break;
								}
								cpt++;
							}
							
						}
					});
				// }
				$('#dv_table_pd').show();
				$('#lb_veuillez_aff_pd').hide();
				$('#fancybox_pd').show();
			}
		});
	});
	//la synthèse de b
	$('#Int_pd_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_pd").value;
		
		// se rediriger vers calcul score
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paied/php/select_score_pd.php',
			data:{mission_id:mission_id},
			success:function(e){
			    $("#echo_score_pd").html(e);
			}			
		});
		
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paied/php/cpt_pd.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==5){
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paied/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:16},
						success:function(e){
							eo=""+e+"";
							doc=eo.split('*');
							document.getElementById("rd_Synthese_pd_Faible").checked=false;
							document.getElementById("rd_Synthese_pd_Moyen").checked=false;
							document.getElementById("rd_Synthese_pd_Eleve").checked=false;
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
function afficheReponseQuest(pdId,pdIdCom){
	document.getElementById("rad_Question_Oui_"+pdId).checked=false;
	document.getElementById("rad_Question_NA_"+pdId).checked=false;
	document.getElementById("rad_Question_Non_"+pdId).checked=false;
	if(doc[0]==0){
		document.getElementById("commentaire_Question_"+pdIdCom).value="";
	}
	else
		document.getElementById("commentaire_Question_"+pdIdCom).value=doc[0];
	if(doc[1]=='OUI'){
		document.getElementById("rad_Question_Oui_"+pdId).checked=true;
	}
	else if(doc[1]=='N/A'){
		document.getElementById("rad_Question_NA_"+pdId).checked=true;
	}
	else if(doc[1]=='NON'){
		document.getElementById("rad_Question_Non_"+pdId).checked=true;
	}
}
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
		<input type="button" class="bouton" value="Synthèse" id="Int_pd_Synthese" /><br />
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
			<td class="td_Titre_Question" align="center">QUESTION N°01/05
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
			<td class="td_Titre_Question" align="center">QUESTION N°02/05
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
			<td class="td_Titre_Question" align="center">QUESTION N°03/05
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
			<td class="td_Titre_Question" align="center">QUESTION N°04/05
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
			<td class="td_Titre_Question" align="center">QUESTION N°05/05
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pd_5.php';?></div>


<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_pd" data-options="handle:'#dragg_pd'" align="center">
<div id="dragg_pd" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cyclePaie/Paied/form/Interface_pd_Synthese.php';?></div>
<!--*******************************************************************************************************-->

<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_pd"><?php include 'cyclePaie/Paied/sms/Message slide question terminer pd.php'?></div>

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
<div id="message_fermeture_question_pd5"><?php include 'cyclePaie/Paied/sms/Message_enregistre_question_pd5.php';?></div>
<!--*******************************************************************************************************-->

<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_pd1"><?php include 'cyclePaie/Paied/sms/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pd2"><?php include 'cyclePaie/Paied/sms/sms_empty/Mess_quest_vide_pd2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pd3"><?php include 'cyclePaie/Paied/sms/sms_empty/Mess_quest_vide_pd3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pd4"><?php include 'cyclePaie/Paied/sms/sms_empty/Mess_quest_vide_pd4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pd5"><?php include 'cyclePaie/Paied/sms/sms_empty/Mess_quest_vide_pd5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_pd"><?php include 'cyclePaie/Paied/sms/mess_vid_aud_pd.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************MESSAGE QUESTIONNAIRE NON REMPLI POUR SYNTHESE********************-->
<div id="mess_vide_obj_pd"><?php include 'cyclePaie/Paied/sms/mess_vid_aud_pd.php'; ?></div>
<!--*******************************************************************************************************-->

</div>