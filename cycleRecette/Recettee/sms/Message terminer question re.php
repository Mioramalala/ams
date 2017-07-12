<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_re').click(function(){
		$('#message_Terminer_question_re').hide();
		$('#Question_re_279').fadeIn(500);
	});
	$('#valider_msg_Terminer_question_re').click(function(){
		$('#message_Slide_terminer_Question_re').show();
		$('#message_Terminer_question_re').hide();
		// //*******Griser le questionnaire********//
		// document.getElementById("t_re_1").style.backgroundColor='grey';
		// document.getElementById("t_re_2").style.backgroundColor='grey';
		// document.getElementById("t_re_3").style.backgroundColor='grey';
		// document.getElementById("t_re_4").style.backgroundColor='grey';
		// document.getElementById("t_re_5").style.backgroundColor='grey';
		// document.getElementById("t_re_6").style.backgroundColor='grey';
		// document.getElementById("t_re_7").style.backgroundColor='grey';
		// document.getElementById("t_re_8").style.backgroundColor='grey';
		// document.getElementById("t_re_7").style.backgroundColor='grey';
		// document.getElementById("t_re_10").style.backgroundColor='grey';
		// document.getElementById("t_re_11").style.backgroundColor='grey';
		// document.getElementById("t_re_12").style.backgroundColor='grey';
		// document.getElementById("t_re_13").style.backgroundColor='grey';
		// document.getElementById("t_re_14").style.backgroundColor='grey';
		// document.getElementById("t_re_7").style.backgroundColor='grey';
	});
});
</script>
<div id="message_Terminer_Int_re">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_re">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="valider_msg_Terminer_question_re">
		</td>
	</tr>
</table>
</div>