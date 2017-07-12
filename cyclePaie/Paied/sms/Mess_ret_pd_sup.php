<script>
$(function(){
	//Retour au menu principal
	$('#valider_Ret_pd_sup').click(function(){
		$('#contRsciPaie').show();
		$('#contSupPd').hide();
		$('#mess_ret_pd_sup').hide();
		$('#fancybox_bouton_pd').hide();
		openButtSupf();
	});
	//Retour à la page precedent
	$('#annuler_Ret_pd_sup').click(function(){
		$('#mess_ret_pd_sup').hide();
		$('#fancybox_bouton_pd').hide();
		openButtSuppd();
	});
});
</script>
<div id="message_Ret_pd_Sup">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_pd_sup">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_pd_sup">			
		</td>
	</tr>
</table>
</div>