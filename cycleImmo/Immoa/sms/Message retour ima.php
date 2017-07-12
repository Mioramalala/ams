<script>
	$('#valider_Retour_ima').click(function(){
		openButima();
		$('#message_Fermeture_ima').hide();
		$('#contima').hide();
		$('#contRsciImmo').show();
	});
	$('#annuler_Retour_ima').click(function(){
		openButima();
		$('#message_Fermeture_ima').hide();
	});

</script>
<div id="message_Retour_ima">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_ima">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_ima">			
		</td>
	</tr>
</table>
</div>