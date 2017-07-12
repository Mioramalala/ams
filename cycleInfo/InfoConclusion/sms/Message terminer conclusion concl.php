<script>
$('#annuler_msg_Conclusion_concl').click(function(){
	$('#interface_concl_Conclusion_Superviseur').show();
	$('#Message_Conclusion_concl_Terminer').hide();
});

$('#Terminaison_msg_Conclusion_concl').click(function(){
	$('#message_Slide_Conclusion_concl').show();
	$('#Message_Conclusion_concl_Terminer').hide();
});
</script>

<div id="message_Terminer_Conclusion_concl_Superviseur">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Conclusion_concl">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="Terminaison_msg_Conclusion_concl">
		</td>
	</tr>
</table>
</div>