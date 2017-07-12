<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_vb').click(function(){
		$('#message_Terminer_question_vb').hide();
		$(quetion_vb).fadeIn(500);
	});
	$('#valider_msg_Terminer_question_vb').click(function(){
		$('#message_Slide_terminer_Question_vb').show();
		$('#message_Terminer_question_vb').hide();
	});
});
</script>
<div id="message_Terminer_Int_vb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Veuillez maintenant saisir la synthèse</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_vb">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="valider_msg_Terminer_question_vb">
		</td>
	</tr>
</table>
</div>