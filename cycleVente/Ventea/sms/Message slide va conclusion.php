<script>
$(function(){
	$('#message__Slide_Ok_Conclusion_va').click(function(){
		mission_id=$('#mission_id_va').val();
		commentaire=$('#commentaire_va').val();
		risque="faible";
		if(document.getElementById("conclus_va_faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("conclus_va_moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("conclus_va_eleve").checked==true){
			risque="eleve";
		}
		$.ajax({
			type:'POST',
			url:'cycleVente/ventea/php/enregistrer_conclusion_va.php',
			data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
			success:function(){
				$('#contSupVa').hide();
				$('#message_Slide_Conclusion_va').hide();
				$('#contRsciVente').show();
				openButva();
			}
		});
	});
});
</script>

<div id="message_confirmation_slide_va">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_va">
			</td>
		</tr>
	</table>
</div>