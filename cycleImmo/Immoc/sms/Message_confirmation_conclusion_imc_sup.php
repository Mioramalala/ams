<script>
$(function(){	
	//evenement de l'annulation de la validation de l'objectif B conclusion
	$('#annuler_terminer_conclus_imc_sup').click(function(){
		$('#mess_valide_conclusion_imc_sup').hide();
		$('#int_conclusion_imc_superviseur').show();
	});
	
	$('#enreg_conclus_confirm_imc_sup').click(function(){
		$('#mess_slide_conclusion_imc').show();
		$('#mess_valide_conclusion_imc_sup').hide();
		document.getElementById("txt_Synthese_imc").disabled = true;
	});
});
</script>
<div id="message_Terminer_conclus_imc_sup">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_terminer_conclus_imc_sup">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Valider" id="enreg_conclus_confirm_imc_sup">
		</td>
	</tr>
</table>
</div>