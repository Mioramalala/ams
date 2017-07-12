<script>
$('#annuler_msg_Conclusion_ic').click(function(){
	$('#interface_ic_Conclusion_Superviseur').show();
	$('#Message_Conclusion_ic_Terminer').hide();
});

$('#Terminaison_msg_Conclusion_ic').click(function(){
	$('#message_Slide_Conclusion_ic').show();
	$('#Message_Conclusion_ic_Terminer').hide();
});
</script>

<div id="message_Terminer_Conclusion_ic_Superviseur">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Conclusion_ic">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="Terminaison_msg_Conclusion_ic">
		</td>
	</tr>
</table>
</div>