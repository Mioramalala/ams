<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_imb').click(function(){
		$('#message_Terminer_question_imb').hide();
		$('#Question_imb_92').fadeIn(500);
	});
	$('#valider_msg_Terminer_question_imb').click(function(){
		$('#message_Slide_terminer_Question_imb').show();
		$('#message_Terminer_question_imb').hide();
		$("#message_confirmation_slide_Synthese_imb").css("display","inline-block");
	});
});
</script>
<div id="message_Terminer_Int_imb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir términer</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_imb">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="valider_msg_Terminer_question_imb">
		</td>
	</tr>
</table>
</div>