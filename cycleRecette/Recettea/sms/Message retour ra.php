<script>
	$('#valider_Retour_ra').click(function(){
		openButra();
		$('#message_Fermeture_ra').hide();
		$('#contra').hide();
		$('#contRsciRecette').show();
	});
	$('#annuler_Retour_ra').click(function(){
		openButra();
		$('#message_Fermeture_ra').hide();
	});

</script>
<div id="message_Retour_ra">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_ra">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_ra">			
		</td>
	</tr>
</table>
</div>