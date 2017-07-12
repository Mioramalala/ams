<script>
	$('#valider_Retour_concl').click(function(){
		openButconcl();
		$('#message_Fermeture_concl').hide();
		$('#contSupConclusion').hide();
		$('#int_concl').hide();
		$('#contRsciInfo').show();
	});
	$('#annuler_Retour_concl').click(function(){
		openButconcl();
		$('#message_Fermeture_concl').hide();
	});

</script>
<div id="message_Retour_concl">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_concl">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_concl">			
		</td>
	</tr>
</table>
</div>