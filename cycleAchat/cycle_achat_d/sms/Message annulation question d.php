<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_d').click(function(){
		if((document.getElementById("commentaire_Question_d1").value=="") || (document.getElementById("rad_Question_Oui_d_1").checked==false && document.getElementById("rad_Question_NA_d_1").checked==false && document.getElementById("rad_Question_Non_d_1").checked==false)){
			$('#mess_quest_vide_d1').show();
			$('#Question_d_34').hide();
			$('#message_fermeture_question_d').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_d").value;
			commentaire=document.getElementById("commentaire_Question_d1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_d_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_d_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_d_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_d/php/detect_objectif_exist_d.php',
				data:{mission_id:mission_id, question_id:34, cycle_achat_id:4},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_d(commentaire, qcm, mission_id, 34);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_d/php/update_achat_object_d.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:34},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleAchat/cycle_achat_d/load/load_rep_d.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_d').hide();
										$('#message_fermeture_question_d').hide();
										$('#dv_cont_obj_d').hide();
										$('#contenue_rsci').show();
										openButtObjd();
									}
								});
							}
						});
					}
				}
			});
		}	
	});
	$('#valider_Fermeture_Question_d').click(function(){
		$('#message_fermeture_question_d').hide();
		$('#fancybox_d').hide();
		openButtObjd();
	});
});
function openButtObjd(){
	document.getElementById("int_d_Retour").disabled=false;
	document.getElementById("Int_d_Continuer").disabled=false;
	document.getElementById("Int_d_Synthese").disabled=false;
}
</script>

<div id="message_Retour_d">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_d" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_d" />
		</td>
	</tr>
</table>
</div>