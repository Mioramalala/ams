<script>
$(function(){
	//Retour au menu principal
	$('#valider_Ret_ev_sup').click(function(){
		$('#contRsciEnvironnement').show();
		$('#contSupEv').hide();
		$('#mess_ret_ev_sup').hide();
		$('#fancybox_bouton_ev').hide();
		openButtSupf();
	});
	//Retour à la page precedent
	$('#annuler_Ret_ev_sup').click(function(){
		$('#mess_ret_ev_sup').hide();
		$('#fancybox_bouton_ev').hide();
		openButtSupev();
	});
});
</script>
<div id="message_Ret_ev_Sup">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_ev_sup">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_ev_sup">			
		</td>
	</tr>
</table>
</div>