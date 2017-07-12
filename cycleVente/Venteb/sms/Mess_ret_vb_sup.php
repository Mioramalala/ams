<script>
$(function(){
	//Retour au menu principal
	$('#valider_Ret_vb_sup').click(function(){
		$('#contRsciVente').show();
		$('#contSupVb').hide();
		$('#mess_ret_vb_sup').hide();
		$('#fancybox_bouton_vb').hide();
		openButtSupf();
	});
	//Retour à la page precedent
	$('#annuler_Ret_vb_sup').click(function(){
		$('#mess_ret_vb_sup').hide();
		$('#fancybox_bouton_vb').hide();
		openButtSupvb();
	});
});
</script>
<div id="message_Ret_vb_Sup">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_vb_sup">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_vb_sup">			
		</td>
	</tr>
</table>
</div>