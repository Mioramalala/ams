<script>
$(function(){
	//Fermeture de la question objectif vide B
	$('#fermer_mess_quest_vide_imb14').click(function(){
		$('#mess_quest_vide_imb14').hide();
		$('#Question_imb_83').show();
	});
});
</script>
<div id="message_quest_imb_vide">
<table width="500">
	<tr class="label" align="center" height="50">
		<td><img src="../cycle_achat_image/alerte.jpg" width="50" height="50" id="img_vide"/>Tous les champs doivent être remplis</td>
	</tr>
</table>
</div>
<div id="fermer_mess_quest_vide_imb14"><img src="../cycle_achat_image/Fermer.png" /></div>