<script>
$(function(){
	//Retour au menu principal
	$('#valider_Ret_pb_sup').click(function(){
		$('#contRsciPaie').show();
		$('#contSupPb').hide();
		$('#mess_ret_pb_sup').hide();
		$('#fancybox_bouton_pb').hide();
		openButtSupf();
	});
	//Retour à la page precedent
	$('#annuler_Ret_pb_sup').click(function(){
		$('#mess_ret_pb_sup').hide();
		$('#fancybox_bouton_pb').hide();
		openButtSuppb();
	});
});
</script>
<div id="message_Ret_pb_Sup">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_pb_sup">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_pb_sup">			
		</td>
	</tr>
</table>
</div>