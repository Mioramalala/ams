<script>
$(function(){
	$('#message_non_synth_acb').click(function(){
		$('#mess_synth_non').hide();
		$('#fancybox_bouton_acb').show();
		openButtSupacb();
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
			<td class="td_Contenue_Message" height="50" align="center">La synthèse devra être remplie...</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="message_non_synth_acb">
			</td>
		</tr>
	</table>
</div>