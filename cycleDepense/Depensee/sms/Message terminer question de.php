<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_de').click(function(){
		$('#message_Terminer_question_de').hide();
		$('#Question_de_312').fadeIn(500);
	});
	$('#valider_msg_Terminer_question_de').click(function(){
		$('#message_Slide_terminer_Question_de').show();
		$('#message_Terminer_question_de').hide();
		//***Griser le questionnaire***//
		document.getElementById("t_de_1").style.backgroundColor = "grey";
		document.getElementById("t_de_2").style.backgroundColor = "grey";
		document.getElementById("t_de_3").style.backgroundColor = "grey";
		document.getElementById("t_de_4").style.backgroundColor = "grey";
		document.getElementById("t_de_5").style.backgroundColor = "grey";
		document.getElementById("t_de_6").style.backgroundColor = "grey";
		document.getElementById("t_de_7").style.backgroundColor = "grey";
		document.getElementById("t_de_6").style.backgroundColor = "grey";
		document.getElementById("t_de_6").style.backgroundColor = "grey";
		document.getElementById("t_de_10").style.backgroundColor = "grey";
		document.getElementById("t_de_11").style.backgroundColor = "grey";
		document.getElementById("t_de_12").style.backgroundColor = "grey";
		document.getElementById("t_de_13").style.backgroundColor = "grey";
		document.getElementById("t_de_14").style.backgroundColor = "grey";
		document.getElementById("t_de_6").style.backgroundColor = "grey";
	});
});
</script>
<div id="message_Terminer_Int_de">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_de">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="valider_msg_Terminer_question_de">
		</td>
	</tr>
</table>
</div>