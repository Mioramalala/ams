<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';



$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=25 AND MISSION_ID='.$mission_id;
//print ($sql);
$verif=$bdd->query($sql);
$res_=$verif->fetch();
$validDepenseE=$res_["nb"];

?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script language="javascript">
var StDEID="";
 // Droit cycle by Tolotra
// Page : RSCI -> Cycle Trésorerie
// Tâche : Revue Cotrôles Trésorerie, numéro 26
$.ajax({
    type: 'POST',
    url: 'droitCycle.php',
    data: {task_id: 26},
    success: function (e) {
        var result = 0 === Number(e);
        $("#Int_de_Continuer").attr('disabled', result);
        $("#Int_de_Synthese").attr('disabled', result);
    }
});

$(function()
{
	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($validDepenseE==1) {

	?>
	$('#contde textarea').attr('disabled',true);
	$('#contde :input[type=radio]').attr('disabled',true);
	$('#contde #Synthese_de_Terminer').attr('disabled',true);
	<?php
	}
	//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	?>

	// Bouton retour menu achat
	$('#int_de_Retour').click(function(){
		$('#message_fermeture_de').show();
		$('#fancybox_de').show();
	});
	//Con$tinuer la question
	$('#Int_de_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_de").value;
		$.ajax({
			type:'POST',
			url:'cycleDepense/Depensee/php/aff_quest_fin_de.php',
			data:{mission_id:mission_id},
			success:function(e){
					StDEID=e;
					quetion_de="#Question_de_"+e;
					$(quetion_de).fadeIn(500);
					de=e;
					$.ajax({
						type:'POST',
						url:'cycleDepense/Depensee/php/getRepContinuer.php',
						data:{mission_id:mission_id, questId:e, cycleId:25},
						success:function(e1){
							eo=""+e1+"";
							doc=eo.split(',');
							cpt=1;
							for(i=312; i<317; i++){ 
								if(i==de){
									deId="de_"+cpt;
									deIdCom="de"+cpt;
									afficheReponseQuest(deId,deIdCom);
									break;
								}
								cpt++;
							}
							
						}
					});
				// }
				$('#dv_table_de').show();
				$('#lb_veuillez_aff_de').hide();
				$('#fancybox_de').show();
			}
		});
	});
	//la synthèse de de
	$('#Int_de_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_de").value;
		
		// se rediriger vers calcul score
		$.ajax({
			type:'POST',
			url:'cycleDepense/Depensee/php/select_score_de.php',
			data:{mission_id:mission_id},
			success:function(e){
			    $("#echo_score_de").html(e);
			}			
		});
		
		
		$.ajax({
			type:'POST',
			url:'cycleDepense/Depensee/php/cpt_de.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==6){
					$.ajax({
						type:'POST',
						url:'cycleDepense/Depensee/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:25},
						success:function(e){
							eo=""+e+"";
							doc=eo.split('*');
							document.getElementById("rd_Synthese_de_Faible").checked=false;
							document.getElementById("rd_Synthese_de_Moyen").checked=false;
							document.getElementById("rd_Synthese_de_Eleve").checked=false;
							document.getElementById("txt_Synthese_de").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_de_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_de_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_de_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_de').show();
					$('#fancybox_de').show();
				}
				else{
					$('#fancybox_de').show();
					$('#mess_vide_obj_de').show();
				}
			}
		});
	});
});
function afficheReponseQuest(deId,deIdCom){
	document.getElementById("rad_Question_Oui_"+deId).checked=false;
	document.getElementById("rad_Question_NA_"+deId).checked=false;
	document.getElementById("rad_Question_Non_"+deId).checked=false;
	if(doc[0]==0){
		document.getElementById("commentaire_Question_"+deIdCom).value="";
	}
	else
		document.getElementById("commentaire_Question_"+deIdCom).value=doc[0];
	if(doc[1]=='OUI'){
		document.getElementById("rad_Question_Oui_"+deId).checked=true;
	}
	else if(doc[1]=='N/A'){
		document.getElementById("rad_Question_NA_"+deId).checked=true;
	}
	else if(doc[1]=='NON'){
		document.getElementById("rad_Question_Non_"+deId).checked=true;
	}
}
</script>

<div id="int_de"><label class="lb_veuillez" id="lb_veuillez_aff_de"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_de" style="display:none;" />
	<div id="Interface_Question_de"><?php include 'cycleDepense/Depensee/load/load_quest_de.php'; ?></div>
	<div id="dv_table_de" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_de">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_de"></div>
	<div id="Int_Droite_de">
		<input type="button" class="bouton" value="Retour" id="int_de_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_de_Continuer" /><br />
		<input type="button" class="bouton" value="Synthèse" id="Int_de_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_de"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_de_312" data-options="handle:'#dragg_312'" align="center">
<div id="dragg_312" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/06
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_de_1.php';?></div>
	<div id="Question_de_313" data-options="handle:'#dragg_313'" align="center">
<div id="dragg_313" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/06
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_de_2.php';?></div>
	<div id="Question_de_314" data-options="handle:'#dragg_314'" align="center">
<div id="dragg_314" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/06
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_de_3.php';?></div>
	<div id="Question_de_315" data-options="handle:'#dragg_315'" align="center">
<div id="dragg_315" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/06
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_de_4.php';?></div>
	<div id="Question_de_316" data-options="handle:'#dragg_316'" align="center">
<div id="dragg_316" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/06
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_de_5.php';?></div>
	<div id="Question_de_317" data-options="handle:'#dragg_317'" align="center">
<div id="dragg_317" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/06
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_de_6.php';?></div>


<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_de" data-options="handle:'#dragg_de'" align="center">
<div id="dragg_de" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleDepense/Depensee/form/Interface_de_Synthese.php';?></div>
<!--*******************************************************************************************************-->

<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_de"><?php include 'cycleDepense/Depensee/sms/Message slide question terminer de.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_de"><?php include 'cycleDepense/Depensee/sms/messRetde.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_de"><?php include 'cycleDepense/Depensee/sms/Message terminer question de.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_de"><?php include 'cycleDepense/Depensee/sms/Message terminer synthese de.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_de"><?php include 'cycleDepense/Depensee/sms/Message slide de Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_de"><?php include 'cycleDepense/Depensee/sms/sms_empty/Mess_vide_synth_de.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_de"><?php include 'cycleDepense/Depensee/sms/Message donnees perdues de.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_de"><?php include 'cycleDepense/Depensee/sms/Message annulation question de.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_de2"><?php include 'cycleDepense/Depensee/sms/Message_enregistre_question_de2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_de3"><?php include 'cycleDepense/Depensee/sms/Message_enregistre_question_de3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_de4"><?php include 'cycleDepense/Depensee/sms/Message_enregistre_question_de4.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_de5"><?php include 'cycleDepense/Depensee/sms/Message_enregistre_question_de5.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_de6"><?php include 'cycleDepense/Depensee/sms/Message_enregistre_question_de6.php';?></div>
<!--*******************************************************************************************************-->?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_de1"><?php include 'cycleDepense/Depensee/sms/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_de2"><?php include 'cycleDepense/Depensee/sms/sms_empty/Mess_quest_vide_de2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_de3"><?php include 'cycleDepense/Depensee/sms/sms_empty/Mess_quest_vide_de3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_de4"><?php include 'cycleDepense/Depensee/sms/sms_empty/Mess_quest_vide_de4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_de5"><?php include 'cycleDepense/Depensee/sms/sms_empty/Mess_quest_vide_de5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_de6"><?php include 'cycleDepense/Depensee/sms/sms_empty/Mess_quest_vide_de6.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*******************************************************************************************************-->


<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_de"><?php include 'cycleDepense/Depensee/sms/mess_vid_aud_de.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************MESSAGE QUESTIONNAIRE NON REMPLI POUR SYNTHESE********************-->
<div id="mess_vide_obj_de"><?php include 'cycleDepense/Depensee/sms/mess_vid_aud_de.php'; ?></div>
<!--*******************************************************************************************************-->

</div>