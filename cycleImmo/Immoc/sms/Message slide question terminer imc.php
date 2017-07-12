<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_c
	$('#message__Slide_Ok_Question_imc').click(function(){
		$('#message_confirmation_slide_Synthese_imc').hide();
		$('#message_Slide_terminer_Question_imc').hide();
		$('#fancybox_imc').hide();
		// $('#contRsciImmo').show();
		// $('#contimb').hide();
		//alert('atoo tinay');
		$("#Int_imc_Synthese").click();

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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_imc">
			</td>
		</tr>
	</table>
</div>