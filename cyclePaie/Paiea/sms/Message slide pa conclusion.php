<script>
$(function(){
	$('#message__Slide_Ok_Conclusion_pa').click(function(){
		mission_id=$('#mission_id_pa').val();
		commentaire=$('#commentaire_pa').val();
		risque="faible";
		if(document.getElementById("conclus_pa_faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("conclus_pa_moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("conclus_pa_eleve").checked==true){
			risque="eleve";
		}
		$.ajax({
			type:'POST',
			url:'cyclePaie/paiea/php/enregistrer_conclusion_pa.php',
			data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
			success:function(){
				$('#contSupPa').hide();
				$('#message_Slide_Conclusion_pa').hide();
				$('#contRsciPaie').show();
				openButpa();
			}
		});
	});
});
</script>

<div id="message_confirmation_slide_pa">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_pa">
			</td>
		</tr>
	</table>
</div>