<script>
$(function(){
	$('#annuler_msg_Synthese_ima').click(function(){
		$('#message_Synthese_Terminer').hide();
		$('#message_Synthese_ima').show();
	});
	
	$('#enregistrer_msg_Synthese_ima').click(function(){
		mission_id=document.getElementById("txt_mission_id_int_ima").value;
		commentaire=$('#txt_Synthese_ima').val();
		risque="faible";
		if(document.getElementById("rd_Synthese_ima_Faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("rd_Synthese_ima_Moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("rd_Synthese_ima_Eleve").checked==true){
			risque="eleve";
		}
		$.ajax({
			type:'POST',
			url:'cycleImmo/Immoa/php/enregistrer_synthese_ima.php',
			data:{mission_id:mission_id, commentaire:commentaire, risque:risque, cycleId:10}, // Efa id = 1000 zao, voir /cycleImmo/saveSynthèse.php
			success:function(){	
			}		
		});
		$('#message_Synthese_Terminer').hide();
		$('#contima').hide();
		$('#contRsciImmo').show();
		openButima();
	});
});
function detectSynthese(mission_id, cycleId){
	syntheseId=0;
	$.ajax({
		type:'POST',
		url:'cycleImmo/Immoa/php/det_synth.php',
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
		url:'cycleImmo/Immoa/php/update_synthese.php',
		data:{commentaire:commentaire, risque:risque, syntheseId:syntheseId},
		success:function(){
			alert("update");
		}
	});
}
</script>


<div id="message_Terminer_Synthese_ima">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_ima">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_ima">
		</td>
	</tr>
</table>
</div>