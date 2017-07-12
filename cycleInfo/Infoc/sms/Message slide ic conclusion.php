<script>
$(function(){
	$('#message__Slide_Ok_Conclusion_ic').click(function(){
		mission_id=$('#mission_id_ic').val();
		commentaire=$('#commentaire_ic').val();
		risque="faible";
		if(document.getElementById("conclus_ic_faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("conclus_ic_moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("conclus_ic_eleve").checked==true){
			risque="eleve";
		}
		$.ajax({
			type:'POST',
			url:'cycleRecette/recettea/php/enregistrer_conclusion_ic.php',
			data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
			success:function(){
				$('#contSupIa').hide();
				$('#message_Slide_Conclusion_ic').hide();
				$('#contRsciRecette').show();
				openButic();
			}
		});
	});
});
</script>

<div id="message_confirmation_slide_ic">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_ic">
			</td>
		</tr>
	</table>
</div>