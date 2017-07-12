<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//Validation de retour message_fermeture_c
	$('#valider_Ret_pd').click(function(){
		$('#contRsciPaie').show();
		$('#contpd').hide();
		$('#message_fermeture_pd').hide();
		$('#fancybox_pd').hide();
	});
	// Annulation de message de retour
	$('#annuler_Ret_pd').click(function(){
		$('#message_fermeture_pd').hide();
		$('#fancybox_pd').hide();
	});
});
</script>
<div id="message_Ret_pd">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_pd">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_pd">			
		</td>
	</tr>
</table>
</div>