<script>
	$('#valider_Retour_ic').click(function(){
		openButic();
		$('#message_Fermeture_ic').hide();
		$('#contic').hide();
		$('#contRsciInfo').show();
	});
	$('#annuler_Retour_ic').click(function(){
		openButic();
		$('#message_Fermeture_ic').hide();
	});

</script>
<div id="message_Retour_ic">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_ic">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_ic">			
		</td>
	</tr>
</table>
</div>