<script>
$(function(){
	$('#valider_Retour_pa_superviseur').click(function(){
		$('#contRsciPaie').show();
		$('#contSupPa').hide();
		$('#message_fermeture_pa_sup').hide();
		openButSuppa();
	});
	$('#annuler_Retour_pa_superviseur').click(function(){
		$('#message_fermeture_pa_sup').hide();
		openButSuppa();
	});
});

</script>

<div id="message_Retour_pa_superviseur">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_pa_superviseur">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_pa_superviseur">			
		</td>
	</tr>
</table>
</div>