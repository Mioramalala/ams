<script>
$(function(){
	$('#message_non_synth_pe').click(function(){
		$('#mess_synth_non').hide();
		$('#fancybox_bouton_pe').show();
		openButtSuppe();
	});
});

</script>

<div id="message_confirmation_slide_Synthese_pe">
	<table width="500">
		<tr style="height:20px">
			<td style="height:20px">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">La synthèse devra être remplie...</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="message_non_synth_pe">
			</td>
		</tr>
	</table>
</div>