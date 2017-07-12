
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_rd2').click(function(){	
	if((document.getElementById("commentaire_Question_rd2").value=="" && document.getElementById("rad_Question_Non_rd_2").checked== true) || (document.getElementById("rad_Question_Oui_rd_2").checked==false && document.getElementById("rad_Question_NA_rd_2").checked==false && document.getElementById("rad_Question_Non_rd_2").checked==false)){
			$('#mess_quest_vide_rd2').show();
			$('#Question_rd_265').hide();
			$('#message_fermeture_question_rd2').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_rd").value;
			commentaire=document.getElementById("commentaire_Question_rd2").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_rd_2").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_rd_2").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_rd_2").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recetted/php/detect_objectif_exist_rd.php',
				data:{mission_id:mission_id, question_id:265, cycle_achat_id:20},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_rd(commentaire, qcm, mission_id, 265);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recetted/php/update_object_rd.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:265},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleRecette/Recetted/load/load_rep_rd.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_rd').hide();
										$('#message_fermeture_question_rd2').hide();
										$('#contrd').hide();
										$('#contRsciRecette').show();
										openButtObjrd();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_rd2').click(function(){
		$('#message_fermeture_question_rd2').hide();
		$('#fancybox_rd').hide();
		openButtObjrd();
	});
});

</script>

<div id="message_enreg_rd2">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_rd2" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_rd2" />
		</td>
	</tr>
</table>
</div>