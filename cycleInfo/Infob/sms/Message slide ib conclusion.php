<script>
$(function(){
	$('#message__Slide_Ok_Conclusion_ib').click(function(){
		mission_id=$('#mission_id_ib').val();
		commentaire=$('#commentaire_ib').val();
		risque="faible";
		if(document.getElementById("conclus_ib_faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("conclus_ib_moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("conclus_ib_eleve").checked==true){
			risque="eleve";
		}
		$.ajax({
			type:'POST',
			url:'cycleRecette/recettea/php/enregistrer_conclusion_ib.php',
			data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
			success:function(){
				$('#contSupIa').hide();
				$('#message_Slide_Conclusion_ib').hide();
				$('#contRsciRecette').show();
				openButib();
			}
		});
	});
});
</script>

<div id="message_confirmation_slide_ib
">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_ib
">
			</td>
		</tr>
	</table>
</div>