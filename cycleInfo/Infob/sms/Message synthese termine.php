<script>
$(function(){
	$('#annuler_msg_Synthese_ib').click(function(){
		$('#message_ib_Synthese_Terminer').hide();
		$('#message_Synthese_ib').show();
	});
	
	$('#enregistrer_msg_Synthese_ib').click(function(){
		
		mission_id= document.getElementById("txt_mission_id").value;
		commentaire= $('#txt_Synthese_ib').val();
		score= $('#echo_score_ib').html();
		risque= "faible";

		//alert(score);
		
		if(document.getElementById("rd_Synthese_ib_Faible").checked==true){
			risque="faible";
		}else if(document.getElementById("rd_Synthese_ib_Moyen").checked==true){
			risque="moyen";
		}else if(document.getElementById("rd_Synthese_ib_Eleve").checked==true){
			risque="eleve";
		}
		
		$.ajax({
			type:'POST',
			url:'cycleInfo/Infob/php/enregistrer_synthese_ib.php',
			data:{mission_id:mission_id, score:score,commentaire:commentaire, risque:risque, cycleId:32},
			success:function(){
				//alert("Synthese enregirée.");				
			}		
		});
		
		$('#message_ib_Synthese_Terminer').hide();
		$('#contib').hide();
		$('#fancybox_ib').hide();
		$('#contRsciInfo').show();
		openButib();
	});
});
function detectSynthese(mission_id, cycleId){
	syntheseId=0;
	$.ajax({
		type:'POST',
		url:'cycleInfo/Infob/php/det_synth.php',
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
		url:'cycleInfo/Infob/php/update_synthese.php',
		data:{commentaire:commentaire, risque:risque, syntheseId:syntheseId},
		success:function(){
			//alert("update");
		}
	});
}
</script>


<div id="message_Terminer_Synthese_ib
">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_ib">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_ib">
		</td>
	</tr>
</table>
</div>