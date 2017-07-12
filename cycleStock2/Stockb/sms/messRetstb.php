<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//Validation de retour message_fermeture_c
	$('#valider_Ret_stb').click(function(){
		$('#contRsciStock').show();
		$('#contstb').hide();
		$('#message_fermeture_stb').hide();
		$('#fancybox_stb').hide();
	});
	// Annulation de message de retour
	$('#annuler_Ret_stb').click(function(){
		$('#message_fermeture_stb').hide();
		$('#fancybox_stb').hide();
	});
});
</script>
<div id="message_Ret_stb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_stb">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_stb">			
		</td>
	</tr>
</table>
</div>