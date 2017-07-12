<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';



$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=15 AND MISSION_ID='.$mission_id;
//print ($sql);
$verif=$bdd->query($sql);
$res_=$verif->fetch();
$validPaieC=$res_["nb"];

?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script language="javascript">
var StPCID="";

// Droit cycle by Tolotra
// Page : RSCI -> Cycle paie
// Tâche : Revue Cotrôles Paie, numéro 21
$.ajax({
    type: 'POST',
    url: 'droitCycle.php',
    data: {task_id: 21},
    success: function (e) {
        var result = 0 === Number(e);
        $("#Int_pc_Continuer").attr('disabled', result);
        $("#Int_pc_Synthese").attr('disabled', result);
    }
});


$(function()
{

	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($validPaieC==1)
	{

	?>
	$('#contpc textarea').attr('disabled',true);
	$('#contpc :input[type=radio]').attr('disabled',true);
	$('#contpc #Synthese_pc_Terminer').attr('disabled',true);
	<?php
	}
	//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	?>

	// Bouton retour menu achat
	$('#int_pc_Retour').click(function(){
		$('#message_fermeture_pc').show();
		$('#fancybox_pc').show();
	});
	//Con$tinuer la question
	$('#Int_pc_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_pc").value;
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paiec/php/aff_quest_fin_pc.php',
			data:{mission_id:mission_id},
			success:function(e){
				
					StPCID=e;
					quetion_pc="#Question_pc_"+e;
					$(quetion_pc).fadeIn(500);
					pc=e;
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paiec/php/getRepContinuer.php',
						data:{mission_id:mission_id, questId:e, cycleId:15},
						success:function(e1){
							eo=""+e1+"";
							doc=eo.split(',');
							cpt=1;
							for(i=196; i<221; i++){ 
								if(i==pc){
									pcId="pc_"+cpt;
									pcIdCom="pc"+cpt;
									afficheReponseQuest(pcId,pcIdCom);
									break;
								}
								cpt++;
							}
							
						}
					});
				// }
				$('#dv_table_pc').show();
				$('#lb_veuillez_aff_pc').hide();
				$('#fancybox_pc').show();
			}
		});
	});
	//la synthèse de pc
	$('#Int_pc_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_pc").value;
		
		// se rediriger vers calcul score
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paiec/php/select_score_pc.php',
			data:{mission_id:mission_id},
			success:function(e){
			    $("#echo_score_pc").html(e);
			}			
		});
		
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paiec/php/cpt_pc.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==26){
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paiec/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:15},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("rd_Synthese_pc_Faible").checked=false;
							document.getElementById("rd_Synthese_pc_Moyen").checked=false;
							document.getElementById("rd_Synthese_pc_Eleve").checked=false;
							document.getElementById("txt_Synthese_pc").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_pc_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_pc_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_pc_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_pc').show();
					$('#fancybox_pc').show();
				}
				else{
					$('#fancybox_pc').show();
					$('#mess_vide_obj_pc').show();
				}
			}
		});
	});
});
function afficheReponseQuest(pcId,pcIdCom){
	document.getElementById("rad_Question_Oui_"+pcId).checked=false;
	document.getElementById("rad_Question_NA_"+pcId).checked=false;
	document.getElementById("rad_Question_Non_"+pcId).checked=false;
	if(doc[0]==0){
		document.getElementById("commentaire_Question_"+pcIdCom).value="";
	}
	else
		document.getElementById("commentaire_Question_"+pcIdCom).value=doc[0];
	if(doc[1]=='OUI'){
		document.getElementById("rad_Question_Oui_"+pcId).checked=true;
	}
	else if(doc[1]=='N/A'){
		document.getElementById("rad_Question_NA_"+pcId).checked=true;
	}
	else if(doc[1]=='NON'){
		document.getElementById("rad_Question_Non_"+pcId).checked=true;
	}
}
</script>

<div id="int_pc"><label class="lb_veuillez" id="lb_veuillez_aff_pc"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_pc" style="display:none;" />
	<div id="Interface_Question_pc"><?php include 'cyclePaie/Paiec/load/load_quest_pc.php'; ?></div>
	<div id="dv_table_pc" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_pc">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_pc"></div>
	<div id="Int_Droite_pc">
		<input type="button" class="bouton" value="Retour" id="int_pc_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_pc_Continuer" /><br />
		<input type="button" class="bouton" value="Synthèse" id="Int_pc_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_pc"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_pc_196" data-options="handle:'#dragg_196'" align="center">
<div id="dragg_196" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/29
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_pc_1.php';?></div>
	<div id="Question_pc_197" data-options="handle:'#dragg_197'" align="center">
<div id="dragg_197" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/26
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_pc_2.php';?></div>
	<div id="Question_pc_198" data-options="handle:'#dragg_198'" align="center">
<div id="dragg_198" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/26
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_3.php';?></div>
	<div id="Question_pc_199" data-options="handle:'#dragg_199'" align="center">
<div id="dragg_199" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/26
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_4.php';?></div>
	<div id="Question_pc_200" data-options="handle:'#dragg_200'" align="center">
<div id="dragg_200" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/26
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_5.php';?></div>
	<div id="Question_pc_201" data-options="handle:'#dragg_201'" align="center">
<div id="dragg_201" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/26
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_6.php';?></div>
	<div id="Question_pc_202" data-options="handle:'#dragg_202'" align="center">
<div id="dragg_202" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/26
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_7.php';?></div>
	<div id="Question_pc_203" data-options="handle:'#dragg_203'" align="center">
<div id="dragg_203" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/26
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_8.php';?></div>
	<div id="Question_pc_204" data-options="handle:'#dragg_204'" align="center">
<div id="dragg_204" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/26
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_9.php';?></div>
	<div id="Question_pc_205" data-options="handle:'#dragg_205'" align="center">
<div id="dragg_205" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/26
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_10.php';?></div>
	<div id="Question_pc_206" data-options="handle:'#dragg_206'" align="center">
<div id="dragg_206" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/26
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_11.php';?></div>
	<div id="Question_pc_207" data-options="handle:'#dragg_207'" align="center">
<div id="dragg_207" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/26
				<input type="button" style="width:120px;height:15px;background-color:#ccc" />
				<input type="button" style="width:110px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_12.php';?></div>
	<div id="Question_pc_208" data-options="handle:'#dragg_208'" align="center">
<div id="dragg_208" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°13/26
				<input type="button" style="width:165px;height:15px;background-color:#ccc" />
				<input type="button" style="width:100px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_13.php';?></div>
	<div id="Question_pc_209" data-options="handle:'#dragg_209'" align="center">
<div id="dragg_209" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°14/26
				<input type="button" style="width:140px;height:15px;background-color:#ccc" />
				<input type="button" style="width:90px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_14.php';?></div>
	<div id="Question_pc_210" data-options="handle:'#dragg_210'" align="center">
<div id="dragg_210" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°15/26
				<input type="button" style="width:167px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_15.php';?></div>
		<div id="Question_pc_211" data-options="handle:'#dragg_211'" align="center">
<div id="dragg_211" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°16/26
				<input type="button" style="width:160px;height:15px;background-color:#ccc" />
				<input type="button" style="width:70px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_16.php';?></div>
	<div id="Question_pc_212" data-options="handle:'#dragg_212'" align="center">
<div id="dragg_212" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°17/26
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_17.php';?></div>
		<div id="Question_pc_213" data-options="handle:'#dragg_213'" align="center">
<div id="dragg_213" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°18/26
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_18.php';?></div>
		<div id="Question_pc_214" data-options="handle:'#dragg_214'" align="center">
<div id="dragg_214" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°19/26
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_19.php';?></div>
		<div id="Question_pc_215" data-options="handle:'#dragg_215'" align="center">
<div id="dragg_215" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°20/26
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_20.php';?></div>
		<div id="Question_pc_216" data-options="handle:'#dragg_216'" align="center">
<div id="dragg_216" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°21/26
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_21.php';?></div>
		<div id="Question_pc_217" data-options="handle:'#dragg_217'" align="center">
<div id="dragg_217" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°22/26
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_22.php';?></div>
		<div id="Question_pc_218" data-options="handle:'#dragg_218'" align="center">
<div id="dragg_218" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°23/26
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_23.php';?></div>
		<div id="Question_pc_219" data-options="handle:'#dragg_219'" align="center">
<div id="dragg_219" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°24/26
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_24.php';?></div>
		<div id="Question_pc_220" data-options="handle:'#dragg_220'" align="center">
<div id="dragg_220" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°25/26
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_25.php';?></div>
	<div id="Question_pc_221" data-options="handle:'#dragg_221'" align="center">
<div id="dragg_221" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°26/26
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_pc_26.php';?></div>


<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_pc" data-options="handle:'#dragg_pc'" align="center">
<div id="dragg_pc" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cyclePaie/Paiec/form/Interface_pc_Synthese.php';?></div>
<!--*******************************************************************************************************-->

<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_pc"><?php include 'cyclePaie/Paiec/sms/Message slide question terminer pc.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_pc"><?php include 'cyclePaie/Paiec/sms/messRetpc.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_pc"><?php include 'cyclePaie/Paiec/sms/Message terminer question pc.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_pc"><?php include 'cyclePaie/Paiec/sms/Message terminer synthese pc.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_pc"><?php include 'cyclePaie/Paiec/sms/Message slide pc Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_pc"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_vide_synth_pc.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_pc"><?php include 'cyclePaie/Paiec/sms/Message donnees perdues pc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc"><?php include 'cyclePaie/Paiec/sms/Message annulation question pc.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc2"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc3"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc4"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc4.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc5"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc5.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc6"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc7"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc8"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc9"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc10"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc11"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc12"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc12.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc13"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc13.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc14"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc14.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc15"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc15.php';?></div>
<!--*******************************************************************************************************-->
<div id="message_fermeture_question_pc16"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc16.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc17"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc17.php';?></div>
<!--*******************************************************************************************************-->

<div id="message_fermeture_question_pc18"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc18.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc19"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc19.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc20"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc20.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc21"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc21.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc22"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc22.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc23"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc23.php';?></div>
<!--*******************************************************************************************************-->
<div id="message_fermeture_question_pc24"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc24.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc25"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc25.php';?></div>
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_pc26"><?php include 'cyclePaie/Paiec/sms/Message_enregistre_question_pc26.php';?></div>
<!--***********************************Message de fermeture de toutes les question*************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_pc1"><?php include 'cyclePaie/Paiec/sms/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc2"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc3"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc4"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc5"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc6"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc6.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc7"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc7.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc8"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc8.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc9"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc9.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc10"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc10.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc11"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc11.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc12"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc12.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc13"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc13.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc14"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc14.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc15"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc15.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc16"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc16.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc17"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc17.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc18"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc18.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc19"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc19.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc20"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc20.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc21"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc21.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc22"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc22.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc23"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc23.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc24"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc24.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc25"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc25.php'; ?></div>
<!--*******************************************************************************************************-->

<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_pc26"><?php include 'cyclePaie/Paiec/sms/sms_empty/Mess_quest_vide_pc26.php'; ?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_pc"><?php include 'cyclePaie/Paiec/sms/mess_vid_aud_pc.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************MESSAGE QUESTIONNAIRE NON REMPLI POUR SYNTHESE********************-->
<div id="mess_vide_obj_pc"><?php include 'cyclePaie/Paiec/sms/mess_vid_aud_pc.php'; ?></div>
<!--*******************************************************************************************************-->

</div>