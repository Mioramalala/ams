<script>
$(function(){
	$('#message__Slide_Ok_Conclusion_ima').click(function(){
		$('#contSupIma').hide();
		$('#message_Slide_Conclusion_ima').hide();
		$('#contRsciImmo').show();
		openButima();
	});
});
</script>

<div id="message_confirmation_slide_ima">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_ima">
			</td>
		</tr>
	</table>
</div>