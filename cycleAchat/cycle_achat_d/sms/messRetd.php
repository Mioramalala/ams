<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//Validation de retour message_fermeture_c
	$('#valider_Ret_d').click(function(){
		$('#contenue_rsci').show();
		$('#dv_cont_obj_d').hide();
		$('#message_fermeture_d').hide();
		$('#fancybox_d').hide();
	});
	// Annulation de message de retour
	$('#annuler_Ret_d').click(function(){
		$('#message_fermeture_d').hide();
		$('#fancybox_d').hide();
	});
});
</script>
<div id="message_Ret_d">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_d">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_d">			
		</td>
	</tr>
</table>
</div>