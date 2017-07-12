<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//Validation de retour message_fermeture_c
	$('#valider_Ret_pe').click(function(){
		$('#contRsciPaie').show();
		$('#contpe').hide();
		$('#message_fermeture_pe').hide();
		$('#fancybox_pe').hide();
	});
	// Annulation de message de retour
	$('#annuler_Ret_pe').click(function(){
		$('#message_fermeture_pe').hide();
		$('#fancybox_pe').hide();
	});
});
</script>
<div id="message_Ret_pe">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_pe">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_pe">			
		</td>
	</tr>
</table>
</div>