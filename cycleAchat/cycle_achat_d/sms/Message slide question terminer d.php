<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_c
	$('#message__Slide_Ok_Question_d').click(function(){
		$('#message_confirmation_slide_Synthese_d').hide();
		$('#message_Slide_terminer_Question_d').hide();
		 $('#fancybox_d').hide();
		// $('#contenue_rsci').show();
		//$('#dv_cont_obj_d').hide();
		// document.getElementById("int_d_Retour").disabled=false;
		// document.getElementById("Int_d_Continuer").disabled=false;
		// document.getElementById("Int_d_Synthese").disabled=false;
	});
});
</script>
<div id="message_confirmation_slide_Synthese_d">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_d">
			</td>
		</tr>
	</table>
</div>