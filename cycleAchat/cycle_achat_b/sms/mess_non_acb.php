<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Synthese_Slide_c
	$('#valid_non_acb').click(function(){
		$('#mess_non_vide').hide();
		document.getElementById("validate_ima").disabled=false;
		document.getElementById("validate_acb").disabled=false;
		document.getElementById("validate_imc").disabled=false;
		document.getElementById("validate_imd").disabled=false;
	});
});
</script>
<div id="mess_non_vide_acb">
	<table width="500">
		<tr>
			<td height="20">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">Vous devez remplir toutes les questions...</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="valid_non_acb" />
			</td>
		</tr>
	</table>
</div>