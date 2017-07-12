<script>
$(function(){
	$('#valider_Retour_va_superviseur').click(function(){
		$('#contRsciVente').show();
		$('#contSupVa').hide();
		$('#message_fermeture_va_sup').hide();
		openButSupva();
	});
	$('#annuler_Retour_va_superviseur').click(function(){
		$('#message_fermeture_va_sup').hide();
		openButSupva();
	});
});

</script>

<div id="message_Retour_va_superviseur">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_va_superviseur">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_va_superviseur">			
		</td>
	</tr>
</table>
</div>