<script>
	$('#valider_Retour_ib').click(function(){
		openButib();
		$('#message_Fermeture_ib').hide();
		$('#contib').hide();
		$('#contRsciInfo').show();
	});
	$('#annuler_Retour_ib').click(function(){
		openButib();
		$('#message_Fermeture_ib').hide();
	});

</script>
<div id="message_Retour_ib">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_ib">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_ib">			
		</td>
	</tr>
</table>
</div>