<script>
$(function(){	
	//evenement de l'annulation de la validation de l'objectif B conclusion
	$('#annuler_terminer_conclus_rd_sup').click(function(){
		$('#mess_valide_conclusion_rd_sup').hide();
		$('#int_conclusion_rd_superviseur').show();
	});
	
	$('#enreg_conclus_confirm_rd_sup').click(function(){
		document.getElementById("txt_Synthese_rd").disabled = true;
		$('#mess_slide_conclusion_rd').show();
		$('#mess_valide_conclusion_rd_sup').hide();
	});
});
</script>
<div id="message_Terminer_conclus_rd_sup">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_terminer_conclus_rd_sup">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Valider" id="enreg_conclus_confirm_rd_sup">
		</td>
	</tr>
</table>
</div>