<script>
$(function(){
	$('#annuler_msg_Synthese_id').click(function(){
		$('#message_id_Synthese_Terminer').hide();
		$('#message_Synthese_id').show();
	});
	
	$('#enregistrer_msg_Synthese_id').click(function(){
		//alert("enregistrer synthese");
		mission_id=document.getElementById("txt_mission_id").value;
		score=$('#echo_score_id').html();
		commentaire=$('#txt_Synthese_id').val();
		risque="faible";
		if(document.getElementById("rd_Synthese_id_Faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("rd_Synthese_id_Moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("rd_Synthese_id_Eleve").checked==true){
			risque="eleve";
		}
		$.ajax({
			type:'POST',
			url:'cycleInfo/Infod/php/enregistrer_synthese_id.php',
			data:{mission_id:mission_id, commentaire:commentaire,score:score, risque:risque, cycleId:34},
			success:function(){					
			}		
		});
		$('#message_id_Synthese_Terminer').hide();
		$('#contid').hide();
		$('#fancybox_id').hide();
		$('#contRsciInfo').show();
		openButid();
	});
});
function detectSynthese(mission_id, cycleId){
	syntheseId=0;
	$.ajax({
		type:'POST',
		url:'cycleInfo/Infod/php/det_synth.php',
		data:{mission_id:mission_id, cycleId:cycleId},
		success:function(e){
			syntheseId=e;
			//alert("synthId="+syntheseId);
		}
	});	
	return syntheseId;
}
function updateSynthese(commentaire, risque, cycleId, mission_id){
	$.ajax({
		type:'POST',
		url:'cycleInfo/Infod/php/update_synthese.php',
		data:{commentaire:commentaire, risque:risque, syntheseId:syntheseId},
		success:function(){
			//alert("update");
		}
	});
}
</script>


<div id="message_Terminer_Synthese_id
">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_id">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_id">
		</td>
	</tr>
</table>
</div>