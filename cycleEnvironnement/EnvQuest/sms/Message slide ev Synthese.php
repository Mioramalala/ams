<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Synthese_Slide_c
	$('#message__Slide_Ok_Synthese_ev').click(function(){
		$('#contev').hide();
		$('#contRsciEnvironnement').show();
		$('#message_Synthese_Slide_ev').hide();
		$('#fancybox_ev').hide();
	});
});
</script>
<div id="message_confirmation_slide_Synthese_ev">
	<table width="500">
		<tr height="20">
			<td height="20">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">Toutes les données sont stockées...</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Synthese_ev">
			</td>
		</tr>
	</table>
</div>