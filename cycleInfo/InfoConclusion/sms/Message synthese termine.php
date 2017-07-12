<script>
$(function(){
	$('#annuler_msg_Synthese_concl').click(function(){
		$('#message_concl_Synthese_Terminer').hide();
		$('#message_Synthese_concl').show();
	});
	
	$('#enregistrer_msg_Synthese_concl').click(function(){
		//alert("enregistrer synthese");
		mission_id=document.getElementById("txt_mission_id").value;

		commentaire=$('#txt_Synthese_concl').val();
		risque="faible";
		if(document.getElementById("rd_Synthese_concl_Faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("rd_Synthese_concl_Moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("rd_Synthese_concl_Eleve").checked==true){
			risque="eleve";
		}
		$.ajax({
			type:'POST',
			url:'cycleInfo/InfoConclusion/php/enregistrer_synthese_concl.php',
			data:{mission_id:mission_id, commentaire:commentaire, risque:risque, cycleId:34},
			success:function(){					
			}		
		});
		$('#message_concl_Synthese_Terminer').hide();
		$('#contic').hide();
		$('#fancybox_concl').hide();
		$('#contRsciInfo').show();
		openButconcl();
	});
});
function detectSynthese(mission_id, cycleId){
	syntheseId=0;
	$.ajax({
		type:'POST',
		url:'cycleInfo/InfoConclusion/php/det_synth.php',
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
		url:'cycleInfo/InfoConclusion/php/update_synthese.php',
		data:{commentaire:commentaire, risque:risque, syntheseId:syntheseId},
		success:function(){
			//alert("update");
		}
	});
}
</script>


<div id="message_Terminer_Synthese_concl
">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_concl">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_concl">
		</td>
	</tr>
</table>
</div>