<script>
$(function(){
	//Fermeture de la question ojectif vide B5
	$('#fermer_mess_quest_vide_e3').click(function(){
		$('#mess_quest_vide_e3').hide();
		$('#Question_e_48').show();
	});	
});
</script>

<div id="message_quest_vide_e3">
<table width="500">
	<tr class="label" align="center" height="50">
		<td><img src="../cycle_achat_image/alerte.jpg" width="50" height="50" id="img_vide"/>Tous les champs doivent être remplis</td>
	</tr>
</table>
</div>
<div id="fermer_mess_quest_vide_e3"><img src="../cycle_achat_image/Fermer.png" /></div>