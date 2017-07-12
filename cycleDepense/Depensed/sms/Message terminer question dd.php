<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_dd').click(function(){
		$('#message_Terminer_question_dd').hide();
		$('#Question_dd_304').fadeIn(500);
	});
	$('#valider_msg_Terminer_question_dd').click(function(){
		$('#message_Slide_terminer_Question_dd').show();
		$('#message_Terminer_question_dd').hide();
		//***Griser le questionnaire***//
		document.getElementById("t_dd_1").style.backgroundColor = "grey";
		document.getElementById("t_dd_2").style.backgroundColor = "grey";
		document.getElementById("t_dd_3").style.backgroundColor = "grey";
		document.getElementById("t_dd_4").style.backgroundColor = "grey";
		document.getElementById("t_dd_5").style.backgroundColor = "grey";
		document.getElementById("t_dd_6").style.backgroundColor = "grey";
		document.getElementById("t_dd_7").style.backgroundColor = "grey";
		document.getElementById("t_dd_8").style.backgroundColor = "grey";
		document.getElementById("t_dd_8").style.backgroundColor = "grey";
		document.getElementById("t_dd_10").style.backgroundColor = "grey";
		document.getElementById("t_dd_11").style.backgroundColor = "grey";
		document.getElementById("t_dd_12").style.backgroundColor = "grey";
		document.getElementById("t_dd_13").style.backgroundColor = "grey";
		document.getElementById("t_dd_14").style.backgroundColor = "grey";
		document.getElementById("t_dd_8").style.backgroundColor = "grey";
	});
});
</script>
<div id="message_Terminer_Int_dd">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_dd">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="valider_msg_Terminer_question_dd">
		</td>
	</tr>
</table>
</div>