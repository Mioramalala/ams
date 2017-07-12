<script>
$(function(){
	//Fermeture de la question objectif vide B
	$('#fermer_mess_quest_vide_acb1').click(function(){
		$('#mess_quest_vide_acb1').hide();
		$('#Question_acb_1').show();
	});
});
</script>
<div id="message_quest_acb_vide">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>
			<!-- tinay -->
			<img src="../cycle_achat_image/alerte.jpg" width="50" height="50" id="img_vide"/>Tous les champs doivent être remplis
			//tinay: acha_b/sms/Message_question_vide.php
		</td>
	</tr>
</table>
</div>
<div id="fermer_mess_quest_vide_acb1"><img src="../cycle_achat_image/Fermer.png" /></div>