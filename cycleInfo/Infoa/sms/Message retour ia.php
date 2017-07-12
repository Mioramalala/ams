<script>
	$('#valider_Retour_ia').click(function(){
		openButia();
		$('#message_Fermeture_ia').hide();
		$('#contia').hide();
		$('#contRsciInfo').show();
	});
	$('#annuler_Retour_ia').click(function(){
		openButia();
		$('#message_Fermeture_ia').hide();
	});

</script>
<div id="message_Retour_ia">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_ia">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_ia">			
		</td>
	</tr>
</table>
</div>