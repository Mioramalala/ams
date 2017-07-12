<script>
$(function(){
	$('#annuler_msg_Synthese_ia').click(function(){
		$('#message_ia_Synthese_Terminer').hide();
		$('#message_Synthese_ia').show();
	});
	
	$('#enregistrer_msg_Synthese_ia').click(function(){
		//alert("enregistrer synthese");
		mission_id=document.getElementById("txt_mission_id").value;

		commentaire=$('#txt_Synthese_ia').val();
		risque="faible";
		if(document.getElementById("rd_Synthese_ia_faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("rd_Synthese_ia_Moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("rd_Synthese_ia_Eleve").checked==true){
			risque="eleve";
		}
		$.ajax({
			type:'POST',
			url:'cycleInfo/Infoa/php/enregistrer_synthese_ia.php',
			data:{mission_id:mission_id, commentaire:commentaire, risque:risque, cycleId:100000000}, //tinay editer ????
			success:function(){					
			}		
		});
		$('#message_ia_Synthese_Terminer').hide();
		$('#contia').hide();
		$('#fancybox_ia').hide();
		$('#contRsciInfo').show();
		openButia();
	});
});
function detectSynthese(mission_id, cycleId){
	syntheseId=0;
	$.ajax({
		type:'POST',
		url:'cycleInfo/Infoa/php/det_synth.php',
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
		url:'cycleInfo/Infoa/php/update_synthese.php',
		data:{commentaire:commentaire, risque:risque, syntheseId:syntheseId},
		success:function(){
			alert("update");
		}
	});
}
</script>


<div id="message_Terminer_Synthese_ia
">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_ia">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_ia">
		</td>
	</tr>
</table>
</div>