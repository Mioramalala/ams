<script>
$(function(){
	//Retour au menu principal
	$('#valider_Ret_imc_sup').click(function(){
		$('#contRsciImmo').show();
		$('#contSupimc').hide();
		$('#mess_ret_imc_sup').hide();
		$('#fancybox_bouton_imc').hide();
		openButtSupf();
	});
	//Retour à la page precedent
	$('#annuler_Ret_imc_sup').click(function(){
		$('#mess_ret_imc_sup').hide();
		$('#fancybox_bouton_imc').hide();
		openButtSupimc();
	});
});
</script>
<div id="message_Ret_imc_Sup">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_imc_sup">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_imc_sup">			
		</td>
	</tr>
</table>
</div>