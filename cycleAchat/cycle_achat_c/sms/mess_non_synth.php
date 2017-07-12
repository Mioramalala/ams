<script>
$(function(){
	$('#message_slide_non_synth_c').click(function(){
		$('#mess_synth_non').hide();
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
			<td class="td_Contenue_Message" height="50" align="center">La synthèse devra être remplie...</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="message_slide_non_synth_c">
			</td>
		</tr>
	</table>
</div>