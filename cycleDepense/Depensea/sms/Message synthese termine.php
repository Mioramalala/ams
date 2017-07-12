<script>
$(function(){
	$('#annuler_msg_Synthese_da').click(function(){
		$('#message_da_Synthese_Terminer').hide();
		$('#message_Synthese_da').show();
	});
	
	$('#enregistrer_msg_Synthese_da').click(function(){
		var mission_id=document.getElementById("txt_mission_id_int_da").value;
		var commentaire=$('#txt_Synthese_da').val();
		var risque="faible";
		if(document.getElementById("rd_Synthese_da_Faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("rd_Synthese_da_Moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("rd_Synthese_da_Eleve").checked==true){
			risque="eleve";
		}

		// tinay editer

		alert('Mon risque: ' +risque);
		$.ajax({
			type:'POST',
			url:'cycleDepense/Depensea/php/enregistrer_synthese_da.php',
			data:{mission_id:mission_id, commentaire:commentaire, risque:risque, cycleId:1000000},
			success:function(){					
			}		
		});
		$('#message_da_Synthese_Terminer').hide();
		$('#contda').hide();
		$('#fancybox_da').hide();
		$('#contRsciDepense').show();
		openButda();
	});
});
function detectSynthese(mission_id, cycleId){
	syntheseId=0;
	$.ajax({
		type:'POST',
		url:'cycleDepense/Depensea/php/det_synth.php',
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
		url:'cycleDepense/Depensea/php/update_synthese.php',
		data:{commentaire:commentaire, risque:risque, syntheseId:syntheseId},
		success:function(){
			alert("update");
		}
	});
}
</script>


<div id="message_Terminer_Synthese_da">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_da">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_da">
		</td>
	</tr>
</table>
</div>