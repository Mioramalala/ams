<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//Validation de retour message_fermeture_c
	$('#valider_Ret_acb').click(function(){
		$('#dv_cont_obj_b').hide();
		$('#contenue_rsci').show();
		$('#message_fermeture_acb').hide();
		$('#fancybox_acb').hide();
	});
	// Annulation de message de retour
	$('#annuler_Ret_acb').click(function(){
		$('#message_fermeture_acb').hide();
		$('#fancybox_acb').hide();
	});
});
</script>
<div id="message_Ret_acb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_acb">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_acb">			
		</td>
	</tr>
</table>
</div>