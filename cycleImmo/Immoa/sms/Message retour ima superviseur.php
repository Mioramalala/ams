<script>
$(function(){
	$('#valider_Retour_ima_superviseur').click(function(){
		$('#contRsciImmo').show();
		$('#contSupIma').hide();
		$('#message_fermeture_ima_sup').hide();
		openButSupima();
	});
	$('#annuler_Retour_ima_superviseur').click(function(){
		$('#message_fermeture_ima_sup').hide();
		openButSupima();
	});
});

</script>

<div id="message_Retour_ima_superviseur">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_ima_superviseur">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_ima_superviseur">			
		</td>
	</tr>
</table>
</div>