<script>
$(function(){
	$('#message_Slide_vide_ib').click(function(){
		$('#mess_vide_ib').hide();
		$('#fancybox_ib').hide();
	});
});

</script>

<div id="message_vide_ib">
	<table width="500">
		<tr style="height:20px">
			<td style="height:20px">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">Veuillez remplir tous les champs...</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="message_Slide_vide_ib">
			</td>
		</tr>
	</table>
</div>