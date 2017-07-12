<script>
$(function(){
	//Retour au menu principal
	$('#valider_Ret_rd_sup').click(function(){
		$('#contRsciRecette').show();
		$('#contSupRd').hide();
		$('#mess_ret_rd_sup').hide();
		$('#fancybox_bouton_rd').hide();
		openButtSupf();
	});
	//Retour à la page precedent
	$('#annuler_Ret_rd_sup').click(function(){
		$('#mess_ret_rd_sup').hide();
		$('#fancybox_bouton_rd').hide();
		openButtSuprd();
	});
});
</script>
<div id="message_Ret_rd_Sup">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_rd_sup">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_rd_sup">			
		</td>
	</tr>
</table>
</div>