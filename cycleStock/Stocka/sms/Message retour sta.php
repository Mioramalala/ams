<script>
	$('#valider_Retour_sta').click(function(){
		openButsta();
		$('#message_Fermeture_sta').hide();
		$('#contsta').hide();
		$('#contRsciStock').show();
	});
	$('#annuler_Retour_sta').click(function(){
		openButsta();
		$('#message_Fermeture_sta').hide();
	});

</script>
<div id="message_Retour_sta">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_sta">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_sta">			
		</td>
	</tr>
</table>
</div>