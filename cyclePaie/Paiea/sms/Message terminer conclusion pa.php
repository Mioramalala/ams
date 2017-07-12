<script>
$('#annuler_msg_Conclusion_pa').click(function(){
	$('#interface_pa_Conclusion_Superviseur').show();
	$('#Message_Conclusion_pa_Terminer').hide();
});

$('#Terminaison_msg_Conclusion_pa').click(function(){
	$('#message_Slide_Conclusion_pa').show();
	$('#Message_Conclusion_pa_Terminer').hide();
});
</script>

<div id="message_Terminer_Conclusion_pa_Superviseur">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Conclusion_pa">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="Terminaison_msg_Conclusion_pa">
		</td>
	</tr>
</table>
</div>