<script>
$(function(){
	//Retour au menu principal
	$('#valider_Ret_e_sup').click(function(){
		$('#contenue_rsci').show();
		$('#dv_cont_obj_e_sup').hide();
		$('#mess_ret_e_sup').hide();
		$('#fancybox_bouton_e').hide();
		openButtSupe();
	});
	//Retour à la page precedent
	$('#annuler_Ret_e_sup').click(function(){
		$('#mess_ret_e_sup').hide();
		$('#fancybox_bouton_e').hide();
		openButtSupe();
	});
});
</script>
<div id="message_Ret_e_Sup">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_e_sup">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_e_sup">			
		</td>
	</tr>
</table>
</div>