<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_imd').click(function(){
		$('#message_Terminer_question_imd').hide();
		$('#Question_imd_92').fadeIn(500);
	});
	$('#valider_msg_Terminer_question_imd').click(function(){
		$('#message_Slide_terminer_Question_imd').show();
		$('#message_Terminer_question_imd').hide();
	});
});
</script>
<div id="message_Terminer_Int_imd">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir términer</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_imd">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="valider_msg_Terminer_question_imd">
		</td>
	</tr>
</table>
</div>