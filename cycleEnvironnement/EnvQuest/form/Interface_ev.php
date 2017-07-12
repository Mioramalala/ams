<?php
@session_start();
$mission_id=$_SESSION['idMission'];
include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';



$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=31 AND MISSION_ID='.$mission_id;
//print ($sql);
$verif=$bdd->query($sql);
$res_=$verif->fetch();
$validEnvA=$res_["nb"];

?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script>

 // Droit cycle by Tolotra
// Page : RSCI -> Environnement de Contrôle
// Tâche : Revue environnement de contrôle, numéro 43
$.ajax({
    type: 'POST',
    url: 'droitCycle.php',
    data: {task_id: 43},
    success: function (e) {
        var result = 0 === Number(e);
        $("#Int_ev_Continuer").attr('disabled', result);
        $("#Int_ev_Synthese").attr('disabled', result);
    }
});

$(function(){


	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($validEnvA==1)
	{

	?>
		$('textarea').attr('disabled',true); 
		$(':input[type=radio]').attr('disabled',true); 
		$('#Synthese_ev_Terminer').attr('disabled',true);
	<?php
	}
	//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
		?>

	// Bouton retour menu achat
	$('#int_ev_Retour').click(function(){
		$('#message_fermeture_ev').show();
		$('#fancybox_ev').show();
	});
	//Con$tinuer la question
	$('#Int_ev_Continuer').click(function()
	{

			mission_id=document.getElementById("txt_mission_id_ev").value;
			$.ajax({
				type:'POST',
				url:'cycleEnvironnement/EnvQuest/php/aff_quest_fin_ev.php',
				data:{mission_id:mission_id},
				success:function(e)
				{

						quetion_ev="#Question_ev_"+e;

					$(quetion_ev).css("display","inline-block");
						$(quetion_ev).fadeIn(500);
						ev=e;
						$.ajax({
							type:'POST',
							url:'cycleEnvironnement/EnvQuest/php/getRepContinuer.php',
							data:{mission_id:mission_id, questId:e, cycleId:31},
							success:function(e1)
							{
								eo=""+e1+"";
								doc=eo.split(',');
								cpt=1;
								for(i=405; i<431; i++){
									if(i==ev){
										evId="ev_"+cpt;
										evIdCom="ev"+cpt;
										afficheReponseQuest(evId,evIdCom);
										break;
									}
									cpt++;
								}

							}
						});
					// }
					$('#dv_table_ev').show();
					$('#lb_veuillez_aff_ev').hide();
					$('#fancybox_ev').show();
				}
			});


	});
	//la synthèse de ev
	$('#Int_ev_Synthese').click(function()
	{

		// se rediriger vers calcul score
		mission_id=document.getElementById("txt_mission_id_ev").value;
		$.ajax({
			type:'POST',
			url:'cycleEnvironnement/EnvQuest/php/select_score_ev.php',
			data:{mission_id:mission_id},
			success:function(e){
			    $("#echo_score_ev").html(e);
			}			
		});
		
		$.ajax({
			type:'POST',
			url:'cycleEnvironnement/EnvQuest/php/cpt_ev.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e>=27){
					$.ajax({
						type:'POST',
						url:'cycleEnvironnement/EnvQuest/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:31},
						success:function(e)
						{
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("rd_Synthese_ev_Faible").checked=false;
							document.getElementById("rd_Synthese_ev_Moyen").checked=false;
							document.getElementById("rd_Synthese_ev_Eleve").checked=false;
							document.getElementById("txt_Synthese_ev").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_ev_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_ev_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_ev_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_ev').show();
					$('#fancybox_ev').show();
				}
				else{
					$('#fancybox_ev').show();
					$('#mess_vide_obj_ev').show();
				}
			}
		});
	});
});
function afficheReponseQuest(evId,evIdCom){
	document.getElementById("rad_Question_Oui_"+evId).checked=false;
	//document.getElementById("rad_Question_NA_"+evId).checked=false;
	document.getElementById("rad_Question_Non_"+evId).checked=false;
	if(doc[0]==0){
		document.getElementById("commentaire_Question_"+evIdCom).value="";
	}
	else
		document.getElementById("commentaire_Question_"+evIdCom).value=doc[0];
	if(doc[1]=='OUI'){
		document.getElementById("rad_Question_Oui_"+evId).checked=true;
	}
	// else if(doc[1]=='N/A'){
	// 	document.getElementById("rad_Question_NA_"+evId).checked=true;
	// }
	else if(doc[1]=='NON'){
		document.getElementById("rad_Question_Non_"+evId).checked=true;
	}
}
</script>

<div id="int_ev"><label class="lb_veuillez" id="lb_veuillez_aff_ev"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_ev" style="display:none;" />
	<div id="Interface_Question_ev"><?php include 'cycleEnvironnement/EnvQuest/load/load_quest_ev.php'; ?></div>
	<div id="dv_table_ev" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_ev">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_ev"></div>
	<div id="Int_Droite_ev">
		<input type="button" class="bouton" value="Retour" id="int_ev_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_ev_Continuer" /><br />
		<input type="button" class="bouton" value="Synthèse" id="Int_ev_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_ev"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_ev_405" data-options="handle:'#dragg_405'" align="center">
<div id="dragg_405" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/29
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_ev_1.php';?></div>
	<div id="Question_ev_406" data-options="handle:'#dragg_406'" align="center">
<div id="dragg_406" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/27
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_ev_2.php';?></div>
	<div id="Question_ev_407" data-options="handle:'#dragg_407'" align="center">
<div id="dragg_407" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/27
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_3.php';?></div>
	<div id="Question_ev_408" data-options="handle:'#dragg_408'" align="center">
<div id="dragg_408" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/27
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_4.php';?></div>
	<div id="Question_ev_409" data-options="handle:'#dragg_409'" align="center">
<div id="dragg_409" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/27
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_5.php';?></div>
	<div id="Question_ev_410" data-options="handle:'#dragg_410'" align="center">
<div id="dragg_410" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/27
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_6.php';?></div>
	<div id="Question_ev_411" data-options="handle:'#dragg_411'" align="center">
<div id="dragg_411" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/27
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_7.php';?></div>
	<div id="Question_ev_412" data-options="handle:'#dragg_412'" align="center">
<div id="dragg_412" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/27
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_8.php';?></div>
	<div id="Question_ev_413" data-options="handle:'#dragg_413'" align="center">
<div id="dragg_413" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/27
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_9.php';?></div>
	<div id="Question_ev_414" data-options="handle:'#dragg_414'" align="center">
<div id="dragg_414" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/27
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_10.php';?></div>
	<div id="Question_ev_415" data-options="handle:'#dragg_415'" align="center">
<div id="dragg_415" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/27
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_11.php';?></div>
	<div id="Question_ev_416" data-options="handle:'#dragg_416'" align="center">
<div id="dragg_416" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/27
				<input type="button" style="width:120px;height:15px;background-color:#ccc" />
				<input type="button" style="width:110px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_12.php';?></div>
	<div id="Question_ev_417" data-options="handle:'#dragg_417'" align="center">
<div id="dragg_417" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°13/27
				<input type="button" style="width:165px;height:15px;background-color:#ccc" />
				<input type="button" style="width:100px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_13.php';?></div>
	<div id="Question_ev_418" data-options="handle:'#dragg_418'" align="center">
<div id="dragg_418" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°14/27
				<input type="button" style="width:140px;height:15px;background-color:#ccc" />
				<input type="button" style="width:90px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_14.php';?></div>
	<div id="Question_ev_419" data-options="handle:'#dragg_419'" align="center">
<div id="dragg_419" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°15/27
				<input type="button" style="width:167px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_15.php';?></div>
		<div id="Question_ev_420" data-options="handle:'#dragg_420'" align="center">
<div id="dragg_420" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°16/27
				<input type="button" style="width:160px;height:15px;background-color:#ccc" />
				<input type="button" style="width:70px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_16.php';?></div>
	<div id="Question_ev_421" data-options="handle:'#dragg_421'" align="center">
<div id="dragg_421" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°17/27
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_17.php';?></div>
		<div id="Question_ev_422" data-options="handle:'#dragg_422'" align="center">
<div id="dragg_422" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°18/27
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_18.php';?></div>
		<div id="Question_ev_423" data-options="handle:'#dragg_423'" align="center">
<div id="dragg_423" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°19/27
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_19.php';?></div>
		<div id="Question_ev_424" data-options="handle:'#dragg_424'" align="center">
<div id="dragg_424" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°20/27
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_20.php';?></div>
		<div id="Question_ev_425" data-options="handle:'#dragg_425'" align="center">
<div id="dragg_425" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°21/27
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_21.php';?></div>
		<div id="Question_ev_426" data-options="handle:'#dragg_426'" align="center">
<div id="dragg_426" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°22/27
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_22.php';?></div>
		<div id="Question_ev_427" data-options="handle:'#dragg_427'" align="center">
<div id="dragg_427" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°23/27
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_23.php';?></div>
		<div id="Question_ev_428" data-options="handle:'#dragg_428'" align="center">
<div id="dragg_428" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°24/27
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_24.php';?></div>
		<div id="Question_ev_429" data-options="handle:'#dragg_429'" align="center">
<div id="dragg_429" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°25/27
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_25.php';?></div>
	<div id="Question_ev_430" data-options="handle:'#dragg_430'" align="center">
<div id="dragg_430" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°26/27
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_26.php';?></div>
	<div id="Question_ev_431" data-options="handle:'#dragg_431'" align="center">
<div id="dragg_431" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°27/27
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_ev_27.php';?></div>

<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_ev" data-options="handle:'#dragg_ev'" align="center">
<div id="dragg_ev" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleEnvironnement/EnvQuest/form/Interface_ev_Synthese.php';?></div>
<!--*******************************************************************************************************-->

<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_ev"><?php include 'cycleEnvironnement/EnvQuest/sms/Message slide question terminer ev.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_ev"><?php include 'cycleEnvironnement/EnvQuest/sms/messRetev.php';?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_ev"><?php include 'cycleEnvironnement/EnvQuest/sms/Message terminer question ev.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_ev"><?php include 'cycleEnvironnement/EnvQuest/sms/Message terminer synthese ev.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_ev"><?php include 'cycleEnvironnement/EnvQuest/sms/Message slide ev Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_ev"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_vide_synth_ev.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_ev"><?php include 'cycleEnvironnement/EnvQuest/sms/Message donnees perdues ev.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev"><?php include 'cycleEnvironnement/EnvQuest/sms/Message annulation question ev.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev2"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev3"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev4"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev4.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev5"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev5.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev6"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev7"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev8"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev9"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev10"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev11"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev12"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev12.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev13"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev13.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev14"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev14.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev15"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev15.php';?></div>
<!--*******************************************************************************************************-->
<div id="message_fermeture_question_ev16"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev16.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev17"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev17.php';?></div>
<!--*******************************************************************************************************-->

<div id="message_fermeture_question_ev18"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev18.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev19"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev19.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev20"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev20.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev21"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev21.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev22"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev22.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev23"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev23.php';?></div>
<!--*******************************************************************************************************-->
<div id="message_fermeture_question_ev24"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev24.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev25"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev25.php';?></div>
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_ev26"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev26.php';?></div>
<div id="message_fermeture_question_ev27"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_enregistre_question_ev27.php';?></div>
<!--***********************************Message de fermeture de toutes les question*************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_ev1"><?php include 'cycleEnvironnement/EnvQuest/sms/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev2"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev3"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev4"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev5"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev6"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev6.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev7"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev7.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev8"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev8.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev9"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev9.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev10"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev10.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev11"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev11.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev12"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev12.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev13"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev13.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev14"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev14.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev15"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev15.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev16"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev16.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev17"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev17.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev18"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev18.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev19"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev19.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev20"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev20.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev21"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev21.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev22"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev22.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev23"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev23.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev24"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev24.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev25"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev25.php'; ?></div>
<!--*******************************************************************************************************-->

<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_ev26"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev26.php'; ?></div>
<div id="mess_quest_vide_ev26"><?php include 'cycleEnvironnement/EnvQuest/sms/sms_empty/Mess_quest_vide_ev27.php'; ?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_ev"><?php include 'cycleEnvironnement/EnvQuest/sms/mess_vid_aud_ev.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************MESSAGE QUESTIONNAIRE NON REMPLI POUR SYNTHESE********************-->
<div id="mess_vide_obj_ev"><?php include 'cycleEnvironnement/EnvQuest/sms/mess_vid_aud_ev.php'; ?></div>
<!--*******************************************************************************************************-->

</div>