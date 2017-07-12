<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_f').click(function(){
		$('#message_Terminer_question_f').hide();
		$('#Question_f_69').fadeIn(500);
	});
	$('#valider_msg_Terminer_question_f').click(function(){
		$('#message_Slide_terminer_Question_f').show();
		$('#message_Terminer_question_f').hide();
	});
});
</script>
<div id="message_Terminer_Int_f">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir términer</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_f">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="valider_msg_Terminer_question_f">
		</td>
	</tr>
</table>
</div>