<script>
$(function(){	
	//evenement de l'annulation de la validation de l'objectif B conclusion
	$('#annuler_terminer_conclus_vc_sup').click(function(){
		$('#mess_valide_conclusion_vc_sup').hide();
		$('#int_conclusion_vc_superviseur').show();
	});
	
	$('#enreg_conclus_confirm_vc_sup').click(function(){
		document.getElementById("txt_Synthese_vc").disabled = true;
		$('#mess_slide_conclusion_vc').show();
		$('#mess_valide_conclusion_vc_sup').hide();
	});
});
</script>
<div id="message_Terminer_conclus_vc_sup">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_terminer_conclus_vc_sup">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Valider" id="enreg_conclus_confirm_vc_sup">
		</td>
	</tr>
</table>
</div>