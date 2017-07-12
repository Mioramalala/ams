<script>
function clickBtnVide(){
	$('#interface_aca_Conclusion_Superviseur').show();
	$('#mess_vide_conclusion_aca').hide();
}
</script>

<div id="message_case_vide_aca">
	<table width="500">
		<tr style="height:20px">
			<td style="height:20px">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">Vous devez remplir la conclusion...</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="btn_slide_aca" onclick="clickBtnVide()"/>
			</td>
		</tr>
	</table>
</div>