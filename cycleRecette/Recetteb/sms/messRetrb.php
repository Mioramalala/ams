<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//Validation de retour message_fermeture_c
	$('#valider_Ret_rb').click(function(){
		$('#contRsciRecette').show();
		$('#contrb').hide();
		$('#message_fermeture_rb').hide();
		$('#fancybox_rb').hide();
	});
	// Annulation de message de retour
	$('#annuler_Ret_rb').click(function(){
		$('#message_fermeture_rb').hide();
		$('#fancybox_rb').hide();
	});
});
</script>
<div id="message_Ret_rb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_rb">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_rb">			
		</td>
	</tr>
</table>
</div>