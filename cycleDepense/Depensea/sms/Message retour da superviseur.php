<script>
$(function(){
	$('#valider_Retour_da_superviseur').click(function(){
		$('#contRsciDepense').show();
		$('#contSupDa').hide();
		$('#message_fermeture_da_sup').hide();
		openButSupda();
	});
	$('#annuler_Retour_da_superviseur').click(function(){
		$('#message_fermeture_da_sup').hide();
		openButSupda();
	});
});

</script>

<div id="message_Retour_da_superviseur">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_da_superviseur">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_da_superviseur">			
		</td>
	</tr>
</table>
</div>