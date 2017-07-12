<script>
$(function(){
	$('#annuler_msg_Synthese_sta').click(function(){
		$('#message_Synthese_Terminer').hide();
		$('#message_Synthese_sta').show();
	});
	
	// tinay editer: tsy mandalo ato intsony, voir /cycleStock/saveSynthèse.php.
	$('#enregistrer_msg_Synthese_sta').click(function(){
		mission_id=document.getElementById("txt_mission_id_int_sta").value;
		commentaire=$('#txt_Synthese_sta').val();
		risque="faible";
		
		if(document.getElementById("rd_Synthese_sta_Faible").checked==true){
			risque="faible";
		}else if(document.getElementById("rd_Synthese_sta_Moyen").checked==true){
			risque="moyen";
		}else if(document.getElementById("rd_Synthese_sta_Eleve").checked==true){
			risque="eleve";
		}

		$.ajax({
			type:'POST',
			url:'cycleStock/Stocka/php/enregistrer_synthese_sta.php',
			// tinay editer
			// data:{ mission_id:mission_id, commentaire:commentaire, risque:risque, cycleId:1000},
			data:{mission_id:mission_id, commentaire:commentaire, risque:risque, cycleId:111}, // satria CYCLE_ACHAT_ID=111 no enregistrer_synthese_sta.php
			success:function(e){					
			}		
		});

		$('#message_Synthese_Terminer').hide();
		$('#contsta').hide();
		$('#fancybox_sta').hide();
		$('#contRsciStock').show();
		openButsta();
	});
});
function detectSynthese(mission_id, cycleId){
	syntheseId=0;
	$.ajax({
		type:'POST',
		url:'cycleStock/Stocka/php/det_synth.php',
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
		url:'cycleStock/Stocka/php/update_synthese.php',
		data:{commentaire:commentaire, risque:risque, syntheseId:syntheseId},
		success:function(){
			alert("update");
		}
	});
}
</script>


<div id="message_Terminer_Synthese_sta">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_sta">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_sta">
		</td>
	</tr>
</table>
</div>