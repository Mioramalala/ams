<script>
$(function(){
	//Fermeture de la question objectif vide B
	$('#fermer_mess_empty_conclus_ev').click(function(){
		$('#mess_empty_conclus_ev').hide();
		$('#int_conclusion_ev_superviseur').show();
	});
});
</script>
<div id="message_quest_ev_vide">
<table width="500">
	<tr class="label" align="center" height="50">
		<td><img src="../cycle_achat_image/alerte.jpg" width="50" height="50" id="img_vide"/>Tous les champs doivent être remplis</td>
	</tr>
</table>
</div>
<div id="fermer_mess_empty_conclus_ev"><img src="../cycle_achat_image/Fermer.png" /></div>