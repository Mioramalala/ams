<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_acb').click(function(){
		//tinay
		alert('message anullation tinay!!!!!!');
		// tinay editer
		//if((document.getElementById("commentaire_Question_acb1").value=="") || (document.getElementById("rad_Question_Oui_acb_1").checked==false && document.getElementById("rad_Question_NA_acb_1").checked==false && document.getElementById("rad_Question_Non_acb_1").checked==false)){
		if((document.getElementById("commentaire_Question_acb1").value=="" && document.getElementById("rad_Question_Non_acb_1").checked==true) || (document.getElementById("rad_Question_Oui_acb_1").checked==false && document.getElementById("rad_Question_NA_acb_1").checked==false && document.getElementById("rad_Question_Non_acb_1").checked==false)){
			$('#mess_quest_vide_acb1').show();
			$('#Question_acb_70').hide();
			$('#message_fermeture_question_acb').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_acb").value;
			commentaire=document.getElementById("commentaire_Question_acb1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_acb_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_acb_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_acb_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_b/php/detect_objectif_exist_acb.php',
				data:{mission_id:mission_id, question_id:1, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_acb(commentaire, qcm, mission_id, 1);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_b/php/update_object_acb.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:1},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleAchat/cycle_achat_b/load/load_rep_acb.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#fancybox_acb').hide();
										$('#message_fermeture_question_acb').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										openButtObjacb();
									}
								});
							}
						});
					}
				}
			});
		}	
	});
	$('#valider_Fermeture_Question_acb').click(function(){
		$('#message_fermeture_question_acb').hide();
		$('#fancybox_acb').hide();
		openButtObjacb();
	});
});
function openButtObjf(){
	document.getElementById("int_acb_Retour").disabled=false;
	document.getElementById("Int_acb_Continuer").disabled=false;
	document.getElementById("Int_acb_Synthese").disabled=false;
}
</script>

<div id="message_Retour_acb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Attention les données seront perdues. Voulez-vous enregistrer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="enregistrer_Fermeture_Question_acb" />&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="valider_Fermeture_Question_acb" />
		</td>
	</tr>
</table>
</div>