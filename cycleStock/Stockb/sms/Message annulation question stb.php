
<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_stb').click(function(){
		if((document.getElementById("commentaire_Question_stb1").value=="") || (document.getElementById("rad_Question_Oui_stb_1").checked==false && document.getElementById("rad_Question_NA_stb_1").checked==false && document.getElementById("rad_Question_Non_stb_1").checked==false)){
			$('#mess_quest_vide_stb1').show();
			$('#Question_stb_117').hide();
			$('#message_fermeture_question_stb').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_stb").value;
			commentaire=document.getElementById("commentaire_Question_stb1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_stb_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_stb_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_stb_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockb/php/detect_objectif_exist_stb.php',
				data:{mission_id:mission_id, question_id:117, cycle_achat_id:11},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_stb(commentaire, qcm, mission_id, 117);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockb/php/update_object_stb.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:117},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleStock/Stockb/load/load_rep_stb.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_f').hide();
										$('#message_fermeture_question_stb').hide();
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
	$('#valider_Fermeture_Question_stb').click(function(){
		$('#message_fermeture_question_stb').hide();
		$('#fancybox_stb').hide();
		openButtObjstb();
	});
});
function openButtObjf(){
	document.getElementById("int_stb_Retour").disabled=false;
	document.getElementById("Int_stb_Continuer").disabled=false;
	document.getElementById("Int_stb_Synthese").disabled=false;
}
</script>

<div id="message_Retour_stb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_stb" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_stb" />
		</td>
	</tr>
</table>
</div>