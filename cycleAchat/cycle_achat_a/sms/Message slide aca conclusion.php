<script>
$(function(){
	$('#message__Slide_Ok_Conclusion_aca').click(function(){
		mission_id=$('#mission_id_aca').val();
		commentaire=$('#commentaire_aca').val();
		risque="faible";
		if(document.getElementById("conclus_aca_faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("conclus_aca_moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("conclus_aca_eleve").checked==true){
			risque="eleve";
		}
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achat_a/php/enregistrer_conclusion_aca.php',
			data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
			success:function(){
				$('#contSupaca').hide();
				$('#message_Slide_Conclusion_aca').hide();
				$('#contenue_rsci').show();
				openButSupaca();
			}
		});
	});
});
</script>

<div id="message_confirmation_slide_aca">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_aca">
			</td>
		</tr>
	</table>
</div>