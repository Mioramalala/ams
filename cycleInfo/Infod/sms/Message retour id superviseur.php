<script>
$(function(){
	$('#valider_Retour_id_superviseur').click(function(){
		$('#contRsciRecette').show();
		$('#contSupId').hide();
		$('#message_fermeture_id_sup').hide();
		openButSupid();
	});
	$('#annuler_Retour_id_superviseur').click(function(){
		$('#message_fermeture_id_sup').hide();
		openButSupid();
	});
});

</script>

<div id="message_Retour_id_superviseur">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_id_superviseur">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_id_superviseur">			
		</td>
	</tr>
</table>
</div>