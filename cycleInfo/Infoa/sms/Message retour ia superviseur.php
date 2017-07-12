<script>
$(function(){
	$('#valider_Retour_ia_superviseur').click(function(){
		$('#contRsciRecette').show();
		$('#contSupIa').hide();
		$('#message_fermeture_ia_sup').hide();
		openButSupia();
	});
	$('#annuler_Retour_ia_superviseur').click(function(){
		$('#message_fermeture_ia_sup').hide();
		openButSupia();
	});
});

</script>

<div id="message_Retour_ia_superviseur">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_ia_superviseur">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_ia_superviseur">			
		</td>
	</tr>
</table>
</div>