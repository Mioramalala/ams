<script>
	$('#valider_Retour_id').click(function(){
		openButid();
		$('#message_Fermeture_id').hide();
		$('#contid').hide();
		$('#contRsciInfo').show();
	});
	$('#annuler_Retour_id').click(function(){
		openButid();
		$('#message_Fermeture_id').hide();
	});

</script>
<div id="message_Retour_id">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_id">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_id">			
		</td>
	</tr>
</table>
</div>