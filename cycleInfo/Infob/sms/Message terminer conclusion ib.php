<script>
$('#annuler_msg_Conclusion_ib
').click(function(){
	$('#interface_ib
_Conclusion_Superviseur').show();
	$('#Message_Conclusion_ib
_Terminer').hide();
});

$('#Terminaison_msg_Conclusion_ib
').click(function(){
	$('#message_Slide_Conclusion_ib
').show();
	$('#Message_Conclusion_ib
_Terminer').hide();
});
</script>

<div id="message_Terminer_Conclusion_ib
_Superviseur">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Conclusion_ib
">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="Terminaison_msg_Conclusion_ib
">
		</td>
	</tr>
</table>
</div>