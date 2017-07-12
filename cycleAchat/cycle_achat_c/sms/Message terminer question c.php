<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_c').click(function(){
		$('#message_Terminer_question_c').hide();
		$('#Question_c_33').fadeIn(500);
	});
	$('#valider_msg_Terminer_question_c').click(function(){
		$('#message_Slide_terminer_Question_c').show();
		$('#message_Terminer_question_c').hide();
	});
});
</script>
<div id="message_Terminer_Int_c">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir términer</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_c">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="valider_msg_Terminer_question_c">
		</td>
	</tr>
</table>
</div>