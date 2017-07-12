<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//Validation de retour message_fermeture_c
	$('#valider_Ret_pb').click(function(){
		$('#contRsciPaie').show();
		$('#contpb').hide();
		$('#message_fermeture_pb').hide();
		$('#fancybox_pb').hide();
	});
	// Annulation de message de retour
	$('#annuler_Ret_pb').click(function(){
		$('#message_fermeture_pb').hide();
		$('#fancybox_pb').hide();
	});
});
</script>
<div id="message_Ret_pb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_pb">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_pb">			
		</td>
	</tr>
</table>
</div>