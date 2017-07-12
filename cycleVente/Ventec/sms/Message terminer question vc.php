<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_vc').click(function(){
		$('#message_Terminer_question_vc').hide();
		$('#Question_vc_92').fadeIn(500);
	});
	$('#valider_msg_Terminer_question_vc').click(function(){
		$('#message_Slide_terminer_Question_vc').show();
		$("#Int_vc_Synthese").click();
		$('#message_Terminer_question_vc').hide();
	});
});
</script>
<div id="message_Terminer_Int_vc">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Veuillez maintenant saisir la synthèse</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_vc">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="valider_msg_Terminer_question_vc">
		</td>
	</tr>
</table>
</div>