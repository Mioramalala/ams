<script>
$('#annuler_msg_Conclusion_ima').click(function(){
	$('#interface_ima_Conclusion_Superviseur').show();
	$('#Message_Conclusion_ima_Terminer').hide();
});

$('#Terminaison_msg_Conclusion_ima').click(function(){
	mission_id=$('#mission_id_ima').val();
	commentaire=$('#commentaire_ima').val();
	risque="faible";
	if(document.getElementById("conclus_ima_faible").checked==true){
		risque="faible";
	}
	else if(document.getElementById("conclus_ima_moyen").checked==true){
		risque="moyen";
	}
	else if(document.getElementById("conclus_ima_eleve").checked==true){
		risque="eleve";
	}
	$.ajax({
		type:'POST',
		url:'cycleImmo/immoa/php/enregistrer_conclusion_ima.php',
		data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
		success:function(){
			$('#message_Slide_Conclusion_ima').show();
			$('#Message_Conclusion_ima_Terminer').hide();
		}
	});
});
</script>

<div id="message_Terminer_Conclusion_ima_Superviseur">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Conclusion_ima">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminerer" id="Terminaison_msg_Conclusion_ima">
		</td>
	</tr>
</table>
</div>