<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_c
	$('#message__Slide_Ok_Question_imb').click(function(){
		$('#message_confirmation_slide_Synthese_imb').hide();
		$('#message_Slide_terminer_Question_imb').hide();
		$('#fancybox_imb').hide();

		$("#Int_imb_Synthese").click();
		// $('#contRsciImmo').show();
		// $('#contimb').hide();
	});
});
</script>
<div id="message_confirmation_slide_Synthese_imb">
	<table width="500">
		<tr style="height:20px">
			<td style="height:20px">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">veuillez saisir la synthèse</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_imb">
			</td>
		</tr>
	</table>
</div>