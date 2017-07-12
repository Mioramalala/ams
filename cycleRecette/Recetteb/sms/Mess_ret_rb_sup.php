<script>
$(function(){
	//Retour au menu principal
	$('#valider_Ret_rb_sup').click(function(){
		$('#contRsciRecette').show();
		$('#contSupRb').hide();
		$('#mess_ret_rb_sup').hide();
		$('#fancybox_bouton_rb').hide();
		openButtSupf(); // tinay editer
	});
	//Retour à la page precedent
	$('#annuler_Ret_rb_sup').click(function(){
		$('#mess_ret_rb_sup').hide();
		$('#fancybox_bouton_rb').hide();
		openButtSuprb(); // tinay editer
	});
});
</script>
<div id="message_Ret_rb_Sup">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir quitter la page?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Oui" id="valider_Ret_rb_sup">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Non" id="annuler_Ret_rb_sup">			
		</td>
	</tr>
</table>
</div>