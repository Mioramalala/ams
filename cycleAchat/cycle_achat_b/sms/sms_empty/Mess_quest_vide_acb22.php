<script>
$(function(){
	//Fermeture de la question objectif vide B
	$('#fermer_mess_quest_vide_acb22').click(function(){
		$('#mess_quest_vide_acb22').hide();
		$('#Question_acb_22').show();
	});
});
</script>
<div id="message_quest_acb_vide">
<table width="500">
	<tr class="label" align="center" height="50">
		<td><img src="../cycle_achat_image/alerte.jpg" width="50" height="50" id="img_vide"/>Tous les champs doivent être remplis</td>
	</tr>
</table>
</div>
<div id="fermer_mess_quest_vide_acb22"><img src="../cycle_achat_image/Fermer.png" /></div>