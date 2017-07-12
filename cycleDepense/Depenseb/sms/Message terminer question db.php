<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_db').click(function(){
		$('#message_Terminer_question_db').hide();
		$('#Question_db_280').fadeIn(500);
	});
	$('#valider_msg_Terminer_question_db').click(function(){
		$('#message_Slide_terminer_Question_db').show();
		$('#message_Terminer_question_db').hide();
		//***Griser le questionnaire***//
		document.getElementById("t_db_1").style.backgroundColor = "grey";
		document.getElementById("t_db_2").style.backgroundColor = "grey";
		document.getElementById("t_db_3").style.backgroundColor = "grey";
		document.getElementById("t_db_4").style.backgroundColor = "grey";
		document.getElementById("t_db_5").style.backgroundColor = "grey";
		document.getElementById("t_db_6").style.backgroundColor = "grey";
		document.getElementById("t_db_7").style.backgroundColor = "grey";
		document.getElementById("t_db_8").style.backgroundColor = "grey";
		document.getElementById("t_db_9").style.backgroundColor = "grey";
		document.getElementById("t_db_10").style.backgroundColor = "grey";
		document.getElementById("t_db_11").style.backgroundColor = "grey";
		document.getElementById("t_db_12").style.backgroundColor = "grey";
		document.getElementById("t_db_13").style.backgroundColor = "grey";
		document.getElementById("t_db_14").style.backgroundColor = "grey";
		document.getElementById("t_db_15").style.backgroundColor = "grey";
	});
});
</script>
<div id="message_Terminer_Int_db">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_db">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="valider_msg_Terminer_question_db">
		</td>
	</tr>
</table>
</div>