<script>
$(function(){	
	//evenement de l'annulation de la validation de l'objectif B conclusion
	$('#annuler_terminer_conclus_pc_sup').click(function(){
		$('#mess_valide_conclusion_pc_sup').hide();
		$('#int_conclusion_pc_superviseur').show();
	});
	
	$('#enreg_conclus_confirm_pc_sup').click(function(){
		document.getElementById("txt_Synthese_pc").disabled = true;
		$('#mess_slide_conclusion_pc').show();
		$('#mess_valide_conclusion_pc_sup').hide();
	});
});
</script>
<div id="message_Terminer_conclus_pc_sup">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_terminer_conclus_pc_sup">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Valider" id="enreg_conclus_confirm_pc_sup">
		</td>
	</tr>
</table>
</div>