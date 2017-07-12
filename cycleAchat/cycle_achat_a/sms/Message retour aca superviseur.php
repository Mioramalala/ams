<script>
$(function(){
	$('#valider_Retour_aca_superviseur').click(function(){
		$('#contenue_rsci').show();
		$('#contSupaca').hide();
		$('#message_fermeture_aca_sup').hide();
		openButSupaca();
	});
	$('#annuler_Retour_aca_superviseur').click(function(){
		$('#message_fermeture_aca_sup').hide();
		openButSupaca();
	});
});

</script>

<div id="message_Retour_aca_superviseur">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_aca_superviseur">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_aca_superviseur">			
		</td>
	</tr>
</table>
</div>