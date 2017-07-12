<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_acb
	$('#message__Slide_Ok_Question_acb').click(function(){
		$('#message_confirmation_slide_Synthese_acb').hide();
		$('#message_Slide_terminer_Question_acb').hide();
		//$('#contenue_rsci').show();
		$('#fancybox_acb').hide();
	});
});
</script>
<div id="message_confirmation_slide_Synthese_acb">
	<table width="500">
		<tr>
			<td height="20">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">Veuillez maintenant saisir la synthèse</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_acb">
			</td>
		</tr>
	</table>
</div>