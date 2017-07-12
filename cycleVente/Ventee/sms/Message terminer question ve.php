<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_ve').click(function(){
		$('#message_Terminer_question_ve').hide();
		$('#Question_ve_92').fadeIn(500);
	});
	$('#valider_msg_Terminer_question_ve').click(function(){
		$('#message_Slide_terminer_Question_ve').show();
		$('#message_Terminer_question_ve').hide();
	});
});
</script>
<div id="message_Terminer_Int_ve">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_ve">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="valider_msg_Terminer_question_ve">
		</td>
	</tr>
</table>
</div>