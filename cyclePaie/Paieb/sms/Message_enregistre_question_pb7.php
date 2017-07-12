<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_pb7').click(function(){	
	if((document.getElementById("commentaire_Question_pb7").value=="") || (document.getElementById("rad_Question_Oui_pb_7").checked==false && document.getElementById("rad_Question_NA_pb_7").checked==false && document.getElementById("rad_Question_Non_pb_7").checked==false)){
			$('#mess_quest_vide_pb7').show();
			$('#message_fermeture_question_pb7').hide();
			$('#Question_pb_187').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pb").value;
			commentaire=document.getElementById("commentaire_Question_pb7").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_pb_7").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_pb_7").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_pb_7").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paieb/php/detect_objectif_exist_pb.php',
				data:{mission_id:mission_id, question_id:187, cycle_achat_id:14},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_pb(commentaire, qcm, mission_id, 187);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paieb/php/update_object_pb.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:187},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cyclePaie/Paieb/load/load_rep_pb.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_pb').hide();
										$('#message_fermeture_question_pb7').hide();
										$('#contpb').hide();
										$('#contRsciPaie').show();
										openButtObjpb();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	$('#valider_Fermeture_Question_pb7').click(function(){
		$('#message_fermeture_question_pb7').hide();
		$('#fancybox_pb').hide();
		openButtObjpb();
	});
});

</script>

<div id="message_enreg_pb7">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_pb7" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_pb7" />
		</td>
	</tr>
</table>
</div>