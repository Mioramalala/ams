<script>
$(function(){
	$('#annuler_msg_Synthese_ic').click(function(){
		$('#message_ic_Synthese_Terminer').hide();
		$('#message_Synthese_ic').show();
	});
	
	$('#enregistrer_msg_Synthese_ic').click(function(){
		//alert("enregistrer synthese");
		mission_id=document.getElementById("txt_mission_id").value;
		score=$('#echo_score_ic').html();
		commentaire=$('#txt_Synthese_ic').val();
		risque="faible";
		if(document.getElementById("rd_Synthese_ic_Faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("rd_Synthese_ic_Moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("rd_Synthese_ic_Eleve").checked==true){
			risque="eleve";
		}
		$.ajax({
			type:'POST',
			url:'cycleInfo/Infoc/php/enregistrer_synthese_ic.php',
			data:{mission_id:mission_id, commentaire:commentaire,score:score, risque:risque, cycleId:33},
			success:function(){					
			}		
		});
		$('#message_ic_Synthese_Terminer').hide();
		$('#contic').hide();
		$('#fancybox_ic').hide();
		$('#contRsciInfo').show();
		openButic();
	});
});
function detectSynthese(mission_id, cycleId){
	syntheseId=0;
	$.ajax({
		type:'POST',
		url:'cycleInfo/Infoc/php/det_synth.php',
		data:{mission_id:mission_id, cycleId:cycleId},
		success:function(e){
			syntheseId=e;
			///alert("synthId="+syntheseId);
		}
	});	
	return syntheseId;
}
function updateSynthese(commentaire, risque, cycleId, mission_id){
	$.ajax({
		type:'POST',
		url:'cycleInfo/Infoc/php/update_synthese.php',
		data:{commentaire:commentaire, risque:risque, syntheseId:syntheseId},
		success:function(){
			//alert("update");
		}
	});
}
</script>


<div id="message_Terminer_Synthese_ic
">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_ic">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_ic">
		</td>
	</tr>
</table>
</div>