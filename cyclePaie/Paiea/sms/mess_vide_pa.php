<script>
$(function(){
	$('#message_Slide_vide_pa').click(function(){
		$('#mess_vide_pa').hide();
		$('#fancybox_pa').hide();
	});
});

</script>

<div id="message_vide_pa">
	<table width="500">
		<tr style="height:20px">
			<td style="height:20px">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">Vous devez cocher les cases vides...</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="message_Slide_vide_pa">
			</td>
		</tr>
	</table>
</div>