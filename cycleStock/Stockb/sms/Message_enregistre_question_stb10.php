<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_stb10').click(function(){
if((document.getElementById("commentaire_Question_stb10").value=="") || (document.getElementById("rad_Question_Oui_stb_10").checked==false && document.getElementById("rad_Question_NA_stb_10").checked==false && document.getElementById("rad_Question_Non_stb_10").checked==false)){
			$('#mess_quest_vide_stb10').show();
			$('#Question_stb_').hide();
			$('#message_fermeture_question_stb10').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_stb").value;
			commentaire=document.getElementById("commentaire_Question_stb10").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_stb_10").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_stb_10").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_stb_10").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockb/php/detect_objectif_exist_stb.php',
				data:{mission_id:mission_id, question_id:126, cycle_achat_id:11},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_stb(commentaire, qcm, mission_id, 126);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockb/php/update_object_stb.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:126},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleStock/Stockb/load/load_rep_stb.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_stb').hide();
										$('#message_fermeture_question_stb10').hide();
										$('#contstb').hide();
										$('#contRsciStock').show();
										openButtObjstb();
									}
								});
							}
						});
					}
				}
			});
		}	
	});
	$('#valider_Fermeture_Question_stb10').click(function(){
		$('#message_fermeture_question_stb10').hide();
		$('#fancybox_stb').hide();
		openButtObjstb();
	});
});

</script>

<div id="message_enreg_stb10">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_stb10" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_stb10" />
		</td>
	</tr>
</table>
</div>