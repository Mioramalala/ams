<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Synthese_Slide_c
	$('#valid_non_ve').click(function(){
		$('#mess_vide_vente').hide();
		document.getElementById("validate_va").disabled=false;
		document.getElementById("validate_ve").disabled=false;
		document.getElementById("validate_vc").disabled=false;
		document.getElementById("validate_vd").disabled=false;
		document.getElementById("validate_ve").disabled=false;
		document.getElementById("validate_vf").disabled=false;
	});
});
</script>
<div id="mess_non_vide_ve">
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
				<input type="button" value="OK" class="bouton" id="valid_non_ve" />
			</td>
		</tr>
	</table>
</div>