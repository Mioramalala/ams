<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Synthese_Slide_c
	$('#valid_non_std').click(function(){
		$('#mess_vide').hide();
		document.getElementById("validate_sta").disabled=false;
		document.getElementById("validate_std").disabled=false;
		document.getElementById("validate_std").disabled=false;
		document.getElementById("validate_std").disabled=false;
	});
});
</script>
<div id="mess_non_vide_std">
	<table width="500">
		<tr style="height:20px">
			<td style="height:20px">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">Vous devez remplir toutes les questions...</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="valid_non_std" />
			</td>
		</tr>
	</table>
</div>