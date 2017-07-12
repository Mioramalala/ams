<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_imb').click(function(){
		if((document.getElementById("commentaire_Question_imb1").value=="") || (document.getElementById("rad_Question_Oui_imb_1").checked==false && document.getElementById("rad_Question_NA_imb_1").checked==false && document.getElementById("rad_Question_Non_imb_1").checked==false)){
			$('#mess_quest_vide_imb1').show();
			$('#Question_imb_70').hide();
			$('#message_fermeture_question_imb').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_imb").value;
			commentaire=document.getElementById("commentaire_Question_imb1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_imb_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_imb_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_imb_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleImmo/immob/php/detect_objectif_exist_imb.php',
				data:{mission_id:mission_id, question_id:70, cycle_achat_id:7},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_imb(commentaire, qcm, mission_id, 70);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleImmo/immob/php/update_object_imb.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:70},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleImmo/immob/load/load_rep_imb.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_f').hide();
										$('#message_fermeture_question_imb').hide();
										$('#contimb').hide();
										$('#contRsciImmo').show();
										openButtObjimb();
									}
								});
							}
						});
					}
				}
			});
		}	
	});
	$('#valider_Fermeture_Question_imb').click(function(){
		$('#message_fermeture_question_imb').hide();
		$('#fancybox_imb').hide();
		openButtObjimb();
	});
});
function openButtObjf(){
	//document.getElementById("int_imb_Retour").disabled=false;
	//document.getElementById("Int_imb_Continuer").disabled=false;
	//document.getElementById("Int_imb_Synthese").disabled=false;
}
</script>

<div id="message_Retour_imb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_imb" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_imb" />
		</td>
	</tr>
</table>
</div>