<script>
$('#annuler_msg_Conclusion_ia
').click(function(){
	$('#interface_ia
_Conclusion_Superviseur').show();
	$('#Message_Conclusion_ia
_Terminer').hide();
});

$('#Terminaison_msg_Conclusion_ia
').click(function(){
	$('#message_Slide_Conclusion_ia
').show();
	$('#Message_Conclusion_ia
_Terminer').hide();
});
</script>

<div id="message_Terminer_Conclusion_ia
_Superviseur">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Conclusion_ia
">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="Terminaison_msg_Conclusion_ia
">
		</td>
	</tr>
</table>
</div>