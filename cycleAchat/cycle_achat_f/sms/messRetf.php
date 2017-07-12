<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//Validation de retour message_fermeture_c
	$('#valider_Ret_f').click(function(){
		$('#contenue_rsci').show();
		$('#dv_cont_obj_f').hide();
		$('#message_fermeture_f').hide();
		$('#fancybox_f').hide();
	});
	// Annulation de message de retour
	$('#annuler_Ret_f').click(function(){
		$('#message_fermeture_f').hide();
		$('#fancybox_f').hide();
	});
});
</script>
<div id="message_Ret_f">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_f">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_f">			
		</td>
	</tr>
</table>
</div>