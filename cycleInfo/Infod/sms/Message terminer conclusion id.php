<script>
$('#annuler_msg_Conclusion_id').click(function(){
	$('#interface_id_Conclusion_Superviseur').show();
	$('#Message_Conclusion_id_Terminer').hide();
});

$('#Terminaison_msg_Conclusion_id').click(function(){
	$('#message_Slide_Conclusion_id').show();
	$('#Message_Conclusion_id_Terminer').hide();
});
</script>

<div id="message_Terminer_Conclusion_id_Superviseur">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Conclusion_id">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="Terminaison_msg_Conclusion_id">
		</td>
	</tr>
</table>
</div>