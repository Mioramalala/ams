<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//Validation de retour message_fermeture_c
	$('#valider_Ret_stc').click(function(){
		$('#contRsciStock').show();
		$('#contstc').hide();
		$('#message_fermeture_stc').hide();
		$('#fancybox_stc').hide();
	});
	// Annulation de message de retour
	$('#annuler_Ret_stc').click(function(){
		$('#message_fermeture_stc').hide();
		$('#fancybox_stc').hide();
	});
});
</script>
<div id="message_Ret_stc">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_stc">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_stc">			
		</td>
	</tr>
</table>
</div>