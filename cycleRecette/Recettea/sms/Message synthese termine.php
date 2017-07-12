<script>
$(function(){
	$('#annuler_msg_Synthese_ra').click(function(){
		$('#message_ra_Synthese_Terminer').hide();
		$('#message_Synthese_ra').show();
	});
	
	$('#enregistrer_msg_Synthese_ra').click(function(){
		mission_id=document.getElementById("txt_mission_id_int_ra").value;
		commentaire=$('#txt_Synthese_ra').val();
		risque="faible";
		if(document.getElementById("rd_Synthese_ra_Faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("rd_Synthese_ra_Moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("rd_Synthese_ra_Eleve").checked==true){
			risque="eleve";
		}
		$.ajax({
			type:'POST',
			url:'cycleRecette/Recettea/php/enregistrer_synthese_ra.php',
			data:{mission_id:mission_id, commentaire:commentaire, risque:risque, cycleId:100000},
			success:function(){					
			}		
		});
		$('#message_ra_Synthese_Terminer').hide();
		$('#contra').hide();
		$('#fancybox_ra').hide();
		$('#contRsciRecette').show();
		openButra();
	});
});
function detectSynthese(mission_id, cycleId){
	syntheseId=0;
	$.ajax({
		type:'POST',
		url:'cycleRecette/Recettea/php/det_synth.php',
		data:{mission_id:mission_id, cycleId:cycleId},
		success:function(e){
			syntheseId=e;
			alert("synthId="+syntheseId);
		}
	});	
	return syntheseId;
}
function updateSynthese(commentaire, risque, cycleId, mission_id){
	$.ajax({
		type:'POST',
		url:'cycleRecette/Recettea/php/update_synthese.php',
		data:{commentaire:commentaire, risque:risque, syntheseId:syntheseId},
		success:function(){
			alert("update");
		}
	});
}
</script>


<div id="message_Terminer_Synthese_ra">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_ra">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_ra">
		</td>
	</tr>
</table>
</div>