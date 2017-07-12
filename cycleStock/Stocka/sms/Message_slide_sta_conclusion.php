<script>
$(function(){
	$('#message__Slide_Ok_Conclusion_sta').click(function(){
		mission_id=$('#mission_id_sta').val();
		commentaire=$('#commentaire_sta').val();
		risque="faible";
		if(document.getElementById("conclus_sta_faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("conclus_sta_moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("conclus_sta_eleve").checked==true){
			risque="eleve";
		}
		$.ajax({
			type:'POST',
			url:'cycleStock/stocka/php/enregistrer_conclusion_sta.php',
			data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
			success:function(){
				$('#contSupSta').hide();
				$('#message_Slide_Conclusion_sta').hide();
				$('#contRsciStock').show();
				openButsta();
			}
		});
	});
});
</script>

<div id="message_confirmation_slide_sta">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_sta">
			</td>
		</tr>
	</table>
</div>