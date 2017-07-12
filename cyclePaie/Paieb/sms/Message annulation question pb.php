
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_pb').click(function(){
		if((document.getElementById("commentaire_Question_pb1").value=="") || (document.getElementById("rad_Question_Oui_pb_1").checked==false && document.getElementById("rad_Question_NA_pb_1").checked==false && document.getElementById("rad_Question_Non_pb_1").checked==false)){
			$('#mess_quest_vide_pb1').show();
			$('#Question_pb_181').hide();
			$('#message_fermeture_question_pb').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pb").value;
			commentaire=document.getElementById("commentaire_Question_pb1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_pb_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_pb_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_pb_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paieb/php/detect_objectif_exist_pb.php',
				data:{mission_id:mission_id, question_id:181, cycle_achat_id:14},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_pb(commentaire, qcm, mission_id, 181);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paieb/php/update_object_pb.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:181},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cyclePaie/Paieb/load/load_rep_pb.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_f').hide();
										$('#message_fermeture_question_pb').hide();
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
	$('#valider_Fermeture_Question_pb').click(function(){
		$('#message_fermeture_question_pb').hide();
		$('#fancybox_pb').hide();
		openButtObjpb();
	});
});
function openButtObjf(){
	document.getElementById("int_pb_Retour").disabled=false;
	document.getElementById("Int_pb_Continuer").disabled=false;
	document.getElementById("Int_pb_Synthese").disabled=false;
}
</script>

<div id="message_Retour_pb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_pb" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_pb" />
		</td>
	</tr>
</table>
</div>