<script>
$(function(){
	$('#message__Slide_Ok_Conclusion_id').click(function(){
		mission_id=$('#mission_id_id').val();
		commentaire=$('#commentaire_id').val();
		risque="faible";
		if(document.getElementById("conclus_id_faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("conclus_id_moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("conclus_id_eleve").checked==true){
			risque="eleve";
		}
		$.ajax({
			type:'POST',
			url:'cycleRecette/recettea/php/enregistrer_conclusion_id.php',
			data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
			success:function(){
				$('#contSupIa').hide();
				$('#message_Slide_Conclusion_id').hide();
				$('#contRsciRecette').show();
				openButid();
			}
		});
	});
});
</script>

<div id="message_confirmation_slide_id">
	<table width="500">
		<tr style="height:20px">
			<td style="height:20px">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">Toutes les données sont stockées...</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_id">
			</td>
		</tr>
	</table>
</div>