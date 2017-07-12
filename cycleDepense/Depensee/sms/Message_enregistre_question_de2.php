
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_de2').click(function(){	
	if((document.getElementById("commentaire_Question_de2").value=="" && document.getElementById("rad_Question_Non_de_2").checked== true) || (document.getElementById("rad_Question_Oui_de_2").checked==false && document.getElementById("rad_Question_NA_de_2").checked==false && document.getElementById("rad_Question_Non_de_2").checked==false)){
			$('#mess_quest_vide_de2').show();
			$('#Question_de_313').hide();
			$('#message_fermeture_question_de2').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_de").value;
			commentaire=document.getElementById("commentaire_Question_de2").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_de_2").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_de_2").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_de_2").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensee/php/detect_objectif_exist_de.php',
				data:{mission_id:mission_id, question_id:313, cycle_achat_id:25},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_de(commentaire, qcm, mission_id, 313);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensee/php/update_object_de.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:313},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleDepense/Depensee/load/load_rep_de.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_de').hide();
										$('#message_fermeture_question_de2').hide();
										$('#contde').hide();
										$('#contRsciDepense').show();
										openButtObjde();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_de2').click(function(){
		$('#message_fermeture_question_de2').hide();
		$('#fancybox_de').hide();
		openButtObjde();
	});
});

</script>

<div id="message_enreg_de2">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_de2" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_de2" />
		</td>
	</tr>
</table>
</div>