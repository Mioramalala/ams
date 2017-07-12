<script>
$(function(){
	$('#valider_Retour_sta_superviseur').click(function(){
		$('#contRsciStock').show();
		$('#contSupSta').hide();
		$('#message_fermeture_sta_sup').hide();
		openButSupsta();
	});
	$('#annuler_Retour_sta_superviseur').click(function(){
		$('#message_fermeture_sta_sup').hide();
		openButSupsta();
	});
});

</script>

<div id="message_Retour_sta_superviseur">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_sta_superviseur">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_sta_superviseur">			
		</td>
	</tr>
</table>
</div>