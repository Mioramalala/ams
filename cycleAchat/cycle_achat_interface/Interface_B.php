<?php

include '../../connexion.php';

$reponse=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=2');

$donnees=$reponse->fetch();

$conclusionIdb=$donnees['CONCLUSION_COMMENTAIRE'];

?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.easyui.min.js"></script>

<script>
$(document).ready(function() {
	$('#Int_Synthese_B').draggable();
	$('#int_conclusion_B_superviseur').draggable();
	$('#Question_B_1').draggable();
	$('#Question_B_2').draggable();
	$('#Question_B_3').draggable();
	$('#Question_B_4').draggable();
	$('#Question_B_5').draggable();
	$('#Question_B_6').draggable();
	$('#Question_B_7').draggable();
	$('#Question_B_8').draggable();
	$('#Question_B_9').draggable();
	$('#Question_B_10').draggable();
	$('#Question_B_11').draggable();
	$('#Question_B_12').draggable();
	$('#Question_B_13').draggable();
	$('#Question_B_14').draggable();
	$('#Question_B_15').draggable();
	$('#Question_B_16').draggable();
	$('#Question_B_17').draggable();
	$('#Question_B_18').draggable();
	$('#Question_B_19').draggable();
	$('#Question_B_20').draggable();
	$('#Question_B_21').draggable();
	$('#Question_B_22').draggable();
});
function afficheReponseQuestacb(imbId,imbIdCom){
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

<div id="int_B"><label class="lb_veuillez" id="lb_veuillez_aff"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id" style="display:none;" />
	<div id="Interface_Question_B"><?php include '../../cycleAchat/cycle_achat_load/load_b/load_quest_b.php'; ?></div>
	<div id="dv_table_b" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_b">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_b"><?php include '../../cycleAchat/cycle_achat_load/load_b/load_rep_b.php'; ?></div>
	<div id="Int_Droite_B">
		<input type="button" class="bouton" value="Retour" id="int_B_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_B_Continuer" /><br />
		<input type="button" class="bouton" value="Synthese" id="Int_B_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_B"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_B_1" data-options="handle:'#dragg_B1'" align="center">
<div id="dragg_B1">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/22 
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_1.php';?></div>
	<div id="Question_B_2" data-options="handle:'#dragg_B2'" align="center">
<div id="dragg_B2">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/22
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_2.php';?></div>
	<div id="Question_B_3" data-options="handle:'#dragg_B3'" align="center">
<div id="dragg_B3">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/22
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_3.php';?></div>
	<div id="Question_B_4" data-options="handle:'#dragg_B4'" align="center">
<div id="dragg_B4">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/22
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_4.php';?></div>
	<div id="Question_B_5" data-options="handle:'#dragg_B5'" align="center">
<div id="dragg_B5">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/22
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_5.php';?></div>
	<div id="Question_B_6" data-options="handle:'#dragg_B6'" align="center">
<div id="dragg_B6">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/22
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_6.php';?></div>
	<div id="Question_B_7" data-options="handle:'#dragg_B7'" align="center">
<div id="dragg_B7">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/22
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_7.php';?></div>
	<div id="Question_B_8" data-options="handle:'#dragg_B8'" align="center">
<div id="dragg_B8">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°08/22
				<input type="button" style="width:80px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_8.php';?></div>
	<div id="Question_B_9" data-options="handle:'#dragg_B9'" align="center">
<div id="dragg_B9">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/22
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_9.php';?></div>
	<div id="Question_B_10" data-options="handle:'#dragg_B10'" align="center">
<div id="dragg_B10">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/22
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_10.php';?></div>
	<div id="Question_B_11" data-options="handle:'#dragg_B11'" align="center">
<div id="dragg_B11">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/22
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:110px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_11.php';?></div>
	<div id="Question_B_12" data-options="handle:'#dragg_B12'" align="center">
<div id="dragg_B12">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/22
				<input type="button" style="width:120px;height:15px;background-color:#ccc" />
				<input type="button" style="width:100px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_12.php';?></div>
	<div id="Question_B_13" data-options="handle:'#dragg_B13'" align="center">
<div id="dragg_B13">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°13/22
				<input type="button" style="width:130px;height:15px;background-color:#ccc" />
				<input type="button" style="width:90px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_13.php';?></div>
	<div id="Question_B_14" data-options="handle:'#dragg_B14'" align="center">
<div id="dragg_B14">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°14/22
				<input type="button" style="width:140px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_14.php';?></div>
	<div id="Question_B_15" data-options="handle:'#dragg_B15'" align="center">
<div id="dragg_B15">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°15/22
				<input type="button" style="width:150px;height:15px;background-color:#ccc" />
				<input type="button" style="width:70px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_15.php';?></div>
	<div id="Question_B_16" data-options="handle:'#dragg_B16'" align="center">
<div id="dragg_B16">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°16/22
				<input type="button" style="width:160px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_16.php';?></div>
	<div id="Question_B_17" data-options="handle:'#dragg_B17'" align="center">
<div id="dragg_B17">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°17/22
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:50px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_17.php';?></div>
	<div id="Question_B_18" data-options="handle:'#dragg_B18'" align="center">
<div id="dragg_B18">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°18/22
				<input type="button" style="width:180px;height:15px;background-color:#ccc" />
				<input type="button" style="width:40px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_18.php';?></div>
	<div id="Question_B_19" data-options="handle:'#dragg_B19'" align="center">
<div id="dragg_B19">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°19/22
				<input type="button" style="width:190px;height:15px;background-color:#ccc" />
				<input type="button" style="width:30px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_19.php';?></div>
	<div id="Question_B_20" data-options="handle:'#dragg_B20'" align="center">
<div id="dragg_B20">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°20/22
				<input type="button" style="width:200px;height:15px;background-color:#ccc" />
				<input type="button" style="width:20px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_20.php';?></div>
	<div id="Question_B_21" data-options="handle:'#dragg_B21'" align="center">
<div id="dragg_B21">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°21/22
				<input type="button" style="width:210px;height:15px;background-color:#ccc" />
				<input type="button" style="width:10px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_21.php';?></div>
	<div id="Question_B_22" data-options="handle:'#dragg_B22'" align="center">
<div id="dragg_B22">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°22/22
				<input type="button" style="width:220px;height:15px;background-color:#ccc" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_B_22.php';?></div>


<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_B" data-options="handle:'#dragg_B'" align="center">
<div id="dragg_B" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include '../../cycleAchat/cycle_achat_interface/Interface_B_Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_B"><?php include '../../cycleAchat/cycle_achat_message/Message terminer synthese B.php';?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_B"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_vide_synth_B.php'; ?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_B"><?php include '../../cycleAchat/cycle_achat_message/Message slide B Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_B"><?php include '../../cycleAchat/cycle_achat_message/Message slide question terminer B.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_B"><?php include '../../cycleAchat/cycle_achat_message/Message retour B.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_B"><?php include '../../cycleAchat/cycle_achat_message/Message terminer question B.php'; ?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_B"><?php include '../../cycleAchat/cycle_achat_message/Message donnees perdues B.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B"><?php include '../../cycleAchat/cycle_achat_message/Message annulation question B.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B2"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B3"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B4"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B4.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B5"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B5.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B6"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B7"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B8"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B9"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B10"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B11"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B12"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B12.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B13"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B13.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B14"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B14.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B15"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B15.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B16"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B16.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B17"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B17.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B18"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B18.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B19"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B19.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B20"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B20.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B21"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B21.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_B22"><?php include '../../cycleAchat/cycle_achat_message/Message_enregistre_question_B22.php';?></div>
<!--*******************************************************************************************************-->
<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_B1"><?php include '../../cycleAchat/cycle_achat_message/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B2"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B3"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B4"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B5"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B6"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B6.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B7"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B7.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B8"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B8.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B9"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B9.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B10"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B10.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B11"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B11.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B12"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B12.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B13"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B13.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B14"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B14.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B15"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B15.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B16"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B16.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B17"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B17.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B18"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B18.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B19"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B19.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B20"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B20.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B21"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B21.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_B22"><?php include '../../cycleAchat/cycle_achat_message/cycle_achat_mess_vide_quest_B/Mess_quest_vide_B22.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_b"><?php include '../../cycleAchat/cycle_achat_message/mess_vid_aud_b.php'; ?></div>
<!--*******************************************************************************************************-->
</div>

