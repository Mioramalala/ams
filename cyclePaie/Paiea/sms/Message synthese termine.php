<script>
$(function(){
	$('#annuler_msg_Synthese_pa').click(function(){
		$('#message_Synthese_Terminer').hide();
		$('#message_Synthese_pa').show();
	});
	
	$('#enregistrer_msg_Synthese_pa').click(function(){
		mission_id=document.getElementById("txt_mission_id_int_pa").value;
		commentaire=$('#txt_Synthese_pa').val();
		risque="faible";
		if(document.getElementById("rd_Synthese_pa_Faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("rd_Synthese_pa_Moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("rd_Synthese_pa_Eleve").checked==true){
			risque="eleve";
		}
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paiea/php/enregistrer_synthese_pa.php',
			data:{mission_id:mission_id, commentaire:commentaire, risque:risque, cycleId:10000},
			success:function(){					
			}		
		});
		$('#message_Synthese_Terminer').hide();
		$('#contpa').hide();
		$('#fancybox_pa').hide();
		$('#contRsciPaie').show();
		openButpa();
	});
});
function detectSynthese(mission_id, cycleId){
	syntheseId=0;
	$.ajax({
		type:'POST',
		url:'cyclePaie/Paiea/php/det_synth.php',
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
		url:'cyclePaie/Paiea/php/update_synthese.php',
		data:{commentaire:commentaire, risque:risque, syntheseId:syntheseId},
		success:function(){
			alert("update");
		}
	});
}
</script>


<div id="message_Terminer_Synthese_pa">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_pa">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_pa">
		</td>
	</tr>
</table>
</div>