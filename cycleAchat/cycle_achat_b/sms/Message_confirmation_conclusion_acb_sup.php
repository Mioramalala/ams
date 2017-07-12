<script>
$(function(){	
	//evenement de l'annulation de la validation de l'objectif B conclusion
	$('#annuler_terminer_conclus_acb_sup').click(function(){
		$('#mess_valide_conclusion_acb_sup').hide();
		$('#int_conclusion_acb_superviseur').show();
	});
	
	$('#enreg_conclus_confirm_acb_sup').click(function(){
		$('#mess_slide_conclusion_acb').show();
		$('#mess_valide_conclusion_acb_sup').hide();
	});
});
</script>
<div id="message_Terminer_conclus_acb_sup">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_terminer_conclus_acb_sup">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Valider" id="enreg_conclus_confirm_acb_sup">
		</td>
	</tr>
</table>
</div>