
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_db12').click(function(){	
	if((document.getElementById("commentaire_Question_db12").value=="" && document.getElementById("rad_Question_Non_db_12").checked== true) || (document.getElementById("rad_Question_Oui_db_12").checked==false && document.getElementById("rad_Question_NA_db_12").checked==false && document.getElementById("rad_Question_Non_db_12").checked==false)){
			$('#mess_quest_vide_db12').show();
			$('#Question_db_291').hide();
			$('#message_fermeture_question_db12').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_db").value;
			commentaire=document.getElementById("commentaire_Question_db12").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_db_12").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_db_12").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_db_12").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depenseb/php/detect_objectif_exist_db.php',
				data:{mission_id:mission_id, question_id:291, cycle_achat_id:22},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_db(commentaire, qcm, mission_id, 291);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depenseb/php/update_object_db.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:291},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleDepense/Depenseb/load/load_rep_db.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_db').hide();
										$('#message_fermeture_question_db12').hide();
										$('#contdb').hide();
										$('#contRsciDepense').show();
										openButtObjdb();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_db12').click(function(){
		$('#message_fermeture_question_db12').hide();
		$('#fancybox_db').hide();
		openButtObjdb();
	});
});

</script>

<div id="message_enreg_db12">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_db12" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_db12" />
		</td>
	</tr>
</table>
</div>