<script>
	$('#valider_Retour_pa').click(function(){
		openButpa();
		$('#message_Fermeture_pa').hide();
		$('#contpa').hide();
		$('#contRsciPaie').show();
	});
	$('#annuler_Retour_pa').click(function(){
		openButpa();
		$('#message_Fermeture_pa').hide();
	});

</script>
<div id="message_Retour_pa">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_pa">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_pa">			
		</td>
	</tr>
</table>
</div>