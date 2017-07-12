<script>
$(function(){
	$('#message__Slide_Ok_Synthese_c').click(function(){
		$('#dv_cont_obj_c').hide();
		$('#contenue_rsci').show();
		$('#message_Synthese_Slide_c').hide();
		$('#fancybox_c').hide();
		openButtSupc();
	});
});
</script>
<div id="message_confirmation_slide_Synthese_c">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Synthese_c">
			</td>
		</tr>
	</table>
</div>