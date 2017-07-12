<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_rb').click(function(){
		$('#message_Terminer_question_rb').hide();
		$('#Question_rb_235').fadeIn(500);
	});
	$('#valider_msg_Terminer_question_rb').click(function(){
		$('#message_Slide_terminer_Question_rb').show();
		$('#message_Terminer_question_rb').hide();
		//***Griser le questionnaire***//
		document.getElementById("t_rb_1").style.backgroundColor = "grey";
		document.getElementById("t_rb_2").style.backgroundColor = "grey";
		document.getElementById("t_rb_3").style.backgroundColor = "grey";
		document.getElementById("t_rb_4").style.backgroundColor = "grey";
		document.getElementById("t_rb_5").style.backgroundColor = "grey";
		document.getElementById("t_rb_6").style.backgroundColor = "grey";
		document.getElementById("t_rb_7").style.backgroundColor = "grey";
		document.getElementById("t_rb_8").style.backgroundColor = "grey";
		document.getElementById("t_rb_9").style.backgroundColor = "grey";
		document.getElementById("t_rb_10").style.backgroundColor = "grey";
		document.getElementById("t_rb_11").style.backgroundColor = "grey";
		document.getElementById("t_rb_12").style.backgroundColor = "grey";
		document.getElementById("t_rb_13").style.backgroundColor = "grey";
		document.getElementById("t_rb_14").style.backgroundColor = "grey";
		document.getElementById("t_rb_15").style.backgroundColor = "grey";
		document.getElementById("t_rb_16").style.backgroundColor = "grey";
		document.getElementById("t_rb_17").style.backgroundColor = "grey";
		document.getElementById("t_rb_18").style.backgroundColor = "grey";
		document.getElementById("t_rb_19").style.backgroundColor = "grey";
		document.getElementById("t_rb_20").style.backgroundColor = "grey";
	});
});
</script>
<div id="message_Terminer_Int_rb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_rb">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="valider_msg_Terminer_question_rb">
		</td>
	</tr>
</table>
</div>