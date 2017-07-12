<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_pb').click(function(){
		$('#message_Terminer_question_pb').hide();
		$('#Question_pb_'+stPID_).fadeIn(500);
	});
	$('#valider_msg_Terminer_question_pb').click(function(){
		$('#message_Slide_terminer_Question_pb').show();
		$('#message_Terminer_question_pb').hide();
		// //*******Griser le questionnaire********//
		// document.getElementById("t_pb_1").style.backgroundColor='grey';
		// document.getElementById("t_pb_2").style.backgroundColor='grey';
		// document.getElementById("t_pb_3").style.backgroundColor='grey';
		// document.getElementById("t_pb_4").style.backgroundColor='grey';
		// document.getElementById("t_pb_5").style.backgroundColor='grey';
		// document.getElementById("t_pb_6").style.backgroundColor='grey';
		// document.getElementById("t_pb_7").style.backgroundColor='grey';
		// document.getElementById("t_pb_8").style.backgroundColor='grey';
		// document.getElementById("t_pb_9").style.backgroundColor='grey';
		// document.getElementById("t_pb_10").style.backgroundColor='grey';
		// document.getElementById("t_pb_11").style.backgroundColor='grey';
		// document.getElementById("t_pb_12").style.backgroundColor='grey';
		// document.getElementById("t_pb_13").style.backgroundColor='grey';
		// document.getElementById("t_pb_14").style.backgroundColor='grey';
		// document.getElementById("t_pb_15").style.backgroundColor='grey';
	});
});
</script>
<div id="message_Terminer_Int_pb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_pb">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="valider_msg_Terminer_question_pb">
		</td>
	</tr>
</table>
</div>