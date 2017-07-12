<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_rd').click(function(){
		$('#message_Terminer_question_rd').hide();
		$('#Question_rd_272').fadeIn(500);
	});
	$('#valider_msg_Terminer_question_rd').click(function(){
		$('#message_Slide_terminer_Question_rd').show();
		$('#message_Terminer_question_rd').hide();
		// //*******Griser le questionnaire********//
		// document.getElementById("t_rd_1").style.backgroundColor='grey';
		// document.getElementById("t_rd_2").style.backgroundColor='grey';
		// document.getElementById("t_rd_3").style.backgroundColor='grey';
		// document.getElementById("t_rd_4").style.backgroundColor='grey';
		// document.getElementById("t_rd_5").style.backgroundColor='grey';
		// document.getElementById("t_rd_6").style.backgroundColor='grey';
		// document.getElementById("t_rd_7").style.backgroundColor='grey';
		// document.getElementById("t_rd_8").style.backgroundColor='grey';
		// document.getElementById("t_rd_9").style.backgroundColor='grey';
		// document.getElementById("t_rd_10").style.backgroundColor='grey';
		// document.getElementById("t_rd_11").style.backgroundColor='grey';
		// document.getElementById("t_rd_12").style.backgroundColor='grey';
		// document.getElementById("t_rd_13").style.backgroundColor='grey';
		// document.getElementById("t_rd_14").style.backgroundColor='grey';
		// document.getElementById("t_rd_9").style.backgroundColor='grey';
	});
});
</script>
<div id="message_Terminer_Int_rd">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_rd">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="valider_msg_Terminer_question_rd">
		</td>
	</tr>
</table>
</div>