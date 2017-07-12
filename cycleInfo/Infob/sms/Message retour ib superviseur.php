<script>
$(function(){
	$('#valider_Retour_ib
_superviseur').click(function(){
		$('#contRsciRecette').show();
		$('#contSupIa
').hide();
		$('#message_fermeture_ib
_sup').hide();
		openButSupib
();
	});
	$('#annuler_Retour_ib
_superviseur').click(function(){
		$('#message_fermeture_ib
_sup').hide();
		openButSupib
();
	});
});

</script>

<div id="message_Retour_ib
_superviseur">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Retour_ib
_superviseur">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Retour_ib
_superviseur">			
		</td>
	</tr>
</table>
</div>