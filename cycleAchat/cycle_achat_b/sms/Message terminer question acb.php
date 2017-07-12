<?php // Les évènements des boutons sont dans l'interface_c ?>

	<script language="javascript">
		$(function(){
			//--------------------Dans la boite de dialogue de message_Terminer_question_c
			$('#valider_msg_Annuler_question_acb').click(function(){
				$('#message_Terminer_question_acb').hide();
				
				$('#Question_acb_'+StID).fadeIn(500);
			});
			$('#valider_msg_Terminer_question_acb').click(function(){
				$('#message_Slide_terminer_Question_acb').show();
				$('#message_Terminer_question_acb').hide();
			});
		});
	</script>

	<div id="message_Terminer_Int_acb">

		<table width="500">
			<tr class="label" align="center" height="50">
				<td>Etes-vous sûr de vouloir terminer</td>
			</tr>
			<tr align="center" height="50">
				<td>
					<input type="button" class="bouton" value="Annuler" id="valider_msg_Annuler_question_acb">&nbsp;&nbsp;&nbsp;
					<input type="button" class="bouton" value="Enregistrer" id="valider_msg_Terminer_question_acb">
				</td>
			</tr>
		</table>
		
	</div>