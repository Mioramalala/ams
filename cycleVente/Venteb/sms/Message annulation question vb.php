
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_vb').click(function(){
		if((document.getElementById("commentaire_Question_vb1").value=="") || (document.getElementById("rad_Question_Oui_vb_1").checked==false && document.getElementById("rad_Question_NA_vb_1").checked==false && document.getElementById("rad_Question_Non_vb_1").checked==false)){
			$('#mess_quest_vide_vb1').show();
			$('#Question_vb_318').hide();
			$('#message_fermeture_question_vb').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vb").value;
			commentaire=document.getElementById("commentaire_Question_vb1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_vb_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_vb_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_vb_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Venteb/php/detect_objectif_exist_vb.php',
				data:{mission_id:mission_id, question_id:318, cycle_achat_id:26},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_vb(commentaire, qcm, mission_id, 318);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Venteb/php/update_object_vb.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:318},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleVente/Venteb/load/load_rep_vb.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_f').hide();
										$('#message_fermeture_question_vb').hide();
										$('#contvb').hide();
										$('#contRsciVente').show();
										openButtObjvb();
									}
								});
							}
						});
					}
				}
			});
		}	
	});
	$('#valider_Fermeture_Question_vb').click(function(){
		$('#message_fermeture_question_vb').hide();
		$('#fancybox_vb').hide();
		openButtObjvb();
	});
});
function openButtObjf(){
	document.getElementById("int_vb_Retour").disabled=false;
	document.getElementById("Int_vb_Continuer").disabled=false;
	document.getElementById("Int_vb_Synthese").disabled=false;
}
</script>

<div id="message_Retour_vb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_vb" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_vb" />
		</td>
	</tr>
</table>
</div>