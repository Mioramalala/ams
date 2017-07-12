
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_rb').click(function(){
		if((document.getElementById("commentaire_Question_rb1").value=="" && document.getElementById("rad_Question_Non_rb_1").checked== true) || (document.getElementById("rad_Question_Oui_rb_1").checked==false && document.getElementById("rad_Question_NA_rb_1").checked==false && document.getElementById("rad_Question_Non_rb_1").checked==false)){
			$('#mess_quest_vide_rb1').show();
			$('#Question_rb_235').hide();
			$('#message_fermeture_question_rb').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_rb").value;
			commentaire=document.getElementById("commentaire_Question_rb1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_rb_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_rb_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_rb_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recetteb/php/detect_objectif_exist_rb.php',
				data:{mission_id:mission_id, question_id:235, cycle_achat_id:18},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_rb(commentaire, qcm, mission_id, 235);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recetteb/php/update_object_rb.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:235},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleRecette/Recetteb/load/load_rep_rb.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_f').hide();
										$('#message_fermeture_question_rb').hide();
										$('#contrb').hide();
										$('#contRsciRecette').show();
										openButtObjrb();
									}
								});
							}
						});
					}
				}
			});
		}	
	});
	$('#valider_Fermeture_Question_rb').click(function(){
		$('#message_fermeture_question_rb').hide();
		$('#fancybox_rb').hide();
		openButtObjrb();
	});
});
function openButtObjf(){
	document.getElementById("int_rb_Retour").disabled=false;
	document.getElementById("Int_rb_Continuer").disabled=false;
	document.getElementById("Int_rb_Synthese").disabled=false;
}
</script>

<div id="message_Retour_rb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_rb" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_rb" />
		</td>
	</tr>
</table>
</div>