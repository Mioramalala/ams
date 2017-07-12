<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){

	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_ev').click(function(){
		$('#message_Terminer_question_ev').hide();
		$('#Question_ev_405').fadeIn(500);
	});


	$('#valider_msg_Terminer_question_ev').click(function()
	{
		message_confirmation_slide_Synthese_ev
		$('#message_Slide_terminer_Question_ev').show();
		$('#message_confirmation_slide_Synthese_ev').show();
		$('#message_Terminer_question_ev').hide();

		//***Griser le questionnaire***//
		document.getElementById("t_ev_1").style.backgroundColor = 'grey';
		document.getElementById("t_ev_2").style.backgroundColor = 'grey';
		document.getElementById("t_ev_3").style.backgroundColor = 'grey';
		document.getElementById("t_ev_4").style.backgroundColor = 'grey';
		document.getElementById("t_ev_5").style.backgroundColor = 'grey';
		document.getElementById("t_ev_6").style.backgroundColor = 'grey';
		document.getElementById("t_ev_7").style.backgroundColor = 'grey';
		document.getElementById("t_ev_8").style.backgroundColor = 'grey';
		document.getElementById("t_ev_9").style.backgroundColor = 'grey';
		document.getElementById("t_ev_10").style.backgroundColor = 'grey';
		document.getElementById("t_ev_11").style.backgroundColor = 'grey';
		document.getElementById("t_ev_12").style.backgroundColor = 'grey';
		document.getElementById("t_ev_13").style.backgroundColor = 'grey';
		document.getElementById("t_ev_14").style.backgroundColor = 'grey';
		document.getElementById("t_ev_15").style.backgroundColor = 'grey';
		document.getElementById("t_ev_16").style.backgroundColor = 'grey';
		document.getElementById("t_ev_17").style.backgroundColor = 'grey';
		document.getElementById("t_ev_18").style.backgroundColor = 'grey';
		document.getElementById("t_ev_19").style.backgroundColor = 'grey';
		document.getElementById("t_ev_20").style.backgroundColor = 'grey';
		document.getElementById("t_ev_21").style.backgroundColor = 'grey';
		document.getElementById("t_ev_22").style.backgroundColor = 'grey';
		document.getElementById("t_ev_23").style.backgroundColor = 'grey';
		document.getElementById("t_ev_24").style.backgroundColor = 'grey';
		document.getElementById("t_ev_25").style.backgroundColor = 'grey';
		//la synthèse de ev

	});
});
</script>
<div id="message_Terminer_Int_ev">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_ev">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="valider_msg_Terminer_question_ev">
		</td>
	</tr>
</table>
</div>