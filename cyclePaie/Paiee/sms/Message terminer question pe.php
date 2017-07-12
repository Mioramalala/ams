<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_pe').click(function(){
		$('#message_Terminer_question_pe').hide();
		$('#Question_pe_'+StPEID).fadeIn(500);
	});
	$('#valider_msg_Terminer_question_pe').click(function(){
		$('#message_Slide_terminer_Question_pe').show();
		$('#message_Terminer_question_pe').hide();
		//****Griser*****//
		document.getElementById("t_pe_1").style.backgroundColor = "grey";
		document.getElementById("t_pe_2").style.backgroundColor = "grey";
		document.getElementById("t_pe_3").style.backgroundColor = "grey";
		document.getElementById("t_pe_4").style.backgroundColor = "grey";
		document.getElementById("t_pe_5").style.backgroundColor = "grey";
		document.getElementById("t_pe_6").style.backgroundColor = "grey";
		document.getElementById("t_pe_7").style.backgroundColor = "grey";
		document.getElementById("t_pe_8").style.backgroundColor = "grey";
	});
});
</script>
<div id="message_Terminer_Int_pe">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer ?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_pe">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="valider_msg_Terminer_question_pe">
		</td>
	</tr>
</table>
</div>