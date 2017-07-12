<script>
$(function(){
	$('#valider_Retour_concl_superviseur').click(function(){
		$('#contRsciInfo').show();
		$('#contSupConcl').hide();
		$('#message_fermeture_concl_sup').hide();
		openButSupConcl();
	});
	$('#annuler_Retour_concl_superviseur').click(function(){
		$('#message_fermeture_concl_sup').hide();
		openButSupConcl();
	});
});

</script>

<div id="message_Retour_concl_superviseur">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_concl_superviseur">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_concl_superviseur">			
		</td>
	</tr>
</table>
</div>