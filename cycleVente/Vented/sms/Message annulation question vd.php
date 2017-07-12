
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_vd').click(function(){
		if((document.getElementById("commentaire_Question_vd1").value=="") || (document.getElementById("rad_Question_Oui_vd_1").checked==false && document.getElementById("rad_Question_NA_vd_1").checked==false && document.getElementById("rad_Question_Non_vd_1").checked==false)){
			$('#mess_quest_vide_vd1').show();
			$('#Question_vd_351').hide();
			$('#message_fermeture_question_vd').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vd").value;
			commentaire=document.getElementById("commentaire_Question_vd1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_vd_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_vd_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_vd_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Vented/php/detect_objectif_exist_vd.php',
				data:{mission_id:mission_id, question_id:351, cycle_achat_id:28},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_vd(commentaire, qcm, mission_id, 351);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Vented/php/update_object_vd.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:351},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleVente/Vented/load/load_rep_vd.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_f').hide();
										$('#message_fermeture_question_vd').hide();
										$('#contvd').hide();
										$('#contRsciVente').show();
										openButtObjvd();
									}
								});
							}
						});
					}
				}
			});
		}	
	});
	$('#valider_Fermeture_Question_vd').click(function(){
		$('#message_fermeture_question_vd').hide();
		$('#fancybox_vd').hide();
		openButtObjvd();
	});
});
function openButtObjf(){
	document.getElementById("int_vd_Retour").disabled=false;
	document.getElementById("Int_vd_Continuer").disabled=false;
	document.getElementById("Int_vd_Synthese").disabled=false;
}
</script>

<div id="message_Retour_vd">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_vd" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_vd" />
		</td>
	</tr>
</table>
</div>