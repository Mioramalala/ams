<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//Validation de retour message_fermeture_c
	$('#valider_Ret_imb').click(function(){
		$('#contRsciImmo').show();
		$('#contimb').hide();
		$('#message_fermeture_imb').hide();
		$('#fancybox_imb').hide();
	});
	// Annulation de message de retour
	$('#annuler_Ret_imb').click(function(){
		$('#message_fermeture_imb').hide();
		$('#fancybox_imb').hide();
	});
});
</script>
<div id="message_Ret_imb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_imb">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_imb">			
		</td>
	</tr>
</table>
</div>