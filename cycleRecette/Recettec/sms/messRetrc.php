<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//Validation de retour message_fermeture_c
	$('#valider_Ret_rc').click(function(){
		$('#contRsciRecette').show();
		$('#contrc').hide();
		$('#message_fermeture_rc').hide();
		$('#fancybox_rc').hide();
	});
	// Annulation de message de retour
	$('#annuler_Ret_rc').click(function(){
		$('#message_fermeture_rc').hide();
		$('#fancybox_rc').hide();
	});
});
</script>
<div id="message_Ret_rc">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_rc">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_rc">			
		</td>
	</tr>
</table>
</div>