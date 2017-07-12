<script>
	$('#valider_Retour_da').click(function(){
		openButda();
		$('#message_Fermeture_da').hide();
		$('#contda').hide();
		$('#contRsciDepense').show();
	});
	$('#annuler_Retour_da').click(function(){
		openButda();
		$('#message_Fermeture_da').hide();
	});

</script>
<div id="message_Retour_da">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_da">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_da">			
		</td>
	</tr>
</table>
</div>