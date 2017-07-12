<script language="javascript">
$(function(){
	//--------------------Dans la boite de dialogue de message_Terminer_question_c
	$('#valider_msg_Annuler_question_vf').click(function(){
		$('#message_Terminer_question_vf').hide();
		$(quetion_vf).fadeIn(500);
	});
	$('#valider_msg_Terminer_question_vf').click(function(){
		$('#message_Slide_terminer_Question_vf').show();
		$('#message_Terminer_question_vf').hide();
		//*******Griser le questionnaire********//
		document.getElementById("t_vf_1").style.backgroundColor='grey';
		document.getElementById("t_vf_2").style.backgroundColor='grey';
		document.getElementById("t_vf_3").style.backgroundColor='grey';
		document.getElementById("t_vf_4").style.backgroundColor='grey';
		document.getElementById("t_vf_5").style.backgroundColor='grey';
		document.getElementById("t_vf_6").style.backgroundColor='grey';
		document.getElementById("t_vf_7").style.backgroundColor='grey';
		document.getElementById("t_vf_8").style.backgroundColor='grey';
		document.getElementById("t_vf_9").style.backgroundColor='grey';
		document.getElementById("t_vf_10").style.backgroundColor='grey';
		document.getElementById("t_vf_11").style.backgroundColor='grey';
		document.getElementById("t_vf_12").style.backgroundColor='grey';
		document.getElementById("t_vf_13").style.backgroundColor='grey';
		document.getElementById("t_vf_14").style.backgroundColor='grey';
		document.getElementById("t_vf_12").style.backgroundColor='grey';
	});
});
</script>
<div id="message_Terminer_Int_vf">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Veuillez maintenant saisir la synthèse</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_vf">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Terminer" id="valider_msg_Terminer_question_vf">
		</td>
	</tr>
</table>
</div>