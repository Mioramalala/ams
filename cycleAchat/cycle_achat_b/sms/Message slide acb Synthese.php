<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Synthese_Slide_c
	$('#message__Slide_Ok_Synthese_acb').click(function(){
		$('#dv_cont_obj_b').hide();
		$('#contenue_rsci').show();
		$('#message_Synthese_Slide_acb').hide();
		$('#fancybox_acb').hide();
	});
});
</script>
<div id="message_confirmation_slide_Synthese_acb">
	<table width="500">
		<tr>
			<td height="20">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">Toutes les données sont stockées...</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Synthese_acb">
			</td>
		</tr>
	</table>
</div>