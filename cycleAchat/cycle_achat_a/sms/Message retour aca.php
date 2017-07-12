<script>
	$('#valider_Retour_aca').click(function(){
		openButaca();
		$('#message_Fermeture_aca').hide();
		$('#contaca').hide();
		$('#contenue_rsci').show();
	});
	$('#annuler_Retour_aca').click(function(){
		openButaca();
		$('#message_Fermeture_aca').hide();
	});

</script>
<div id="message_Retour_aca">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_aca">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_aca">			
		</td>
	</tr>
</table>
</div>