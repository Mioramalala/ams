<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_pd').click(function(){
		$('#message_Terminer_question_pd').hide();
		$('#Question_pd_'+stPDID).fadeIn(500);
	});
	$('#valider_msg_Terminer_question_pd').click(function(){
		$('#message_Slide_terminer_Question_pd').show();
		$('#message_Terminer_question_pd').hide();
		///*****Griser les questions*******////
		document.getElementById("t_pd_1").style.backgroundColor = "grey";
		document.getElementById("t_pd_2").style.backgroundColor = "grey";
		document.getElementById("t_pd_3").style.backgroundColor = "grey";
		document.getElementById("t_pd_4").style.backgroundColor = "grey";
		document.getElementById("t_pd_5").style.backgroundColor = "grey";
	});
});
</script>
<div id="message_Terminer_Int_pd">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_pd">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="valider_msg_Terminer_question_pd">
		</td>
	</tr>
</table>
</div>