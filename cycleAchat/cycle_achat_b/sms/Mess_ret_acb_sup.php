<script>
$(function(){
	//Retour au menu principal
	$('#valider_Ret_acb_sup').click(function(){
		$('#contenue_rsci').show();
		$('#dv_cont_obj_sup_b').hide();
		$('#mess_ret_acb_sup').hide();
		$('#fancybox_bouton_acb').hide();
		openButtSupf();
	});
	//Retour à la page precedent
	$('#annuler_Ret_acb_sup').click(function(){
		$('#mess_ret_acb_sup').hide();
		$('#fancybox_bouton_acb').hide();
		openButtSupacb();
	});
});
</script>
<div id="message_Ret_acb_Sup">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_acb_sup">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_acb_sup">			
		</td>
	</tr>
</table>
</div>