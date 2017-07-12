
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_pb12').click(function(){	
	if((document.getElementById("commentaire_Question_pb12").value=="") || (document.getElementById("rad_Question_Oui_pb_12").checked==false && document.getElementById("rad_Question_NA_pb_12").checked==false && document.getElementById("rad_Question_Non_pb_12").checked==false)){
			$('#mess_quest_vide_pb12').show();
			$('#Question_pb_192').hide();
			$('#message_fermeture_question_pb12').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pb").value;
			commentaire=document.getElementById("commentaire_Question_pb12").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_pb_12").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_pb_12").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_pb_12").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paieb/php/detect_objectif_exist_pb.php',
				data:{mission_id:mission_id, question_id:192, cycle_achat_id:14},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_pb(commentaire, qcm, mission_id, 192);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paieb/php/update_object_pb.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:192},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cyclePaie/Paieb/load/load_rep_pb.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_pb').hide();
										$('#message_fermeture_question_pb12').hide();
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
	$('#valider_Fermeture_Question_pb12').click(function(){
		$('#message_fermeture_question_pb12').hide();
		$('#fancybox_pb').hide();
		openButtObjpb();
	});
});

</script>

<div id="message_enreg_pb12">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_pb12" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_pb12" />
		</td>
	</tr>
</table>
</div>