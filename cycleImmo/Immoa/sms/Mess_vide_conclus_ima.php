<script>
function clickBtnVide(){
	$('#interface_ima_Conclusion_Superviseur').show();
	$('#mess_pas_synth').hide();
}
</script>

<div id="message_case_vide_ima">
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
				<input type="button" value="OK" class="bouton" id="btn_slide_ima" onclick="clickBtnVide()"/>
			</td>
		</tr>
	</table>
</div>