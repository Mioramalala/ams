<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_dc').click(function(){
		$('#message_Terminer_question_dc').hide();
		$('#Question_dc_295').fadeIn(500);
	});
	$('#valider_msg_Terminer_question_dc').click(function(){
		$('#message_Slide_terminer_Question_dc').show();
		$('#message_Terminer_question_dc').hide();
		//***Griser le questionnaire***//
		document.getElementById("t_dc_1").style.backgroundColor = "grey";
		document.getElementById("t_dc_2").style.backgroundColor = "grey";
		document.getElementById("t_dc_3").style.backgroundColor = "grey";
		document.getElementById("t_dc_4").style.backgroundColor = "grey";
		document.getElementById("t_dc_5").style.backgroundColor = "grey";
		document.getElementById("t_dc_6").style.backgroundColor = "grey";
		document.getElementById("t_dc_7").style.backgroundColor = "grey";
		document.getElementById("t_dc_8").style.backgroundColor = "grey";
		document.getElementById("t_dc_9").style.backgroundColor = "grey";
		document.getElementById("t_dc_10").style.backgroundColor = "grey";
		document.getElementById("t_dc_11").style.backgroundColor = "grey";
		document.getElementById("t_dc_12").style.backgroundColor = "grey";
		document.getElementById("t_dc_13").style.backgroundColor = "grey";
		document.getElementById("t_dc_14").style.backgroundColor = "grey";
		document.getElementById("t_dc_9").style.backgroundColor = "grey";
	});
});
</script>
<div id="message_Terminer_Int_dc">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_dc">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="valider_msg_Terminer_question_dc">
		</td>
	</tr>
</table>
</div>