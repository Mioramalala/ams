<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//Validation de retour message_fermeture_c
	$('#valider_Ret_ve').click(function(){
		$('#contRsciVente').show();
		$('#contve').hide();
		$('#message_fermeture_ve').hide();
		$('#fancybox_ve').hide();
	});
	// Annulation de message de retour
	$('#annuler_Ret_ve').click(function(){
		$('#message_fermeture_ve').hide();
		$('#fancybox_ve').hide();
	});
});
</script>
<div id="message_Ret_ve">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_ve">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_ve">			
		</td>
	</tr>
</table>
</div>