<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_rc').click(function(){
		$('#message_Terminer_question_rc').hide();
		$('#Question_rc_263').fadeIn(500);
	});
	$('#valider_msg_Terminer_question_rc').click(function(){
		$('#message_Slide_terminer_Question_rc').show();
		$('#message_Terminer_question_rc').hide();
		// //*******Griser le questionnaire********//
		// document.getElementById("t_rc_1").style.backgroundColor='grey';
		// document.getElementById("t_rc_2").style.backgroundColor='grey';
		// document.getElementById("t_rc_3").style.backgroundColor='grey';
		// document.getElementById("t_rc_4").style.backgroundColor='grey';
		// document.getElementById("t_rc_5").style.backgroundColor='grey';
		// document.getElementById("t_rc_6").style.backgroundColor='grey';
		// document.getElementById("t_rc_7").style.backgroundColor='grey';
		// document.getElementById("t_rc_8").style.backgroundColor='grey';
		// document.getElementById("t_rc_9").style.backgroundColor='grey';
		// document.getElementById("t_rc_10").style.backgroundColor='grey';
		// document.getElementById("t_rc_11").style.backgroundColor='grey';
		// document.getElementById("t_rc_12").style.backgroundColor='grey';
		// document.getElementById("t_rc_13").style.backgroundColor='grey';
		// document.getElementById("t_rc_14").style.backgroundColor='grey';
		// document.getElementById("t_rc_9").style.backgroundColor='grey';
	});
});
</script>
<div id="message_Terminer_Int_rc">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_rc">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="valider_msg_Terminer_question_rc">
		</td>
	</tr>
</table>
</div>