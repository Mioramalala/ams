<script>
	$('#valider_Retour_va').click(function(){
		openButva();
		$('#message_Fermeture_va').hide();
		$('#contva').hide();
		$('#contRsciVente').show();
	});
	$('#annuler_Retour_va').click(function(){
		openButva();
		$('#message_Fermeture_va').hide();
	});

</script>
<div id="message_Retour_va">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_va">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_va">			
		</td>
	</tr>
</table>
</div>