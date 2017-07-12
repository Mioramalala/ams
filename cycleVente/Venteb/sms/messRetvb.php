<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//Validation de retour message_fermeture_c
	$('#valider_Ret_vb').click(function(){
		$('#contRsciVente').show();
		$('#contvb').hide();
		$('#message_fermeture_vb').hide();
		$('#fancybox_vb').hide();
	});
	// Annulation de message de retour
	$('#annuler_Ret_vb').click(function(){
		$('#message_fermeture_vb').hide();
		$('#fancybox_vb').hide();
	});
});
</script>
<div id="message_Ret_vb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_vb">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_vb">			
		</td>
	</tr>
</table>
</div>