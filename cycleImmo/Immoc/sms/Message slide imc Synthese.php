<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Synthese_Slide_c
	$('#message__Slide_Ok_Synthese_imc').click(function(){
		$('#contimc').hide();
		$('#contRsciImmo').show();
		$('#message_Synthese_Slide_imc').hide();
		$('#fancybox_imc').hide();
		
	});
});
</script>
<div id="message_confirmation_slide_Synthese_imc">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Synthese_imc">
			</td>
		</tr>
	</table>
</div>