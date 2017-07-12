<script>
$(function(){
	$('#annuler_msg_Synthese_va').click(function(){
		$('#message_Synthese_Terminer').hide();
		$('#message_Synthese_va').show();
	});
	
	$('#enregistrer_msg_Synthese_va').click(function(){
		mission_id=document.getElementById("txt_mission_id_int_va").value;
		commentaire=$('#txt_Synthese_va').val();
		risque="faible";
		if(document.getElementById("rd_Synthese_va_Faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("rd_Synthese_va_Moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("rd_Synthese_va_Eleve").checked==true){
			risque="eleve";
		}
		$.ajax({
			type:'POST',
			url:'cycleVente/Ventea/php/enregistrer_synthese_va.php',
			data:{mission_id:mission_id, commentaire:commentaire, risque:risque, cycleId:10000000},
			success:function(){					
			}		
		});
		$('#message_Synthese_Terminer').hide();
		$('#contva').hide();
		$('#fancybox_va').hide();
		$('#contRsciVente').show();
		openButva();
	});
});
function detectSynthese(mission_id, cycleId){
	syntheseId=0;
	$.ajax({
		type:'POST',
		url:'cycleVente/Ventea/php/det_synth.php',
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
		url:'cycleVente/Ventea/php/update_synthese.php',
		data:{commentaire:commentaire, risque:risque, syntheseId:syntheseId},
		success:function(){
			alert("update");
		}
	});
}
</script>


<div id="message_Terminer_Synthese_va">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_va">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_va">
		</td>
	</tr>
</table>
</div>