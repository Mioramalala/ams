<script>
$(function(){
	$('#valider_Retour_ra_superviseur').click(function(){
		$('#contRsciRecette').show();
		$('#contSupRa').hide();
		$('#message_fermeture_ra_sup').hide();
		openButSupra();
	});
	$('#annuler_Retour_ra_superviseur').click(function(){
		$('#message_fermeture_ra_sup').hide();
		openButSupra();
	});
});

</script>

<div id="message_Retour_ra_superviseur">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_ra_superviseur">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_ra_superviseur">			
		</td>
	</tr>
</table>
</div>