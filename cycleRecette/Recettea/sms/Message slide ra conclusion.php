<script>
$(function(){
	$('#message__Slide_Ok_Conclusion_ra').click(function(){
		mission_id=$('#mission_id_ra').val();
		commentaire=$('#commentaire_ra').val();
		risque="faible";
		if(document.getElementById("conclus_ra_faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("conclus_ra_moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("conclus_ra_eleve").checked==true){
			risque="eleve";
		}
		$.ajax({
			type:'POST',
			url:'cycleRecette/recettea/php/enregistrer_conclusion_ra.php',
			data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
			success:function(){
				$('#contSupRa').hide();
				$('#message_Slide_Conclusion_ra').hide();
				$('#contRsciRecette').show();
				openButra();
			}
		});
	});
});
</script>

<div id="message_confirmation_slide_ra">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_ra">
			</td>
		</tr>
	</table>
</div>